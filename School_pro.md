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
