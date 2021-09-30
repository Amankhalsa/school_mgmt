@extends('admin.admin_master')
@section('title', 'Add Student')
@section('admin')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


  <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add Student :</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form action="{{route('store.student.registration')}}" method="post" enctype="multipart/form-data">
	@csrf
<!-- ========================= First ================================ -->

<div class="row"> <!-- Start row  -->
	<div class="col-md-4"><!-- start  col md 4 -->
	<div class="form-group">
			<h5>Student Name<span class="text-danger">*</span></h5>
			<div class="controls">
			<input  type="text" name="name" class="form-control"  required="">
			</div>
	</div>
	</div> <!-- end col md 4 -->

	<div class="col-md-4"><!-- start  col md 4 -->
	<div class="form-group">
			<h5>Father  Name<span class="text-danger">*</span></h5>
			<div class="controls">
			<input  type="text" name="fname" class="form-control" required="">
			</div>
	</div>
	</div> <!-- end col md 4 -->

		<div class="col-md-4"><!-- start  col md 4 -->
	<div class="form-group">
			<h5>Mother Name<span class="text-danger">*</span></h5>
			<div class="controls">
			<input  type="text" name="mname" class="form-control"  required="">
			</div>
	</div>
	</div> <!-- end col md 4 -->
</div>  <!-- end Row -->

<!-- ========================== Second =============================== -->

<div class="row"> <!-- Start row  -->
	<div class="col-md-4"><!-- start  col md 4 -->
	<div class="form-group">
			<h5>Mobile <span class="text-danger">*</span></h5>
			<div class="controls">
			<input  type="text" name="mobile" class="form-control"  required="" maxlength="10">
			</div>
	</div>

	</div> <!-- end col md 4 -->
	<div class="col-md-4"><!-- start  col md 4 -->
	<div class="form-group">
			<h5>Address  Name<span class="text-danger">*</span></h5>
			<div class="controls">
			<input  type="text" name="address" class="form-control" required="">
			</div>
	</div>
	</div> <!-- end col md 4 -->

		<div class="col-md-4"><!-- start  col md 4 -->
	<div class="form-group">
			<h5>Gender<span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="gender" required="" class="form-control">
				<option value="" selected="" disabled="">Select Gender</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select>
			</div>
	</div>
	</div> <!-- end col md 4 -->
</div>  <!-- end Row -->

<!-- =========================== Third ============================== -->

<div class="row"> <!-- Start row  -->
	<div class="col-md-4"><!-- start  col md 4 -->		
	<div class="form-group">
			<h5>Religion <span class="text-danger">*</span></h5>
			<div class="controls">
			<select name="religion" required="" class="form-control">
			<option value="" selected="" disabled="">Select Religion</option>
			<option value="Sikh">Sikh </option>
			<option value="Hindu">Hindu</option>
			<option value="Muslim">Muslim</option>
			<option value="Christan">Christan</option>
			</select>
			</div>
	</div>
	</div> <!-- end col md 4 -->

	<div class="col-md-4"><!-- start  col md 4 -->		
	<div class="form-group">
			<h5>Date of birth <span class="text-danger">*</span></h5>
			<div class="controls">
			<input  type="date" name="dob" class="form-control"  required="">
			</div>
	</div>
	</div> <!-- end col md 4 -->
	<div class="col-md-4"><!-- start  col md 4 -->
		
	<div class="form-group">
		<h5>Discount  Name<span class="text-danger"></span></h5>
		<div class="controls">
		<input  type="text" name="discount" class="form-control" required="">
			</div>
	</div>
	</div> <!-- end col md 4 -->
</div>  <!-- end Row -->


<!-- =========================== fourth ============================== -->
<div class="row"> <!-- Start row  -->

	<div class="col-md-4"><!-- start  col md 4 -->
		
	<div class="form-group">
			<h5>Class <span class="text-danger"></span></h5>
			<div class="controls">
				<select name="class_id" required="" class="form-control">
				<option value="" selected="" disabled="">Select Class</option>	
@foreach($classes as $class)
		<option value="{{$class->id}}">{{ $class->name}} </option>
@endforeach
				</select>
			</div>
	</div>
	</div> <!-- end col md 4 -->


		<div class="col-md-4"><!-- start  col md 4 -->	
	<div class="form-group">
			<h5>Year  <span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="year_id" required="" class="form-control">
				<option value="" selected="" disabled="">Select Year</option>
			@foreach($years as $year)
			<option value="{{$year->id}}">{{$year->name}}</option>
		@endforeach
				</select>
			</div>
	</div>
	</div> <!-- end col md 4 -->
	<div class="col-md-4"><!-- start  col md 4 -->		
	<div class="form-group">
			<h5>Group <span class="text-danger">*</span></h5>
			<div class="group_id">
			<select name="group_id" required="" class="form-control">
			<option value="" selected="" disabled="">Select Group</option>
			@foreach($groups as $group)
			<option value="{{$group->id}}">{{$group->name}} </option>
			@endforeach
			</select>
			</div>
	</div>
	</div> <!-- end col md 4 -->
</div>  <!-- end Row -->

<!-- =========================== fifth ============================== -->

<div class="row"> <!-- Start row  -->

	<div class="col-md-4"><!-- start  col md 4 -->
		
	<div class="form-group">
			<h5>Shift <span class="text-danger">*</span></h5>
			<div class="controls">
				<select name="shift_id" required="" class="form-control">
				<option value="" selected="" disabled="">Select Shift</option>	
@foreach($shifts as $shift)
		<option value="{{$shift->id}}">{{ $shift->name}} </option>
@endforeach
				</select>
			</div>
	</div>
	</div> <!-- end col md 4 -->


		<div class="col-md-4"><!-- start  col md 4 -->
		
	<div class="form-group">
			<h5>Profile Image<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="file" name="image" class="form-control" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
			</div>
	</div>

	

	</div> <!-- end col md 4 -->
	<div class="col-md-4"><!-- start  col md 4 -->		
	<div class="form-group">
			
			<div class="controls">
			<img src="{{(!empty($editData->image)) ? url('upload/user_image/'.$editData->image): url('upload/no_image.jpg')}}" width="100" height="100" id="output">
			</div>
	</div>
	</div> <!-- end col md 4 -->
</div>  <!-- end Row -->


<!-- =========================== fifth ============================== -->


<div class="text-xs-right">
<input type="submit" class="btn btn-rounded btn-info mb-5" value="Save">
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