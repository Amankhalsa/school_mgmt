<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentGroup;

class StudentGroupCon extends Controller
{
    //

       //student group
    public function view_group(){
    	$data['allData']= StudentGroup::all();
    	return view('backend.setup.group.view_group',$data);

    }

    //Add student Group
    public function add_group(){
    	return view('backend.setup.group.add_group');

    }

    //Store student group
    public function store_group(Request $resuest){
    		 $validateData = $resuest->validate([
            'name' =>'required|unique:student_groups,name',
      
       ]);//validation end 

    		 $data= new StudentGroup();
    		 $data->name=$resuest->name;
    		 $data->save();
    		 
    		 $notification = array(
			'message' => 'Student Group inserted successfully',
			'alert-type' => 'success'
			);
        return redirect()->route('student.group.view')->with($notification);

    }//store method end 

    //edit group


    public function student_group_edit($id){

    		$editData =StudentGroup::find($id);
    	return view('backend.setup.group.edit_group',compact('editData'));
    }

    //update group

        public function student_group_update(Request $request, $id){

            $data = StudentGroup::find($id);
            $validateData = $request ->validate([
            'name' =>'required|unique:student_groups,name,'.$data->id
                ]); //validation 

                $data->name =$request->name;
                $data->save();  

                $notification = array(  //notification
                'message' => 'Student Group updated successfully',
                'alert-type' => 'info'
            );
            return redirect()->route('student.group.view')->with($notification);
            }

            //delete group

         public function student_group_delete($id){

            $user =StudentGroup::find($id);
            $user->delete();

                $notification = array(
                'message' => 'Student Group deleted successfully',
                'alert-type' => 'error'
                );
        return redirect()->route('student.group.view')->with($notification);

    }
}
