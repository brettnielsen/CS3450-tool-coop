<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
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

        $today = new Carbon();
        $today = $today->format('Y-m-d');
        $items = Item::all();
        $reservations = Reservation::where('reservation_out_date', '<=', $today)
            ->where('reservation_in_date', '>=', $today)->where('user_id', '!=', 0)->with('reservationItems')->get();

        $itemsOnReservations = [];

        foreach($reservations as $reserve) {
            foreach($reserve->reservationItems as $reserveItem) {
                if(!isset($itemsOnReservations[$reserveItem->itemID])) {
                    $itemsOnReservations[$reserveItem->itemID] = 0;
                }

                $itemsOnReservations[$reserveItem->itemID] += 1;
            }
        }
        $reservationID = $request->get('reservationID');

        $reservation = $reservationID ? Reservation::with(['reservationItems' => function($query) {
            $query->with('item');
        }])->find($reservationID) : false;

        return view('item.index', compact('items', 'userID', 'isAdmin', 'reservation', 'itemsOnReservations'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        return view('item.new');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Item $item, $id)
    {

        $item = Item::find($id);

        return view('item.edit', compact('item'));
    }

    /**
     * @param \App\Http\Requests\ItemStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemStoreRequest $request)
    {
        $item = new Item();
        $item->description = $request->get('description');
        $item->location = $request->get('location');
        $item->quantity = $request->get('quantity');
        $item->available_quantity = $request->get('quantity');

        if($request->hasFile('image')) {
            $path = $request->image->store('images');
            $item->imagePath = $path;
        }

        $item->save();

        return redirect('/item/index');
    }

    /**
     * @param \App\Http\Requests\ItemUpdateRequest $request
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, Item $item, $id)
    {
        $item = Item::find($id);
        //TODO: add update logic from request
        $item->save();

        return redirect()->route('item.edit', [$item]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Item $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Item $item, $id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/item/index');
    }
}
