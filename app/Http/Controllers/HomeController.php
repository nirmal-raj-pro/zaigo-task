<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function getCreateForm() {
        return view('create');
    }

    public function postCreateForm(Request $request) {
        
        $this->validateUser($request);

        $user = User::where('email', $request->email)->first();
        
        if ($user === null) {
            User::create( $request->all());
            return redirect('dashboard')->with('status', 'New User Created!');
        }
       
        return back()->with('status', 'User already exists!')->withInput($request->only('name', 'email', 'address', 'zipcode','mobile'));

    }

    public function validateUser(Request $request)
    {
        $messages = [
            'name.required'    => 'Username cannot be empty',
            'email.required'   => 'Email cannot be empty',
            'avatar.required'  => 'Upload image or file',
            'address.required' => 'Enter user address',
            'zipcode.required' => 'Enter user pincode',
            'date.required'    => 'Enter date',
            'mobile.min'       => 'Enter valid mobile number',
            'zipcode.min'      => 'Enter valid zipcode',   
        ];

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'avatar'    => 'required',
            'address'   => 'required',
            'zipcode'   => 'required|min:6',
            'mobile'    => 'required|min:10',
            'date'      => 'required',
        ], $messages);
    }
}
