<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Reservation;
use App\Models\ReservationItems;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userID = Auth::id();
        $user = $userID ? User::find($userID) : false;
        $isAdmin = $user ? !!$user->is_admin : false;
        $date = new Carbon();

        if($isAdmin) {
            $reservations = Reservation::where('reservation_out_date', '>=', $date->format('Y-m-d'))->with('user')->get();
        }
        else {
            $reservations= Reservation::where('userID', $userID)->where('reservation_out_date', '>=', $date->format('Y-m-d'))->with(['reservationItems' => function($query) {
                $query->with('item');
            }])->get();
        }
        return view('reservations.index', compact('reservations', 'isAdmin'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        return view('reservations.new');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Reservation $reservation, $id)
    {
        $reservations = Reservation::find($id);

        return view('reservations.edit', compact('reservations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reservation::create($request->all());

        return redirect()->route('reservations.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation, $id)
    {
        $reservations = Reservation::find($id);
        // TODO: add logic to save from request
        $reservations->save();

        return redirect()->route('reservations.edit', [$reservations]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Reservation $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Reservation $reservation, $reservationID)
    {
        $reservation = Reservation::find($reservationID);
        $reservation->delete();
        return redirect('/reservation/index');
    }

    public function AddItem(Request $request, $itemID, $reservationID=false) {
        if(!$reservationID) {
            $reservation = new Reservation();
            $reservation->reservation_out_date = 0;
            $reservation->reservation_in_date = 0;
            $reservation->check_out_date = 0;
            $reservation->check_in_date = 0;
            $reservation->userID = 0;
            $reservation->save();
            $reservationID = $reservation->id;
        }

        $newItem = new ReservationItems();
        $newItem->reservationID = $reservationID;
        $newItem->itemID = $itemID;
        $newItem->save();

        return redirect('/item/index?reservationID=' . $reservationID);
    }

    public function removeItem(Request $request, $reservationID, $reservationItemID) {
        $reservationItem = ReservationItems::find($reservationItemID);
        $reservationItem->delete();

        return redirect('/item/index?reservationID=' . $reservationID);
    }

    public function chooseDate(Request $request, $reservationID) {
        $userID = Auth::id();
        $user = $userID ? User::find($userID) : false;
        $isAdmin = $user ? !!$user->is_admin : false;

        $reservation = Reservation::find($reservationID);

        //admin needs to choose who reservation is assigned to
        if($isAdmin) {
            //if user has been chosen, show choose dates
            if($reservation->userID) {
                return view('reservations.chooseDates', compact('reservationID'));
            }

            //no user has been chosen, redirect first to choose user
            $search = $request->get('search');
            $users = $this->searchUsers($search);
            return view('user.chooseUser', compact('reservationID', 'users', 'search'));
        }
        else { //reservation is assigned to logged in user
            $reservation->userID = $userID;
            $reservation->save();
            return view('reservations.chooseDates', compact('reservationID'));
        }
    }

    private function searchUsers($search) {
        $users = User::where('name', 'LIKE', '%'.$search.'%')->orderBy('name')->get();

        return $users;
    }

    public function setDate(Request $request, $reservationID) {
        $reservation = Reservation::find($reservationID);
        $reservation->reservation_out_date = $request->get('reservation_out_date');
        $reservation->reservation_in_date = $request->get('reservation_in_date');
        $reservation->save();

        return redirect('/reservation/index');
    }

    public function setUser(Request $request, $reservationID, $userID) {
        $reservation = Reservation::find($reservationID);
        $user = User::findOrFail($userID); //find or fail so that if user doesnt exist, it doesn't add the user

        $reservation->userID = $userID;

        $reservation->save();

        return redirect('/reservation/choose-date/'.$reservationID);
    }

    public function checkAvailability(Request $request, $reservationID) {
        $reservation = Reservation::with('reservationItems')->find($reservationID);
        $otherReservations = $this->getReservationsWithDatesAndItems($request->get('out'), $request->get('in'), $reservation);
        $reservationItems = $this->getItemsOnReservations($otherReservations);
        $tooManyOut = $this->checkIfTooManyAreReserved($reservationItems, $reservation->reservationItems->pluck('itemID'));

        return response()->json(['error' => $tooManyOut]);
    }

    private function getReservationsWithDatesAndItems($outDate, $inDate, $reservation) {
        return Reservation::where('reservation_out_date', '<=', $inDate)
            ->where('reservation_in_date', '>=', $outDate)
            ->whereHas('reservationItems', function($query) use ($reservation) {
                $query->whereIn('itemID', $reservation->reservationItems->pluck('itemID'));
            })->with('reservationItems')->get();
    }

    private function getItemsOnReservations($reservations) {
        $reservationItems = [];
        foreach($reservations as $reservation) {
            foreach($reservation->reservationItems as $reservationItem) {
                if(!isset($reservationItems[$reservationItem->itemID])) {
                    $reservationItems[$reservationItem->itemID] = 0;
                }
                $reservationItems[$reservationItem->itemID] += 1;
            }
        }

        return $reservationItems;
    }

    private function checkIfTooManyAreReserved($reservationItems, $itemsNeeded) {
        $items = Item::whereIn('id', $itemsNeeded)->get();

        $tooManyOut = false;
        foreach($items as $item) {
            if(isset($reservationItems[$item->id])) {
                if($item->quantity - $reservationItems[$item->id] <= 0) {
                    $tooManyOut[] = $item->description;
                }
            }
        }

        return $tooManyOut;
    }
}
