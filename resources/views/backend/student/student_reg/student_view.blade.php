@extends('admin.admin_master')
@section('title', 'View Student')
@section('admin')


  
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	  <div class="container-full">
		<!-- Content Header (Page header) -->


		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
	 

			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Student list</h3>
				  <a href="{{route('student.registration.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Student </a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
				<tr>
					<th width="5%">Sl</th>
				
					<th>Class </th>
					<th>Id no</th>
					
					<th width="25%">Action </th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($allData as $key => $value)
				<tr>
					<td>{{$key+1 }} </td>
					
					<td>{{$value->class_id}}</td>
					<td>{{$value->year_id}}</td>
				
					<td>
<a href="" class="btn btn-info">Edit</a>
<a href="" class="btn btn-danger" id="delete">Delete</a>


					</td>
					
				</tr>
				@endforeach	
						</tbody>
						<tfoot>
						
						</tfoot>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			          
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
  
   

@endsection