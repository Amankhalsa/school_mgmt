<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCon;
use App\Http\Controllers\Backend\UserCon;
use App\Http\Controllers\Backend\ProfileCon;
use App\Http\Controllers\Backend\setup\StudentClassConn;
use App\Http\Controllers\Backend\setup\StudentYearCon;
use App\Http\Controllers\Backend\setup\StudentGroupCon;
use App\Http\Controllers\Backend\setup\StudentShiftCon;
use App\Http\Controllers\Backend\setup\FeeCategoryCon;
use App\Http\Controllers\Backend\setup\FeeAmountCon;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');

    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return view('admin.index');

})->name('dashboard');

//Admin logout
Route::get('admin/logout',[AdminCon::class,'logout'])->name('admin.logout');


//User Manage ment all routes 


Route::prefix('users')->group(function(){

	// 1st Vuew User 

Route::get('/view',[UserCon::class,'user_view'])->name('user.view');
//add User
Route::get('/add',[UserCon::class,'user_add'])->name('users.add');

//store user 
Route::post('/store',[UserCon::class,'user_store'])->name('user.store');
//edit user 
Route::get('/edit/{id}',[UserCon::class,'user_edit'])->name('user.edit');
//update user 
Route::post('/update/{id}',[UserCon::class,'user_update'])->name('user.update');

// user delete
Route::get('/delete/{id}',[UserCon::class,'user_delete'])->name('user.delete');


});

//user profile and password ======================================
Route::prefix('profile')->group(function(){
//Profile view route 
Route::get('/view',[ProfileCon::class,'profile_view'])->name('profile.view');

//profile edit
Route::get('/edit',[ProfileCon::class,'profile_edit'])->name('profile.edit');

//Profile store after edit
Route::post('/store',[ProfileCon::class,'profile_store'])->name('profile.store');

//password 
Route::get('/password/view',[ProfileCon::class,'password_view'])->name('password.view');
//update password 
Route::post('/password/update',[ProfileCon::class,'password_update'])->name('password.update');

	});

// Setup management ======================================

Route::prefix('setups')->group(function(){

Route::get('/student/class/view',[StudentClassConn::class,'view_student'])->name('student.class.view');
//add class 
Route::get('/student/class/add',[StudentClassConn::class,'student_class_add'])->name('student.class.add');

//store student class
Route::post('/student/class/store',[StudentClassConn::class,'student_class_store'])->name('store.student.class');

//Class edit 
Route::get('/student/class/edit/{id}',[StudentClassConn::class,'student_class_edit'])->name('student.class.edit');

//update class
Route::post('/student/class/update/{id}',[StudentClassConn::class,'student_class_update'])->name('update.student.class');

//delete clas
Route::get('/student/class/delete/{id}',[StudentClassConn::class,'student_class_delete'])->name('student.class.delete');


//Student year routes ======================================
Route::get('/student/year/view',[StudentYearCon::class,'view_year'])->name('student.year.view');

//add year 
Route::get('/student/year/add',[StudentYearCon::class,'add_year'])->name('student.year.add');
//store year 
Route::post('/student/year/store',[StudentYearCon::class,'store_year'])->name('store.student.year');

// student year edit 
Route::get('/student/year/edit/{id}',[StudentYearCon::class,'student_year_edit'])->name('student.year.edit');



//update year 

Route::post('/student/year/update/{id}',[StudentYearCon::class,'student_year_update'])->name('update.student.year');

// student year Delete 
Route::get('/student/year/delete/{id}',[StudentYearCon::class,'student_year_delete'])->name('student.year.delete');

//Student Group routes ======================================
Route::get('/student/group/view',[StudentGroupCon::class,'view_group'])->name('student.group.view');
//Add student group
Route::get('/student/group/add',[StudentGroupCon::class,'add_group'])->name('student.group.add');

//store group
Route::post('/student/group/store',[StudentGroupCon::class,'store_group'])->name('store.student.group');

//edit group 
Route::get('/student/group/edit/{id}',[StudentGroupCon::class,'student_group_edit'])->name('student.group.edit');

//update group 
Route::post('/student/group/update/{id}',[StudentGroupCon::class,'student_group_update'])->name('update.student.group');


//delete group 
Route::get('/student/group/delete/{id}',[StudentGroupCon::class,'student_group_delete'])->name('student.group.delete');

//=================== Student shift route ===================
//view_shift
Route::get('/student/shift/view',[StudentShiftCon::class,'view_shift'])->name('student.shift.view');
//Student shift add
Route::get('/student/shift/add',[StudentShiftCon::class,'add_shift'])->name('student.shift.add');
//Student shift store 
Route::post('/student/shift/store',[StudentShiftCon::class,'store_shift'])->name('store.student.shift');

//edit shift 
Route::get('/student/shift/edit/{id}',[StudentShiftCon::class,'student_shift_edit'])->name('student.shift.edit');

//update shift 

Route::post('/student/shift/update/{id}',[StudentShiftCon::class,'student_shift_update'])->name('update.student.group');
//Delete shift 
Route::get('/student/shift/delete/{id}',[StudentShiftCon::class,'student_shift_delete'])->name('student.shift.delete');


//===================  Fee Category route=================== 
Route::get('/fee/Category/view',[FeeCategoryCon::class,'View_fee_cat'])->name('fee.Category.view');



//Fee Category add
Route::get('/Fee/Category/add',[FeeCategoryCon::class,'add_Fee_cat'])->name('Fee.Category.add');

//Store fee cat 
Route::post('/Fee/Category/store',[FeeCategoryCon::class,'store_fee_cat'])->name('store.fee.Category');


//Edit fee category 

Route::get('/fee/Category/edit/{id}',[FeeCategoryCon::class,'edit_fee_cat'])->name('fee.Category.edit');

//update Fee Category
Route::post('/fee/Category/update/{id}',[FeeCategoryCon::class,'fee_cat_update'])->name('update.Fee.Category');

//Delete Fee Category 
Route::get('/fee/Category/delete/{id}',[FeeCategoryCon::class,'delete_fee_cat'])->name('fee.Category.delete');

// ======================== Fee amount ========================
Route::get('/fee/Amount/view',[FeeAmountCon::class,'view_fee_Amt'])->name('fee.Amount.view');


//Add fee abount 
Route::get('/fee/Amount/add',[FeeAmountCon::class,'add_fee_Amt'])->name('Fee.Amount.add');
//store fee amount 
Route::post('/fee/Amount/store',[FeeAmountCon::class,'store_fee_Amt'])->name('store.fee.amount');



		});
