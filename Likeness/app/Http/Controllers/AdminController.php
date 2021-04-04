<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{

    /**
     *
     * Show all users
     *
     * @return view users/ShowAll
     *
     **/
    public function index() {
        return view('users/showAll', [
            'users' => User::get()
        ]);
    }


    /**
     *
     * Show Single User
     *
     * @param user_id user_id of user to get user from
     * @return view
     *
     **/
    public function show($user_id) {

        if ($user = User::find($user_id)) {
            return view('users/showUser', [
                'user' => $user
            ]);
        } else {
            abort(404, "User not Found");
        }
    }


    /**
     *
     * Update user in DB
     *
     * @param user_id id of user to be updated
     * @return view users/showAll
     *
     **/
    public function update($user_id) {
        request()->validate([
            'name' => ['required', 'alpha'],
            'email' => ['required', 'email'],
        ]);

        if ($user = User::find($user_id)) {
            $user->name = request('name');
            $user->email = request('email');
            $user->isAdmin = request('isAdmin') ? 1 : 0;

            $user->save();
        } else {
            abort(404, "User Not Found");
        }

        return view('users.showAll', [
            'users' => User::get()
        ]);
    }


    /**
     *
     * Delete user from DB
     *
     * @param user_id id of user to be deleted
     * @return view users/showAll
     *
     **/
    public function delete($user_id) {
        if ($user = User::find($user_id)) {
            User::destroy($user_id);

            return view('users.showAll', [
                'users' => User::get()
            ]);
        } else {
            abort(404, "User Not Found");
        }


    }
}
