@extends('admin.admin_master')
@section('title', 'Edit user')
@section('admin')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


  <section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Add User:</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
<form action="{{route('user.update',$editdata->id)}}" method="post">
	@csrf
<div class="row">
<div class="col-12">	
<div class="row">


<div class="col-md-6">
		
	<div class="form-group">
		<h5>Select User Role <span class="text-danger">*</span></h5>
		<div class="controls">
				<select name="role"  required="" class="form-control">
				<option value="" selected="" disabled="">Select Role</option>
<option value="Admin" {{($editdata->role == "Admin" ? "selected": "")}}>Admin</option>
<option value="operator" {{($editdata->role == "operator" ? "selected": "")}}>operator</option>
				</select>
		</div>
	</div>

</div> <!-- end col md 6 -->

<div class="col-md-6">
		<div class="form-group">
			<h5>User Name<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="text" name="name" class="form-control" required=""  value="{{$editdata->name}}">
			</div>

		</div>
</div>  <!--  end 2nd col md 6 -->
	
<div class="col-md-6"> <!-- col div start  -->

	<div class="form-group">
			<h5>User Email<span class="text-danger">*</span></h5>
			<div class="controls">
			<input type="email" name="email" class="form-control" required="" value="{{$editdata->email}}">
			</div>
	</div>
		
</div>    <!-- col div  --> 

<div class="col-md-6">



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