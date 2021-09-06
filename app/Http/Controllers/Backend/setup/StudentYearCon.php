<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentYear;

class StudentYearCon extends Controller
{
    //
     //student year
    public function view_year(){
    	$data['allData']= StudentYear::all();
    	return view('backend.setup.year.view_year',$data);

    }

    //add year mean show page for add 
    public function add_year(){


    	return view('backend.setup.year.add_year');


    }

    //store year 

    public function store_year(Request $request){

    	 $validateData = $request ->validate([
            'name' =>'required|unique:student_years,name',
      
       ]); //validation end 


    		   $data = new StudentYear();
    		   $data->name =$request->name;
    		   $data->save();  

			$notification = array(
			'message' => 'Student Year inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('student.year.view')->with($notification);
    }		// store year method end 


//Student year edit 
    public function student_year_edit($id){

    		$editData =StudentYear::find($id);
    		return view('backend.setup.year.edit_year',compact('editData'));
    }

//update year 
			public function student_year_update(Request $request, $id){

			$data = StudentYear::find($id);
			$validateData = $request ->validate([
			'name' =>'required|unique:student_years,name,'.$data->id
				]); //validation 

				$data->name =$request->name;
				$data->save();  

				$notification = array(  //notification
				'message' => 'Student year updated successfully',
				'alert-type' => 'info'
			);
			return redirect()->route('student.year.view')->with($notification);
			}



//year delete 

			 public function student_year_delete($id){

    		$user =StudentYear::find($id);
    		$user->delete();

    			$notification = array(
				'message' => 'Student year deleted successfully',
				'alert-type' => 'error'
				);
        return redirect()->route('student.year.view')->with($notification);

    }
}
