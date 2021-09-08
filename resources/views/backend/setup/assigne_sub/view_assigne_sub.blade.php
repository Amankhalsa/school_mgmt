@extends('admin.admin_master')
@section('title', 'Assigne Subject')
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
				  <h3 class="box-title">Assigne Subject list</h3>
				  <a href="{{route('assigne.subject.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Assigne Subject</a>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
				<tr>
					<th width="5%">Sl</th>
				
					<th>Class Name </th>
					
					<th width="25%">Action </th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($allData as $key => $assigne)
				<tr>
					<td>{{$key+1 }} </td>
				
					<td>{{$assigne['class_name']['name']}}</td>
				
					<td>
<a href="{{route('assign.subject.edit',$assigne->class_id)}}" class="btn btn-info">Edit</a>
<a href="{{route('assign.subject.details',$assigne->class_id)}}" class="btn btn-dark" >Detail</a>


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