<?php

namespace App\Http\Controllers\backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssigneSubject;
use App\Models\StudentClass;
use App\Models\SchoolSubject;



class AssigneSubjectCon extends Controller
{
    //view assigne subject 
    public function view_assigne_sub(){
		// $data['allData']= AssigneSubject::all();

    		  $data['allData']= AssigneSubject::select('class_id')->groupBy('class_id')->get();

    	return view('backend.setup.assigne_sub.view_assigne_sub',$data);


    } 
//add Assigne subject 

    public function add_assigne_sub(){
		$data['subjects']=SchoolSubject::all();
    	$data['classes']=StudentClass::all();

    	return view('backend.setup.assigne_sub.add_assigne_sub',$data);


    }
    //store assigned  subject
    public function store_assigne_sub(Request $request){

    	$subjectCount = count($request->subject_id);
    	if ($subjectCount != NULL ) {
    		for ($i=0; $i < $subjectCount ; $i++) { 
    			$assigne_subject = new AssigneSubject();
    			$assigne_subject->class_id = $request->class_id;
    			$assigne_subject->subject_id = $request->subject_id[$i];
    			$assigne_subject->full_mark = $request->full_mark[$i];
    			$assigne_subject->pass_mark = $request->pass_mark[$i];
    			$assigne_subject->subjective_mark = $request->subjective_mark[$i];

    			$assigne_subject->save();
    		}    //end for loop
    	}  //end if 
    		$notification = array(
			'message' => 'Subject Assign inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('Assigne.subject.view')->with($notification);
    } //end method 
//edit 
   public function assign_sub_edit($class_id){
            $data['editData'] = AssigneSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
            // dd($data['editData']->toArray());
           $data['subjects']=SchoolSubject::all();
    	$data['classes']=StudentClass::all();
      	return view('backend.setup.assigne_sub.edit_assigne_sub',$data);

            

    }
//update assign subject 

    public function assign_sub_update(Request $request, $class_id){
    	        if ($request->subject_id == NULL) {
            $notification = array(
            'message' => 'Sorry you dont select any Subject ',
            'alert-type' => 'error'
            );
    return redirect()->route('assign.subject.edit',$class_id)->with($notification);
            // dd('Error');
        }//end if 
        else{
            
            $countClass = count($request->subject_id);
     AssigneSubject::where('class_id',$class_id)->delete();
          for ($i=0; $i < $countClass ; $i++) { 
    			$assigne_subject = new AssigneSubject();
    			$assigne_subject->class_id = $request->class_id;
    			$assigne_subject->subject_id = $request->subject_id[$i];
    			$assigne_subject->full_mark = $request->full_mark[$i];
    			$assigne_subject->pass_mark = $request->pass_mark[$i];
    			$assigne_subject->subjective_mark = $request->subjective_mark[$i];

    			$assigne_subject->save();
    		}    //end for loop
    

        } //end else 
        $notification = array(
            'message' => 'Data updated successfully',
            'alert-type' => 'success'
            );
return redirect()->route('Assigne.subject.view')->with($notification);

    }

    //details 
 public function assign_sub_detail($class_id){

  $data['detailData'] = AssigneSubject::where('class_id',$class_id)->orderBy('subject_id','asc')->get();
         return view('backend.setup.assigne_sub.details_assigne_sub',$data);
       

 }


}
