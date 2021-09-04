<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
class StudentClassConn extends Controller
{
    //student view 
    public function view_student(){
    	$data['allData']= StudentClass::all();
    	return view('backend.setup.student_class.view_class',$data);

    }
    //add class
    public function student_class_add(){

    	return view('backend.setup.student_class.add_class');
    }

    // store class
    public function student_class_store(Request $request){
    		   $validateData = $request ->validate([
            'name' =>'required|unique:student_classes,name',
      
       ]);


    		   $data = new StudentClass();
    		   $data->name =$request->name;
    		   $data->save();  

    		      $notification = array(
        'message' => 'Student Class inserted successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('student.class.view')->with($notification);


    }

    //student class edit 
    public function student_class_edit($id){

    		$editData =StudentClass::find($id);
    		return view('backend.setup.student_class.edit_class',compact('editData'));
    }

    //update class
    public function student_class_update(Request $request, $id){

    	$data = StudentClass::find($id);
    	    $validateData = $request ->validate([
            'name' =>'required|unique:student_classes,name,'.$data->id
      
       ]);


    		   
    		   $data->name =$request->name;
    		   $data->save();  

				$notification = array(
				'message' => 'Student Class updated successfully',
				'alert-type' => 'info'
				);
        return redirect()->route('student.class.view')->with($notification);


    }

    //delete class
    public function student_class_delete($id){

    		$user =StudentClass::find($id);
    		$user->delete();

    			$notification = array(
				'message' => 'Student Class deleted successfully',
				'alert-type' => 'error'
				);
        return redirect()->route('student.class.view')->with($notification);

    }


}
