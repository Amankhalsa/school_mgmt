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

		php artisan migrate:rollback 

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