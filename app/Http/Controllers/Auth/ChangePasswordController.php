<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePasswordController extends Controller
{
    public function __construct()//For security purposes
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('auth.passwords.change');
    }

    public function changepassword(Request $request) //Change user's current password
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $currPassword = Auth::user()->password;

        if (Hash::check($request->current_password, $currPassword)) {

            $user = User::find(Auth::id());

            $user->password = Hash::make($request->password);

            $user->save();

            Auth::logout();

            session()->flash('success', 'Password changed successfully! Login with your new password.');

            return redirect()->route('login');
        }
        else {

            session()->flash('error', 'Your current password input is invalid.');

            return redirect()->back();
        }
    }
}
