<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function GetProfile($id){  

        $profile = User::find($id);
      
        return view( 'profile' ,[ 'profile' => $profile ]);
  
    }

    
    public function UpdateProfile(Request $request, $id) {
        
        // $this->validateUser($request); 
        $update = User::find($id);

        $update->update($request->all());
         
        return redirect('index')->with('status', 'Profile Updated!');

    }

}
