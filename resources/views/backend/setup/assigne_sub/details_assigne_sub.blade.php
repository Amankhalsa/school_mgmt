@extends('admin.admin_master')
@section('title', 'View Detail')
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
				  <h3 class="box-title">Assign Subject  Details</h3>
				  <a href="{{route('assigne.subject.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Assign Subject</a>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					<div class="table-responsive">
						<h4><strong>Assign Subject :</strong> {{$detailData['0']['class_name']['name']}}</h4>
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
				<tr>
					<th width="5%">Sl</th>
				
					<th>Subject Name</th>
					
					<th width="20%">Full Mark </th>
					<th width="20%">Pass Mark </th>

					<th width="20%">Subjective Mark </th>

					
				</tr>
			</thead>
			<tbody>
				@foreach($detailData as $key => $detail)
				<tr>
					<td>{{$key+1 }} </td>
				
					<td>{{$detail['school_subject']['name']}}</td>
				
					<td> {{$detail->full_mark}}</td>
					<td> {{$detail->pass_mark}}</td>

					<td> {{$detail->subjective_mark}}</td>

					
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