<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;



class AdminController extends Controller
{
    public function getDashboard() {
        $users = User::where('deleted_at', null)->paginate(10);
        return view('admin.dashboard', ['users' => $users ]);
    }

    public function getEditForm($id) {

        $previousData = User::where('id', $id)->first();
  
        return view('admin.edit',[ 'previousData' => $previousData ]);
  
    }

    public function updateUser(Request $request, $id) {
            
        $this->validateUser($request); 
   
        $update = User::find($id);
    
        $update->update($request->all());
         
        return redirect()->route('dashboard')->with('status', 'Record Updated Sucessfully!');
    }
    
    public function destroy($id)
   {
      $destroy = User::find($id);
      $destroy->deleted_at = now();
      $destroy->save();
      
      return redirect()->route('dashboard')->with('status', 'Record Deleted Sucessfully!');
   }
}
