<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
class ProfileCon extends Controller
{
    //
    public function profile_view(){
    	$id =Auth::User()->id;
    	$user = User::find($id);
    	return view('backend.user.view_profile',compact('user'));

    }
    public function profile_edit(){
    	$id =Auth::User()->id;
    	$editData = User::find($id);
    	return view('backend.user.edit_profile',compact('editData'));
    }
}
