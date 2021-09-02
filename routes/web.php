<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminCon;
use App\Http\Controllers\Backend\UserCon;


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

});
