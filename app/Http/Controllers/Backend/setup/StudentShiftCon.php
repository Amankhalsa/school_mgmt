<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentShift;

class StudentShiftCon extends Controller
{
    //student shift view 

    public function view_shift(){
    	 $data['allData']= StudentShift::all();
    	return view('backend.setup.shift.view_shift',$data);
    }
//show add shift page 
    public function add_shift(){

    	return view('backend.setup.shift.add_shift');

    }

//store student shift page
    public function store_shift(Request $request){
    	 $validateData = $request ->validate([
            'name' =>'required|unique:student_shifts,name',
      
       ]);//validation end 
    	 	   $data = new StudentShift();
    		   $data->name =$request->name;
    		   $data->save();  

			$notification = array(
			'message' => 'Student Shift inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('student.shift.view')->with($notification);

    }

    //edit shift  page view 
        public function student_shift_edit($id){

    		$editData =StudentShift::find($id);
    		return view('backend.setup.shift.edit_shift',compact('editData'));
    }
    public function student_shift_update(Request $request,$id){
			$data = StudentShift::find($id);
			$validateData = $request ->validate([
			'name' =>'required|unique:student_shifts,name,'.$data->id
				]); //validation 

				$data->name =$request->name;
				$data->save();  

				$notification = array(  //notification
				'message' => 'Student Shift updated successfully',
				'alert-type' => 'info'
			);
	return redirect()->route('student.shift.view')->with($notification);

    }//end update method 

//Delete shift method 
   		 public function student_shift_delete($id){

    		$user =StudentShift::find($id);
    		$user->delete();

    			$notification = array(
				'message' => 'Student Shift deleted successfully',
				'alert-type' => 'error'
				);
        return redirect()->route('student.shift.view')->with($notification);

    }

}
