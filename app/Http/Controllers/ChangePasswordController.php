<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePasswordController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('change_password');
        }
        return redirect()->action([SessionController::class, 'login']);
    }
    public function change_password(Request $request) {
        if(Hash::check($request['oldpassword'], auth()->user()->password)) {
            if(strcmp($request['newpassword'],$request['cnewpassword'])==0) {
                $encr = bcrypt($request['newpassword']);
                User::find(Auth::user()->id)->update(['password' => $encr]);
                Session::flush();
                Auth::logout();
                return redirect()->action([SessionController::class, 'login'])->withSuccess('Password Changed! Please Login');
            } else {
                return back()->withErrors([
                    'mismatch' => 'The New Passwords are mismatch!',
                ])->onlyInput('mismatch');
            }
        } else {
            return back()->withErrors([
                'invalid' => 'The Password is Wrong!',
            ])->onlyInput('invalid');
        }
    }
}
