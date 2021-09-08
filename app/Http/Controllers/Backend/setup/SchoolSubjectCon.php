<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolSubject;

class SchoolSubjectCon extends Controller
{
    // view subject 
    public function view_subject(){
    	    	$data['allData']= SchoolSubject::all();
    	return view('backend.setup.school_subject.view_school_sub',$data);
    }    

    // show page for add subject 
    public function add_subject(){
    	return view('backend.setup.school_subject.add_school_sub');

    }

    //store subject 
    public function store_subject(Request $request){
    	    $validateData = $request ->validate([
            'name' =>'required|unique:school_subjects,name',
      
       ]); 

    	 $data= new SchoolSubject();
    	 $data->name =$request->name;
    	 $data->save();
    	 	$notification = array(
			'message' => 'Subject inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('school.subject.view')->with($notification);


    }
    //edit
    public function edit_subject($id){
    		$editData =SchoolSubject::find($id);
return view('backend.setup.school_subject.school_subjects',compact('editData'));
    }

    //update subject 
    public function update_subject(Request $request,$id){
                $data = SchoolSubject::find($id);
            $validateData = $request ->validate([
            'name' =>'required|unique:school_subjects,name,'.$data->id
              ]); 

         $data->name =$request->name;
         $data->save();
            $notification = array(
            'message' => 'Subject Updated successfully',
            'alert-type' => 'success'
            );
    return redirect()->route('school.subject.view')->with($notification);


    }

    //Delete subject 
    public function delete_subject($id){
            $user = SchoolSubject::find($id);
            $user->delete();

             $notification = array(
            'message' => 'Subject Deleted successfully',
            'alert-type' => 'error'
            );
    return redirect()->route('school.subject.view')->with($notification);


    }
}
