<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserCon extends Controller
{
    //
    public function user_view(){
    		// $allData= User::all();
    	//Another way :->
    	$data['allData']=User::all();
    		// return view('backend.user.view_user',compact('allData'));
    	//New fromat->
    		return view('backend.user.view_user',$data);

    }
    public function user_add(){


    	return view('backend.user.add_user');
    }

    public function user_store(Request $request){

        $validateData = $request ->validate([
            'email' =>'required|unique:users',
            'name' =>'required',


        ]);

        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        return redirect()->route('user.view');


    }
}
