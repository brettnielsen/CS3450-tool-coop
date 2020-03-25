<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userID = Auth::id();
        $user = $userID ? \App\Models\User::find($userID) : false;
        $isAdmin = $user ? !!$user->is_admin : false;

        if($isAdmin) {
            $search = $request->search;
            if($search) {
                $users = User::where('name', 'LIKE', '%'.$search.'%')->orderBy('name')->get();
            }
            else {
                $users = User::all()->sortBy('name');
            }

            return view('user.chooseUser', compact('users', 'search'));
        }


        return view('user.edit', compact('user'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function new(Request $request)
    {
        return view('user.new');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->city = $request->get('city');
        $user->state = $request->get('state');
        $user->zip = $request->get('zip');
        $user->phone = $request->get('phone');
        $user->password = '';

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * @param \App\Http\Requests\UserUpdateRequest $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->city = $request->get('city');
        $user->state = $request->get('state');
        $user->zip = $request->get('zip');
        $user->phone = $request->get('phone');
        $user->save();

        return redirect()->route('user.edit', [$user]);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        User::destroy($user->id);
        return;
    }
}
