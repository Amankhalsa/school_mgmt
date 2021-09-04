<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class ProfileCon extends Controller
{
    // view profile page 
    public function profile_view(){
    	$id =Auth::User()->id;
    	$user = User::find($id);
    	return view('backend.user.view_profile',compact('user'));

    }
    // edit profile page 
    public function profile_edit(){
    	$id =Auth::User()->id;
    	$editData = User::find($id);
    	return view('backend.user.edit_profile',compact('editData'));
    }

    // Store data after updating 
    public function profile_store(Request $request){
        $data = User::find(Auth::user()->id);
        $data->name =$request->name;
        $data->email =$request->email;
        $data->mobile =$request->mobile;
        $data->address =$request->address;
        $data->gender =$request->gender;


        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_image/'.$data->image));
            //name genrate here 
            $name_gen = date('Ymdhi');
            $filename =$file->getClientOriginalName();
            //new name saved  in $img_name  
            $img_name=$name_gen.$filename;
            $file->move(public_path('upload/user_image/'),$img_name);
            $data['image']=$img_name;
        } //end if 
            $data->save();
                 $notification = array(
        'message' => 'user Profile updated successfully',
        'alert-type' => 'success'
        );
            return redirect()->route('profile.view')->with($notification);  

    }//end method 

    //password 
    public function password_view(){
        return view('backend.user.edit_password');
    }

    //update password 

    public function password_update(Request $request){
          $validateData = $request ->validate([
            'oldpassword' =>'required',
            'password' =>'required|confirmed',
        ]);//end validation

          $hashedPassword =Auth::user()->password;

          if (Hash::check($request->oldpassword,$hashedPassword)) {
            $user =User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
          }else{
            return redirect()->back();

          }


    }//end method 
}
