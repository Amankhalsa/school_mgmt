<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminCon extends Controller
{
    //
    public function logout(){
    	Auth::logout();
		
		$notification = array(
		'message' => 'User logout successfully',
		'alert-type' => 'success'
		);

    	return redirect()->route('login')->with($notification);

    }
}
