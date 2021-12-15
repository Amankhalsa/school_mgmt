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
use PDF;
class StudentRollCon extends Controller
{
    //
    public function student_roll_view(){
    	 $data['years']=StudentYear::all();
        $data['classes']=StudentClass::all();
    	return view('backend.student.roll_genrate.roll_genrate_view', $data);

    }

    public function getstudent(){
    	$data
    }
}
