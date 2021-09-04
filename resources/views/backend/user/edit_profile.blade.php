@extends('admin.admin_master')
@section('title', 'Edit')
@section('admin')


 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


  <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Manage Profile:</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form action="{{route('profile.store')}}" method="post" enctype="multipart/form-data">
	@csrf
<div class="row">
<div class="col-12">	
<div class="row">

<!-- end col md 6 -->

<div class="col-md-6">
		<div class="form-group">
			<h5>User Name<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="name" class="form-control" required=""  value="{{$editData->name}}">
			</div>

		</div>
</div>  <!--  end 2nd col md 6 -->
	
<div class="col-md-6"> <!-- col div start  -->

	<div class="form-group">
			<h5>User Email<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="email" name="email" class="form-control" required="" value="{{$editData->email}}">
			</div>
	</div>
		
</div>    <!-- col div  --> 

<div class="col-md-6">

	<div class="form-group">
			<h5>User Mobile<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="mobile" class="form-control" required="" value="{{$editData->mobile}}" maxlength="10">
			</div>
	</div>
		
</div>   

<div class="col-md-6">

	<div class="form-group">
			<h5>User address<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="address" class="form-control" required="" value="{{$editData->address}}">
			</div>
	</div>
		
</div>  

<div class="col-md-6">

<div class="form-group">
		<h5>Select Gender <span class="text-danger">*</span></h5>
		<div class="controls">
				<select name="gender" id="gender" required="" class="form-control">
				<option value="" selected="" disabled="">Select Role</option>
				<option value="Male" {{($editData->gender == "Male" ? "selected": "")}}>Male</option>
				<option value="Female" {{($editData->gender == "Female" ? "selected": "")}}>Female</option>
				</select>
		</div>
</div>
		
</div>  



<div class="col-md-6">

	<div class="form-group">
			<h5>Profile Image<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="file" name="image" class="form-control" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
			</div>
	</div>

		<div class="form-group">
			
			<div class="controls">
			<img src="{{(!empty($editData->image)) ? url('upload/user_image/'.$editData->image): url('upload/no_image.jpg')}}" width="100" height="100" id="output">
			</div>
	</div>
		
</div>  

</div>   <!-- end col -->
</div>   <!--  end main row -->









<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
</div>
</form>

				</div>
				<!-- /.col -->
			  </div>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</section>
  
	  </div>
  </div>
   

@endsection