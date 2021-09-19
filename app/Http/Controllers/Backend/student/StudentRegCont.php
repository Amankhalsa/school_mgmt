<?php

namespace App\Http\Controllers\Backend\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\User;
use App\Models\DiscountStudent;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use DB;

class StudentRegCont extends Controller
{
    //View Registraion
    public function view_registraion(){
    	$data['allData']=AssignStudent::all();
    	return view('backend.student.student_reg.student_view',$data);

    }
    public function student_reg_add(){

    	$data['years']=StudentYear::all();
    	$data['classes']=StudentClass::all();
    	$data['groups']=StudentGroup::all();
    	$data['shifts']=StudentShift::all();
    	return view('backend.student.student_reg.student_add',$data);

    }

    public function student_reg_store(Request $request){
    		DB:: transaction(function()use($request){
            $checkYear =StudentYear::find($request->year_id)->name;
            $student =User::where('usertype','student')->orderBy('id','DESC')->first();
            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg+1; 
                if ($studentId < 10) {

                    $id_no ='000'.$studentId;
                }elseif ($studentId < 100 ) {
                    
                    $id_no ='00'.$studentId;

                }elseif ($studentId < 1000) {
                    $id_no ='0'.$studentId;
                   
                }


            } //if end 
            else {
            $student =User::where('usertype','student')->orderBy('id','DESC')->first()->id;
            $studentId =$student+1;

        
            
                if ($studentId < 10) {

                    $id_no ='000'.$studentId;
                }elseif ($studentId < 100 ) {
                    
                    $id_no ='00'.$studentId;

                }elseif ($studentId < 1000) {
                    $id_no ='0'.$studentId;
 
                }

            } //end else 


    			$final_id_no = $checkYear.$id_no;
                $user = new User();
                $code = rand(0000,9999);
                $user->id_no = $final_id_no;
                $user->password =bcrypt($code);
                 $user->usertype ='student';
                 $user->code =$code;
                 $user->name =$request->name;
                 $user->fname =$request->fname;
                 $user->mname =$request->mname;
                 $user->mobile =$request->mobile;
                 $user->address =$request->address;
                 $user->gender =$request->gender;
                 $user->religion =$request->religion;
                 $user->dob =date('Y-m-d',strtotime($request->dob));

                    //image data
            if ($request->file('image')) {
            $file = $request->file('image');
            // @unlink(public_path('upload/user_image/'.$data->image));
            //name genrate here 
            $name_gen = date('Ymdhi');
            $filename =$file->getClientOriginalName();
            //new name saved  in $img_name  
            $img_name=$name_gen.$filename;
            $file->move(public_path('upload/student_image/'),$img_name);
            $user['image']=$img_name;
        } //end if 
        // end image data code 
            $user->save();

                $assign_student = new AssignStudent();
                $assign_student->student_id = $user->id;
                $assign_student->year_id = $request->year_id;
                $assign_student->class_id = $request->class_id;
                $assign_student->group_id  = $request->group_id;
                $assign_student->shift_id = $request->shift_id;
                $assign_student->save();


                $discount_student = new DiscountStudent();
                $discount_student->assign_student_id = $assign_student->id;
                $discount_student->fee_category_id  = '1';
                $discount_student->discount =$request->discount;
                $discount_student->save();


    		});
            $notification = array(
            'message' => 'Student Registration inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registraion.view')->with($notification);
    }//end method 
}
