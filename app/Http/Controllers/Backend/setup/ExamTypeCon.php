<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExamType;

class ExamTypeCon extends Controller
{
    ////Fee cat view 
      public function view_exam_type(){
    	$data['allData']= ExamType::all();
    	return view('backend.setup.exam.view_exam_type',$data);

    }
    //view page for examm type add

    public function view_exam_add(){
    	return view('backend.setup.exam.add_exam_type');


    }

    //Store Exam type 
    public function store_exam_type(Request $request){

    	 $validateData = $request ->validate([
            'name' =>'required|unique:exam_types,name',
      
       ]); 

    	 $data= new ExamType();
    	 $data->name =$request->name;
    	 $data->save();
    	 	$notification = array(
			'message' => 'Exam Type inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('exam.type.view')->with($notification);

    }

    //edit exam type
    public function edit_exam_type($id){

    		$editData =ExamType::find($id);
    	return view('backend.setup.exam.edit_exam_type',compact('editData'));
    }

    //update exam type  edit data
    public function update_exam_type(Request $request, $id){
    		$data = ExamType::find($id);
    		$validateData = $request ->validate([
            'name' =>'required|unique:exam_types,name,'.$data->id
     		  ]); 

    	 $data->name =$request->name;
    	 $data->save();
    	 	$notification = array(
			'message' => 'Exam Type Updated successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('exam.type.view')->with($notification);

    }
   //delete exam type
    public function delete_exam_type($id){

    		$user =ExamType::find($id);
    		$user->delete();

    			$notification = array(
				'message' => 'Exam Type deleted successfully',
				'alert-type' => 'error'
				);
        return redirect()->route('exam.type.view')->with($notification);

    }

}
