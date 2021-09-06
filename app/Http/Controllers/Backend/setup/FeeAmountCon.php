<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\FeeCategory;
use App\Models\FeeCatAmount;


class FeeAmountCon extends Controller
{
    //View Fee Amount 

    public function view_fee_Amt(){
		$data['allData']= FeeCatAmount::all();
    	return view('backend.setup.fee_amount.view_fee_amt',$data);


    }

    //add fee amount 

    public function add_fee_Amt(){
    	$data['fee_category']=FeeCategory::all();
    	$data['classes']=StudentClass::all();

    	return view('backend.setup.fee_amount.add_fee_amt',$data);

    }

    //store fee amount 

    public function store_fee_Amt(Request $request){

    	$countClass = count($request->class_id);
    	if ($countClass != NULL ) {
    		for ($i=0; $i < $countClass ; $i++) { 
    			$fee_amount = new FeeCatAmount();
    			$fee_amount->fee_category_id = $request->fee_category_id;
    			$fee_amount->class_id = $request->class_id[$i];
    			$fee_amount->amount = $request->amount[$i];
    			$fee_amount->save();
    		}    //end for loop
    	}  //end if 
    		$notification = array(
			'message' => 'Fee Amount inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('fee.Amount.view')->with($notification);
    } //end method 
}
