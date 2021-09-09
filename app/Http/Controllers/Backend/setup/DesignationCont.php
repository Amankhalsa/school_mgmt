<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Designation;

 
class DesignationCont extends Controller
{
    //View Designation 
    public function view_designation(){
    $data['allData']= Designation::all();
    return view('backend.setup.Designation.view_designation',$data);
    }

    //add Designation 
    public function add_designation(){
    return view('backend.setup.Designation.add_designation');
    }

    //Store designation
    public function store_designation(Request $request){
    	   $validated = $request->validate([
        'name' => 'required|unique:designations,name',
   			 ]);  // Ref link=> https://laravel.com/docs/8.x/validation#introduction

		    	$data= new Designation();
		    	$data->name =$request->name;
		    	$data->save();
    	 	$notification = array(
			'message' => 'Designation inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('designation.view')->with($notification);


    }

    //Edit Designation

    	public function edit_designation($id){
    	$editData=Designation::find($id);

    return view('backend.setup.Designation.edit_designation',compact('editData'));


    }

    // Update Designation 
    public function update_designation(Request $request,$id){
    			$data= Designation::find($id);
    	  		 $validated = $request->validate([
        	'name' => 'required|unique:designations,name,'.$data->id
   			 ]);  // Ref link=> https://laravel.com/docs/8.x/validation#introduction
		    	
		    	$data->name =$request->name;
		    	$data->save();
    	 	$notification = array(
			'message' => 'Designation Updated successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('designation.view')->with($notification);
}

//Delete Designation
public function delete_designation($id){
    			$user= Designation::find($id);
    			$user->delete();
    				$notification = array(
			'message' => 'Designation Deleted successfully',
			'alert-type' => 'info'
			);
    return redirect()->route('designation.view')->with($notification);

}

}
