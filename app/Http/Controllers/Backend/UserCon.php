<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class UserCon extends Controller
{
    //
    public function user_view(){
    		// $allData= User::all();
    	//Another way :->
    	$data['allData']=User::where('usertype','Admin')->get();
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
        $code= rand(0000,9999);

        $data->usertype = 'Admin';
        $data->role = $request->role;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code=$code;
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
        if(Auth::user()->role =='Admin'){
       
            return view('backend.user.edit_user',compact('editdata'));
               } //if end 
        
        else{
        $notification = array(
        'message' => 'Sorry you not Permission for Edit',
        'alert-type' => 'error'
        );

        return redirect()->route('user.view')->with($notification);
}//else end 

    } 
//update user detail 
    public function user_update(Request $request, $id){
        


       $data = User::find($id); 
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = $request->role;

        $data->save();
        $notification = array(
        'message' => 'User updated successfully',
        'alert-type' => 'info'
        );
        return redirect()->route('user.view')->with($notification);


 

    }


    // delete user 
    public function user_delete($id){

        $user =User::find($id);
        $user->delete();
         $notification = array(
        'message' => 'User Deleted successfully',
        'alert-type' => 'error'
        );
        return redirect()->route('user.view')->with($notification);

    }
}
