<?php

namespace App\Http\Controllers;

use App\Models\RentLogs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function profile()
    {
        $rent_logs = RentLogs::where('user_id', auth()->user()->id)->get();
        return view('profile', compact('rent_logs'));
    }

    public function detailUser(User $slug)
    {
        $user = $slug;
        $rent_logs = RentLogs::where('user_id', $user->id)->get();
        return view('detailUser', compact('user', 'rent_logs'));
    }

    public function activeUser()
    {
        $users = User::where('role_id', '!=', 1)->where('status', 'active')->get();
        return view('user', compact('users'));
    }

    public function inactiveUser()
    {
        $users = User::where('status', 'inactive')->where('role_id', '!=', 1)->get();
        return view('listInactiveUser', compact('users'));
    }

    public function deletedUser()
    {
        $users = User::onlyTrashed()->get();
        return view('listDeletedUser', compact('users'));
    }

    public function allowUser(User $slug)
    {
        $slug->status = 'active';
        $slug->save();

        Session::flash('status', 'success');
        Session::flash('message', "User $slug->username has been success allowed");
        return redirect('/users');
    }

    public function deleteUser(User $slug)
    {
        $slug->delete();

        Session::flash('status', 'success');
        Session::flash('message', 'User has been success deleted');
        return redirect('/users');
    }

    public function restore($slug)
    {
        $user = User::withTrashed()->where('slug', $slug)->first();
        $user->restore();

        Session::flash('status', 'success');
        Session::flash('message', 'User has been success restored');

        return redirect('/users/deleted');
    }
}
