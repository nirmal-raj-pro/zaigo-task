<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getIndex() { 

        $user = User::where('email', Auth::user()->email)->first();

        return view('user.index', ['user'=> $user ]);
    }
}
