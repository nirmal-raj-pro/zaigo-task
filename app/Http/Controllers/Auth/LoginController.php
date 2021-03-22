<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function getLogin() {
        
        return view('auth.login');
    }

    public function authenticateLogin(Request $request) {
       
        $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required|min:6'
        ]);  

        if (Auth::attempt($validator)) {
            return redirect('dashboard');
        }
        return redirect('login')->with('status', 'Please Check Email ID & Password. Invalid!' )->withInput($request->only('email', 'remember'));
    }

    public function logOut() {
        Session::flush();
        Auth::logout();
        return Redirect::to("/login")->with('status', 'You have successfully logged out');
    }
}
    


