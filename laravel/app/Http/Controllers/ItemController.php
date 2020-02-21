<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemStoreRequest;
use App\Http\Requests\ItemUpdateRequest;
use App\Models\Item;
use App\Models\Reservation;
use App\Models\User;
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

        $items = Item::all();

        $reservationID = $request->get('reservationID');

        $reservation = $reservationID ? Reservation::with(['reservationItems' => function($query) {
            $query->with('item');
        }])->find($reservationID) : false;

        return view('item.index', compact('items', 'userID', 'isAdmin', 'reservation'));
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
