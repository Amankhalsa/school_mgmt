# Composer cmd  copy all and paste in cmd and run it 
------------------------------------------------
https://getcomposer.org/download/

	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
	php composer-setup.php
	php -r "unlink('composer-setup.php');"


# Laravel School Pro MGMT
------------------------------------------------
https://laravel.com/docs/8.x/installation

	composer create-project laravel/laravel example-app

# 3 How to install jetstrem  Auth (Steps): 
------------------------------------------------
https://laravel.com/docs/8.x/authentication
https://jetstream.laravel.com/2.x/installation.html
1st 

		composer require laravel/jetstream
2nd 

		php artisan jetstream:install livewire
3rd Livewire scaffolding installed successfully.
Please execute "npm install && npm run dev" to build your assets.

	npm install && npm run dev


# Create Databse and migrate it by .env and phpmyadmin
	
in my case =>DB_DATABASE=school

	php artisan migrate

# Next Add  Theam on laravel project 
* Default Routes :

		Route::get('/', function () {
		return view('welcome');
		});
		
		Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
		// return view('dashboard');
		return view('admin.index');
		})->name('dashboard');

		//Admin logout
		Route::get('admin/logout',[AdminCon::class,'logout'])->name('admin.logout');


* First sigments all header footer and slider (admin section )
		
		@yield('title') - Admin //for title 
		@include('admin.body.header')

		@include('admin.body.sidebar')

		@yield('admin')

		@include('admin.body.footer')

* in index page (content section)
		
		@extends('admin.admin_master')
		@section('title', 'Content')
		@section('admin')
		//Add content 
		@endsection
* Second make a new folder then in this new folder create new controller 
* Then use in web.php like this :

		use App\Http\Controllers\Backend\UserCon;

# in web routes  make a prefix and create user group

		//User Manage ment all routes 
		Route::prefix('users')->group(function(){
		// 1st Vuew User 
		Route::get('/view',[UserCon::class,'user_view'])->name('user.view');
		});

# Controller code  example:

    public function user_view(){
    		// $allData= User::all();
    	//Another way :->
    	$data['allData']=User::all();
    		// return view('backend.user.view_user',compact('allData'));
    	//New fromat->
    		return view('backend.user.view_user',$data);
    }

# in the admin folder  :
* make a new folder backend then for user create user folder Then create new file here for return 

# 3. View User Data from Database
* 1st copy all data from user table 
* 2nd add new field in migration file =>
	
		$table->string('usertype')->nullable();

* for remove user table run this 
* You can also rollback if you want to drop your last migrated table

		php artisan migrate:rollback 
* The migrate:reset command will roll back all of your application's migrations:

		php artisan migrate:reset
* The migrate:fresh command will drop all tables from the database and then execute the migrate command:

		php artisan migrate:fresh

		php artisan migrate:fresh --seed

* Then run  for create user table in DB

			php artisan migrate 

* in the view page use this example code for show all user list 

		@foreach($allData as $key => $user)
		<tr>
		<td>{{$key+1 }} </td>
		<td>{{$user->usertype}}</td>
		<td>{{$user->name}}</td>
		<td>{{$user->email}}</td>
		<td>
		<a href="" class="btn btn-info">Edit</a>
		<a href="" class="btn btn-danger">Delete</a>
		</td>
		</tr>
		@endforeach	
 
# For add user create new fiel in user folder 
		href="{{route('users.add')}}" //for button 

		@extends('admin.admin_master')
		@section('title', 'Add user')
		@section('admin')
		// add form here 
		@endsection

# 5. Insert User Data in Database Part 2
// Store user  controller code 
		
			action="{{route('user.store')}}"

    public function user_store(Request $request){
        $validateData = $request ->validate([
            'email' =>'required|unique:users',
            'name' =>'required',
        ]);
        $data = new User();
        $data->usertype = $request->usertype;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $notification = array(
        'message' => 'User login successfully',
        'alert-type' => 'success'
        );
        return redirect()->route('user.view')->with($notification);
    }

# 8. Edit and Update User Data into Database Part 2
* Make a route and method in  Controller

* action="{{route('user.update',$editdata->id)}}"
view section:

		<select name="usertype" id="select" required="" class="form-control">
		<option value="" selected="" disabled="">Select Role</option>
		<option value="Admin" {{($editdata->usertype == "Admin" ? "selected": "")}}>Admin</option>
		<option value="user" {{($editdata->usertype == "user" ? "selected": "")}}>user</option>
		</select>
//Controller 

		//update user detail 
		public function user_update(Request $request, $id){
		$data = User::find($id);
		$data->usertype = $request->usertype;
		$data->name = $request->name;
		$data->email = $request->email;
		$data->save();
		$notification = array(
		'message' => 'User updated successfully',
		'alert-type' => 'info'
		);
		return redirect()->route('user.view')->with($notification);
		}

# routes 
	//add User show for view page to add user
	Route::get('/add',[UserCon::class,'user_add'])->name('users.add');
	//store user 
	Route::post('/store',[UserCon::class,'user_store'])->name('user.store');
	//edit user 
	Route::get('/edit/{id}',[UserCon::class,'user_edit'])->name('user.edit');
	//update user 
	Route::post('/update/{id}',[UserCon::class,'user_update'])->name('user.update');

# How to add sweet alert on delete  copy and paste 

		<!-- sweet alert -->
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script type="text/javascript">
		$(function(){
		$(document).on('click','#delete',function(e){
		e.preventDefault();
		var link = $(this).attr("href");

		Swal.fire({
		title: 'Are you sure?',
		text: "Delete This Data!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
		if (result.isConfirmed) {
		window.location.href = link
		Swal.fire(
		'Deleted!',
		'Your file has been deleted.',
		'success'
		)
		}
		})

		});
		});
		</script>
End 
-----------------------------------------------------------------------------
# User Profile Manage
* use Auth;
* use App\Models\User;
* View profile page link :

		<a href="{{route('user.edit',$user->id)}}" class="btn btn-info">Edit</a>
		<a href="{{route('user.delete',$user->id)}}" class="btn btn-danger" id="delete">Delete</a>

* For this profile manage we rwquired view profile and edit profile page in view 
* Action Link:=> for updation 

		action="{{route('user.update',$editData->id)}}"

* Edit view page code for selection 

			<select name="gender" id="gender" required="" class="form-control">
			<option value="" selected="" disabled="">Select Role</option>
			<option value="Male" {{($editData->gender == "Male" ? "selected": "")}}>Admin</option>
			<option value="Female" {{($editData->gender == "Female" ? "selected": "")}}>user</option>
			</select>

* Routes :



		* use App\Http\Controllers\AdminCon;
		* use App\Http\Controllers\Backend\UserCon;

		Route::prefix('profile')->group(function(){
		//Profile view route 
		Route::get('/view',[ProfileCon::class,'profile_view'])->name('profile.view');

		//profile edit
		Route::get('/edit',[ProfileCon::class,'profile_edit'])->name('profile.edit');
		});
* Controller :

		    public function profile_view(){
		    	$id =Auth::User()->id;
		    	$user = User::find($id);
		    	return view('backend.user.view_profile',compact('user'));

		    }
		    public function profile_edit(){
		    	$id =Auth::User()->id;
		    	$editData = User::find($id);
		    	return view('backend.user.edit_profile',compact('editData'));
		    }
# 3. User Profile Image Upload Edit Update Database Part 3 done
# 4. User Profile Image Upload Edit Update Database Part 4

	enctype="multipart/form-data"

* Controller code :

		// Store data after updating 
		public function profile_store(Request $request){
		$data = User::find(Auth::user()->id);
		$data->name =$request->name;
		$data->email =$request->email;
		$data->mobile =$request->mobile;
		$data->address =$request->address;
		$data->gender =$request->gender;

		if ($request->file('image')) {
		$file = $request->file('image');
		@unlink(public_path('upload/user_image/'.$data->image));
		$filename = date('Ymdhi').$file->getClientOriginalname();
		$file->move(public_path('upload/user_image/'),$filename);
		$data['image']=$filename;
		}

		//end if 
		$data->save();
		$notification = array(
		'message' => 'user Profile updated successfully',
		'alert-type' => 'success'
		);
		return redirect()->route('profile.view')->with($notification);  
		}

# add this if user profile not showing in all page 
* Add this code in header file 

		@php 
		$user =DB::table('users')->where('id',Auth::user()->id)->first();
		@endphp
End 
-----------------------------------------------------------------------------
# 7. Manage User Profile :
# 5. User Profile Change Password Option Part 1 :

* Edit blade code :

		<div class="form-group">
		<h5>Current Password<span class="text-danger">*</span></h5>
		<div class="controls">
		<input id="current_password" type="password" name="oldpassword" class="form-control" >
		@error('oldpassword')
		<span class="text-danger"> {{ $message}}</span>
		@enderror
		</div>
		</div>

		<div class="form-group">
		<h5>New Password<span class="text-danger">*</span></h5>
		<div class="controls">
		<input name="password" id="password" type="password"  class="form-control"  >
		@error('password')
		<span class="text-danger"> {{ $message}}</span>
		@enderror
		</div>
		</div>

		<div class="form-group">
		<h5>Confirm Password<span class="text-danger">*</span></h5>
		<div class="controls">
		<input id="password_confirmation" type="password" name="password_confirmation" class="form-control" >
		@error('password_confirmation')
		<span class="text-danger"> {{ $message}}</span>
		@enderror
		</div>
		</div>
* Route :

		//password 
		Route::get('/password/view',[ProfileCon::class,'password_view'])->name('password.view');
* Controller :

		//password 
		public function password_view(){
		return view('backend.user.edit_password');
		}
End 
-----------------------------------------------------------------------------
# 6. User Profile Change Password Option Part 
* Make a route  for update :

		//update password 
		Route::post('/password/update',[ProfileCon::class,'password_update'])->name('password.update');

* Controller for update password :

		//update password 
		public function password_update(Request $request){
		$validateData = $request ->validate([
		'oldpassword' =>'required',
		'password' =>'required|confirmed',
		]);//end validation
		$hashedPassword =Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
		$user =User::find(Auth::id());
		$user->password=Hash::make($request->password);
		$user->save();
		Auth::logout();
		return redirect()->route('login');
		}else{
		return redirect()->back();
		}
		}//end method 

* Action => action="{{route('password.update')}}"

End 
-----------------------------------------------------------------------------
# 7. SideBar Menu Active Deactive Option

	@php
	$prefix = Request::route()->getPrefix();
	$route  =Route::current()->getName();
	@endphp
For route :

	class="{{($route == 'dashboard') ? 'active':''}}"

For prefix

		class="treeview {{($prefix == '/users') ? 'active':''}}"		
End 
-----------------------------------------------------------------------------
# 8. Student Class Management
* Make a route 
* Add route link on side bar 
* Make a folder name of setup then run make controller cmd

		php artisan make:Controller Backend/setup/StudentClassConn 
* Make a folder in backend folder with setup then create file view_class
* Controller code of view student 

		//student view 
		public function view_student(){
		$data['allData']= StudentClass::all();
		return view('backend.setup.student_class.view_class',$data);
		}

		//add class
		public function student_class_add(){
		return view('backend.setup.student_class.add_class');
		}

		// store class
		public function student_class_store(Request $request){
		$validateData = $request ->validate([
		'name' =>'required|unique:student_classes,name',

		]);

		$data = new StudentClass();
		$data->name =$request->name;
		$data->save();  

		$notification = array(
		'message' => 'Student Class inserted successfully',
		'alert-type' => 'success'
		);
		return redirect()->route('student.class.view')->with($notification);
		}

		//student class edit 
		public function student_class_edit($id){
		$editData =StudentClass::find($id);
		return view('backend.setup.student_class.edit_class',compact('editData'));
		}

# Routes 

		Route::get('/student/class/view',[StudentClassConn::class,'view_student'])->name('student.class.view');
		
		//add class 
		Route::get('/student/class/add',[StudentClassConn::class,'student_class_add'])->name('student.class.add');

		//store student class
		Route::post('/student/class/store',[StudentClassConn::class,'student_class_store'])->name('store.student.class');


		//Class edit 
		Route::get('/student/class/edit/{id}',[StudentClassConn::class,'student_class_edit'])->name('student.class.edit');


# View Code  link

	<a href="{{route('student.class.edit',$student->id)}}" >Edit</a>
	<a href="{{route('student.class.delete',$student->id)}}" id="delete">Delete</a>
* Add Class

		<a href="{{route('student.class.add')}}">Add Student Class</a>

* store  class action =>action="{{route('store.student.class')}}"

# Delete class

		//delete class
		public function student_class_delete($id){

		$user =StudentClass::find($id);
		$user->delete();

		$notification = array(
		'message' => 'Student Class deleted successfully',
		'alert-type' => 'error'
		);
		return redirect()->route('student.class.view')->with($notification);

		}

* Route :

		//delete clas
		Route::get('/student/class/delete/{id}',[StudentClassConn::class,'student_class_delete'])->name('student.class.delete');
* View 

		<a href="{{route('student.class.delete',$student->id)}}" class="btn btn-danger" id="delete">Delete</a>
End  8 part
-----------------------------------------------------------------------------

# Student year all controller code 
* need Model Class and Controller 

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

# Routes 

	//Student year routes
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
Button 

	<a href="{{route('student.year.edit',$year->id)}}" >Edit</a>
	<a href="{{route('student.year.delete',$year->id)}}" id="delete">Delete</a>

	<a href="{{route('student.year.add')}}" >Add Student year</a>
Form Action:

	<form action="{{route('store.student.year')}}" method="post">
This code is same like student class 
-----------------------------------------------------------------------------
============= End student year section =============
-----------------------------------------------------------------------------
# 10. Student Group Management
* need model and controller same like year 

# Controller code 

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

#Routes :

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

* view Link 

		<a href="{{route('student.group.edit',$group->id)}}" >Edit</a>
		<a href="{{route('student.group.delete',$group->id)}}"  id="delete">Delete</a>

* Edit Action 

		action="{{route('update.student.group',$editData->id)}}"
* Add group

		action="{{route('store.student.group')}}" 
end
-----------------------------------------------------------------------------
============= End student Group section =============
-----------------------------------------------------------------------------
# Student Shift sample code:

		use App\Models\StudentShift;

		//student shift view 
		public function view_shift(){
		$data['allData']= StudentShift::all();
		return view('backend.setup.shift.view_shift',$data);
		}

		//show add shift page 
		public function add_shift(){
		return view('backend.setup.shift.add_shift');
		}

		//store student shift page
		public function store_shift(Request $request){
		$validateData = $request ->validate([
		'name' =>'required|unique:student_shifts,name',

		]);//validation end 
		$data = new StudentShift();
		$data->name =$request->name;
		$data->save();  

		$notification = array(
		'message' => 'Student Shift inserted successfully',
		'alert-type' => 'success'
		);
		return redirect()->route('student.shift.view')->with($notification);
		}

		//edit shift  page view 
		public function student_shift_edit($id){
		$editData =StudentShift::find($id);
		return view('backend.setup.shift.edit_shift',compact('editData'));
		}

		public function student_shift_update(Request $request,$id){
		$data = StudentShift::find($id);
		$validateData = $request ->validate([
		'name' =>'required|unique:student_shifts,name,'.$data->id
		]); //validation 

		$data->name =$request->name;
		$data->save();  

		$notification = array(  //notification
		'message' => 'Student Shift updated successfully',
		'alert-type' => 'info'
		);
		return redirect()->route('student.shift.view')->with($notification);
		}//end update method 

		//Delete shift method 
		public function student_shift_delete($id){
		$user =StudentShift::find($id);
		$user->delete();

		$notification = array(
		'message' => 'Student Shift deleted successfully',
		'alert-type' => 'error'
		);
		return redirect()->route('student.shift.view')->with($notification);
		}


# Routes 

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

# View 

		<a href="{{route('student.shift.edit',$shift->id)}}" ">Edit</a>
		<a href="{{route('student.shift.delete',$shift->id)}}" id="delete">Delete</a>
View:

	href="{{route('student.shift.add')}}" 
	action="{{route('store.student.shift')}}"
Edit:

	"{{route('update.student.shift',$editData->id)}}" 
	 value="{{$editData->name}}"
Update:

		 action="{{route('update.student.group',$editData->id)}}"
end
-----------------------------------------------------------------------------
============= End student Shift section =============
-----------------------------------------------------------------------------
# 1. Working Fee Category Option Part 1
# Controller code:

use App\Models\FeeCategory;

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

#Route:

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

#  View Code:

		<a href="{{route('Fee.Category.add')}}"  style="float: right;">Add Fee Category</a>
* Edit Del buttons:

		<a href="{{route('fee.Category.edit',$fee->id)}}" >Edit</a>
		<a href="{{route('fee.Category.delete',$fee->id)}}" id="delete">Delete</a>

* update Action:

		value="{{$editData->name}}"
		action="{{route('update.Fee.Category',$editData->id)}}"
* Store action

		action="{{route('store.fee.Category')}}"
end
-----------------------------------------------------------------------------
============= End student Fee Category =============
-----------------------------------------------------------------------------
# 13. Manage Student Fee Category Amount

# Part 5. Working Fee Category Amount Part 5

END
------------------------------------------------------------------------------

# Route of fee amount update edit and addt
		// ======================== Fee amount ========================
		Route::get('/fee/Amount/view',[FeeAmountCon::class,'view_fee_Amt'])->name('fee.Amount.view');

		//Add fee abount 
		Route::get('/fee/Amount/add',[FeeAmountCon::class,'add_fee_Amt'])->name('Fee.Amount.add');

		//store fee amount 
		Route::post('/fee/Amount/store',[FeeAmountCon::class,'store_fee_Amt'])->name('store.fee.amount');

		//fee amountedit 
		Route::get('/fee/Amount/edit/{fee_category_id}',[FeeAmountCon::class,'fee_Amt_edit'])->name('fee.amount.edit');

		//Fee amount update
		Route::post('/fee/Amount/update/{fee_category_id}',[FeeAmountCon::class,'fee_Amt_update'])->name('update.fee.amount');

		//fee amount detail
		Route::get('/fee/Amount/details/{fee_category_id}',[FeeAmountCon::class,'fee_Amt_detail'])->name('fee.amount.details');

#Controller of fee amount update edit and add

//View Fee Amount 

    public function view_fee_Amt(){
		// $data['allData']= FeeCatAmount::all();
        $data['allData']= FeeCatAmount::select('fee_category_id')->groupBy('fee_category_id')->get();
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

    //Fee Amount edit 
    public function fee_Amt_edit($fee_category_id){
            $data['editData'] = FeeCatAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
            // dd($data['editData']->toArray());
            $data['fee_category']=FeeCategory::all();
        $data['classes']=StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amt',$data);
            
    }

    //update
    public function fee_Amt_update(Request $request, $fee_category_id){
        if ($request->class_id == NULL) {
            $notification = array(
            'message' => 'Sorry you dont select any class Amount',
            'alert-type' => 'error'
            );
    return redirect()->route('fee.amount.edit',$fee_category_id)->with($notification);
            // dd('Error');
        }//end if 
        else{
            
            	$countClass = count($request->class_id);
     FeeCatAmount::where('fee_category_id',$fee_category_id)->delete();
            	for ($i=0; $i < $countClass ; $i++) { 
                $fee_amount = new FeeCatAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }    //end for loop
    

        } //end else 
       		 $notification = array(
            'message' => 'Data updated successfully',
            'alert-type' => 'success'
            );
return redirect()->route('fee.Amount.view')->with($notification);

    }//end method 

    //details  fee amount 
    	public function fee_Amt_detail($fee_category_id){
         $data['detailData'] = FeeCatAmount::where('fee_category_id',$fee_category_id)->orderBy('class_id','asc')->get();
         return view('backend.setup.fee_amount.details_fee_amt',$data);
    } 
#Model Code for relation:

		public function fee_category(){
		return $this->belongsTo(FeeCategory::class,'fee_category_id','id');
		}

		public function student_class(){
		return $this->belongsTo(StudentClass::class,'class_id','id');
		}
# For View code check backend/setup/fee_amount folder 
end
-----------------------------------------------------------------------------
============= End student Fee fee_amount =============
-----------------------------------------------------------------------------
# Exam type Controller code 

	////Fee cat view 
	public function view_exam_type(){
	$data['allData']= ExamType::all();
	return view('backend.setup.exam.view_exam_type',$data);
	}

	//view page for examm type add
	public function view_exam_add(){
	return view('backend.setup.exam.add_exam_type');
	}

	//Store Exam type 
	public function store_exam_type(Request $request){
	$validateData = $request ->validate([
	'name' =>'required|unique:exam_types,name',
	]); 

	$data= new ExamType();
	$data->name =$request->name;
	$data->save();
	$notification = array(
	'message' => 'Exam Type inserted successfully',
	'alert-type' => 'success'
	);
	return redirect()->route('exam.type.view')->with($notification);
	}

	//edit exam type
	public function edit_exam_type($id){
	$editData =ExamType::find($id);
	return view('backend.setup.exam.edit_exam_type',compact('editData'));
	}

	//update exam type  edit data
	public function update_exam_type(Request $request, $id){
	$data = ExamType::find($id);
	$validateData = $request ->validate([
	'name' =>'required|unique:exam_types,name,'.$data->id
	]); 

	$data->name =$request->name;
	$data->save();
	$notification = array(
	'message' => 'Exam Type Updated successfully',
	'alert-type' => 'success'
	);
	return redirect()->route('exam.type.view')->with($notification);

	}
	//delete exam type
	public function delete_exam_type($id){
	$user =ExamType::find($id);
	$user->delete();

	$notification = array(
	'message' => 'Exam Type deleted successfully',
	'alert-type' => 'error'
	);
	return redirect()->route('exam.type.view')->with($notification);
	}

# Route for exam type :

	//======================== Exam Type route ========================
	Route::get('/exam/type/view',[ExamTypeCon::class,'view_exam_type'])->name('exam.type.view');

	//add exam type view page 
	Route::get('/exam/type/add',[ExamTypeCon::class,'view_exam_add'])->name('exam.type.add');
	//store exam type 
	Route::post('/exam/type/store',[ExamTypeCon::class,'store_exam_type'])->name('store.exam.type');

	//edit exam type
	Route::get('/exam/type/edit/{id}',[ExamTypeCon::class,'edit_exam_type'])->name('exam.type.edit');

	//update exam type 
	Route::post('/exam/type/update/{id}',[ExamTypeCon::class,'update_exam_type'])->name('update.exam.type');

	//delete exam type 
	Route::get('/exam/type/delete/{id}',[ExamTypeCon::class,'delete_exam_type'])->name('exam.type.delete');

# Migration controller should be updated 
* File should be imported in web.php and model class imported in controller 
* Then view: View, edit add file should be included in exam folder 

end
-----------------------------------------------------------------------------
Now This exam type is end 
-----------------------------------------------------------------------------
# School subject Controller code 

		use Illuminate\Http\Request;
		use App\Models\SchoolSubject;

		// view subject 
		public function view_subject(){
		$data['allData']= SchoolSubject::all();
		return view('backend.setup.school_subject.view_school_sub',$data);
		}    

		// show page for add subject 
		public function add_subject(){
		return view('backend.setup.school_subject.add_school_sub');
		}

		//store subject 
		public function store_subject(Request $request){
		$validateData = $request ->validate([
		'name' =>'required|unique:school_subjects,name',
		]); 

		$data= new SchoolSubject();
		$data->name =$request->name;
		$data->save();
		$notification = array(
		'message' => 'Subject inserted successfully',
		'alert-type' => 'success'
		);
		return redirect()->route('school.subject.view')->with($notification);


		}
		//edit
		public function edit_subject($id){
		$editData =SchoolSubject::find($id);
		return view('backend.setup.school_subject.school_subjects',compact('editData'));
		}

		//update subject 
		public function update_subject(Request $request,$id){
		$data = SchoolSubject::find($id);
		$validateData = $request ->validate([
		'name' =>'required|unique:school_subjects,name,'.$data->id
		]); 

		$data->name =$request->name;
		$data->save();
		$notification = array(
		'message' => 'Subject Updated successfully',
		'alert-type' => 'success'
		);
		return redirect()->route('school.subject.view')->with($notification);
		}

		//Delete subject 
		public function delete_subject($id){
		$user = SchoolSubject::find($id);
		$user->delete();

		$notification = array(
		'message' => 'Subject Deleted successfully',
		'alert-type' => 'error'
		);
		return redirect()->route('school.subject.view')->with($notification);
		}

# ====================== School subject routes ======================
	//======================== School subject routes =======================

	//View subject 
	Route::get('/school/subject/view',[SchoolSubjectCon::class,'view_subject'])->name('school.subject.view');

	//add subject 
	Route::get('/school/subject/add',[SchoolSubjectCon::class,'add_subject'])->name('School.Subject.add');

	// store subject 
	Route::post('/school/subject/store',[SchoolSubjectCon::class,'store_subject'])->name('store.school.Subject');

	//edit subject
	Route::get('/school/subject/edit/{id}',[SchoolSubjectCon::class,'edit_subject'])->name('school.subject.edit');

	//Update 
	Route::post('/school/subject/update/{id}',[SchoolSubjectCon::class,'update_subject'])->name('update.school.subject');

	//Delete 
	Route::get('/school/subject/delete/{id}',[SchoolSubjectCon::class,'delete_subject'])->name('school.subject.delete');

End 
-------------------------------------------------------------------------------
# ====================== Assign school subject ======================
	amespace App\Http\Controllers\backend\setup;

	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use App\Models\AssigneSubject;
	use App\Models\StudentClass;
	use App\Models\SchoolSubject;



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
	
# ====================== Routes ======================

	//====================== Assigne Subject ======================

	Route::get('/Assigne/subject/view',[AssigneSubjectCon::class,'view_assigne_sub'])->name('Assigne.subject.view');

	//Add Assigne Subject 
	Route::get('/Assigne/Subject/add',[AssigneSubjectCon::class,'add_assigne_sub'])->name('assigne.subject.add');

	//store Assigne Subject 
	Route::post('/Assigne/Subject/store',[AssigneSubjectCon::class,'store_assigne_sub'])->name('store.assign.subject');

	//fee amountedit 
	Route::get('/Assigne/Subject/edit/{class_id}',[AssigneSubjectCon::class,'assign_sub_edit'])->name('assign.subject.edit');

	//Fee Subject update
	Route::post('/Assigne/Subject/update/{class_id}',[AssigneSubjectCon::class,'assign_sub_update'])->name('update.assign.subject');

	//fee Subject detail
	Route::get('/Assigne/Subject/details/{class_id}',[AssigneSubjectCon::class,'assign_sub_detail'])->name('assign.subject.details');

End Assign Subject section 
-------------------------------------------------------------------------------
For view page code Check assigne_sub/.... and school_subject
-------------------------------------------------------------------------------

# ================  Designation Controller  ================
	
	Model and Controller Class should be needed 
	View page should be updated with View, edit & add

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

# Designation Routes :
	//================ Designation All routes ================

	//View subject 
	Route::get('/designation/view',[DesignationCont::class,'view_designation'])->name('designation.view');

	// //add designation 
	Route::get('/designation/add',[DesignationCont::class,'add_designation'])->name('designation.add');

	//store designation 
	Route::post('/designation/store',[DesignationCont::class,'store_designation'])->name('store.designation');

	//edit designation
	Route::get('/designation/edit/{id}',[DesignationCont::class,'edit_designation'])->name('designation.edit');

	//Update designation
	Route::post('/designation/update/{id}',[DesignationCont::class,'update_designation'])->name('update.designation');

	// //Delete designation
	Route::get('/designation/delete/{id}',[DesignationCont::class,'delete_designation'])->name('designation.delete');
End designation section 
-------------------------------------------------------------------------------
designation End designation section 
-------------------------------------------------------------------------------
# Iablen you want to update DB fields by migration file 

* 1st add new fields in migration file and save properly 
* Save all  old data  
* 2nd run roll back command for delete user table from DB 
* php artisan migrate:rollback
* after that insert table run this 
* php artisan migrate


# Add Condition 

     @if(Auth::user()->role == 'admin')

        add here data for special person and another
    @endif
8. Student Registration Part 13 fully done

For pdf package :

change memory linit -1  from php ini

memory_limit=-1

composer require niklasravnsborg/laravel-pdf
goto config app.php file 
for check package 
 	1		Composer dump-autoload 
for clean cache
	2		php artisan config:cache
	3		php artisan cache:clear 
    4 		php artisan view:clear 
