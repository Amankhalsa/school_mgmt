<?php

namespace App\Http\Controllers\Backend\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeeCategory;


class FeeCategoryCon extends Controller
{
    //Fee cat view 
      public function View_fee_cat(){
    	$data['allData']= FeeCategory::all();
    	return view('backend.setup.fee_cat.view_fee_cat',$data);

    }

    //view fee cat add page 
    public function add_Fee_cat(){

    	return view('backend.setup.fee_cat.add_fee_cat');

    }

    //store fee cat 
    public function store_fee_cat(Request $request){

 $validateData = $request ->validate([
            'name' =>'required|unique:fee_categories,name',
      
       ]); //validation end 


    		   $data = new FeeCategory();
    		   $data->name =$request->name;
    		   $data->save();  

			$notification = array(
			'message' => 'Fee Category inserted successfully',
			'alert-type' => 'success'
			);
    return redirect()->route('fee.Category.view')->with($notification);

    }

    //edit Fee category 

    public function edit_fee_cat($id){

    		$editData =FeeCategory::find($id);
    		return view('backend.setup.fee_cat.edit_fee_cat',compact('editData'));

    }

    //update fee category 

    public function fee_cat_update(Request $request,$id){

    		$data = FeeCategory::find($id);
    	    $validateData = $request ->validate([
            'name' =>'required|unique:fee_categories,name,'.$data->id
      
       ]);//validation end 
    	    	$data->name =$request->name;
    		   $data->save();  

				$notification = array(
				'message' => 'Fee Category updated successfully',
				'alert-type' => 'info'
				);
        return redirect()->route('fee.Category.view')->with($notification);



    }

    //Fee category delete
    public function delete_fee_cat($id){
    		 $user =FeeCategory::find($id);
    		$user->delete();

    			$notification = array(
				'message' => 'Fee Category deleted successfully',
				'alert-type' => 'error'
				);
        return redirect()->route('fee.Category.view')->with($notification);



    }
}
