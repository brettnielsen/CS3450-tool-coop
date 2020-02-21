<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationItems;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reservations = Reservation::all();

        return view('reservations.index', compact('reservations'));
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
    public function destroy(Request $request, Reservation $reservation)
    {
        //TODO: perform delete
        return;
    }

    public function AddItem(Request $request, $itemID, $reservationID=false) {
        if(!$reservationID) {
            $reservation = new Reservation();
            $date = new Carbon();
            $reservation->reservation_out_date = $date;
            $reservation->reservation_in_date = $date->addWeeks(2);
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
}
