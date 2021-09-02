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
              $notification = array(
        'message' => 'View User open successfully',
        'alert-type' => 'success'
        );
    		return view('backend.user.view_user',$data)->with($notification );

    }
    public function user_add(){


    	return view('backend.user.add_user');
    }
// Store user 
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
        $notification = array(
        'message' => 'User login successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);


    }

    //edit
    public function user_edit($id){
            $editdata=User::find($id);
            return view('backend.user.edit_user',compact('editdata'));
    } 
}
