<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class ChangePass extends Controller
{
    //
    public function change_pass(){

    	return view('admin.body.change_pass');
    }
// =============== update password =================
    public function update_pass(Request $request){
    	$validateData =$request->validate([
    		'current_password' => 'required',
    		'password' => 'required |confirmed'

    	]);

    	$hashedpassword =Auth::user()->password;
    	if (Hash::check($request->current_password,$hashedpassword)) {

    		$user = User::find(Auth::id());
    		$user->password =Hash::make($request->password); 
    		$user->save();
    		Auth::logout();
    		return redirect()->route('login')->with('success','Password updated successfully');
    	}else{
    		return redirect()->back()->with('error','Invalid password');
    	}

    }

    // ================= uodate profile====================

    public function edit_profile(){
    	if (Auth::user()) {
    		$user = User::find(Auth::user()->id);
    		if ($user) {
    				return view('admin.body.profile',compact('user'));
    		}
    		# code...
    	}


    }

    // ==================== update profile ===================
    public function update_profile(Request $request){
    	$user = User::find(Auth::user()->id);

    	if ($user) {

    		$user->name =$request->name;
    		$user->email = $request->email;
    		$user->save();

    		return redirect()->back()->with('success','Profile updated successfully');


    		# code...
    	}else{
    		return redirect()->back();
    	}
    }
}
