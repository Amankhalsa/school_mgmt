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
				  <h3 class="box-title">Fee Amount Details</h3>
				  <a href="{{route('Fee.Amount.add')}}" class="btn btn-rounded btn-success mb-5" style="float: right;">Add Fee Amount</a>
				</div>
				<!-- /.box-header -->

				<div class="box-body">
					<div class="table-responsive">
						<h4><strong>Fee Category :</strong> {{$detailData['0']['fee_category']['name']}}</h4>
					  <table  class="table table-bordered table-striped">
						<thead class="thead-light">
				<tr>
					<th width="5%">Sl</th>
				
					<th>Class Name</th>
					
					<th width="25%">Amount </th>
					
				</tr>
			</thead>
			<tbody>
				@foreach($detailData as $key => $detail)
				<tr>
					<td>{{$key+1 }} </td>
				
					<td>{{$detail['student_class']['name']}}</td>
				
					<td> {{$detail->amount}}</td>
					
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