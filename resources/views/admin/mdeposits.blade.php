<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>
@extends('layouts.app')
    @section('content')
        @include('admin.topmenu')
        @include('admin.sidebar')
		<div class="main-panel">
			<div class="content bg-{{Auth('admin')->User()->dashboard_style}} ">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<h1 class="title1 text-{{$text}}">Manage clients deposits</h1>
					</div>
					@if(Session::has('message'))
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> {{ Session::get('message') }}
							</div>
						</div>
					</div>
					@endif
		
					@if(count($errors) > 0)
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissable" role="alert" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								@foreach ($errors->all() as $error)
								<i class="fa fa-warning"></i> {{ $error }}
								@endforeach
							</div>
						</div>
					</div>
					@endif
					{{-- <div class="row mb-5">
						<div class="col">
							<form class="form-inline m-2" method="post" action="{{action('Admin\HomeController@searchDp')}}">
								<a class="btn btn-{{$text}}  m-2" href="{{ url('admin/dashboard/mdeposits') }}">Show all</a>
								<input style="" placeholder="Search by user ID, Status, Payment mode, Amount" class="bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}} shadow-sm form-control" type="text" name="query" required>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit"  class="btn btn-{{$text}} m-2" value="Search">
							</form>
						</div>
					</div> --}}
					<div class="row mb-5">
						<div class="col card shadow p-4 bg-{{Auth('admin')->User()->dashboard_style}}">
							<div class="table-responsive" data-example-id="hoverable-table"> 
								<table id="ShipTable" class="table table-hover text-{{$text}}"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Client name</th>
											<th>Client email</th>
											<th>Amount</th>
											<th>Payment mode</th>
											<th>Plan</th>
											<th>Status</th> 
											<th>Date created</th>
											<th>Option</th>
										</tr> 
									</thead> 
									<tbody> 
										@foreach($deposits as $deposit)
										<tr> 
											<th scope="row">{{$deposit->id}}</th>
											<td>{{$deposit->duser->name}}</td>
											<td>{{$deposit->duser->email}}</td> 
											<td>${{$deposit->amount}}</td> 
											<td>{{$deposit->payment_mode}}</td>
											@if(isset($deposit->dplan->name)) 
											<td>{{$deposit->dplan->name}}</td>
											@else
											<td>Account funds</td>
											@endif
											<td>{{$deposit->status}}</td> 
											<td>{{\Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString()}}</td> 
											<td> 
											<a href="#" class="btn btn-{{$text}} btn-sm m-1" data-toggle="modal" data-target="#popModal{{$deposit->id}}" title="View payment proof">
												<i class="fa fa-eye"></i>
												</a>
												
												<a href="{{ url('admin/dashboard/deldeposit') }}/{{$deposit->id}}" class="btn btn-danger btn-sm m-1">Delete</a>
												@if($deposit->status =="Processed") 
												<a class="btn btn-success btn-sm" href="#">Processed</a>
												@else
												<a class="btn btn-primary btn-sm" href="{{ url('admin/dashboard/pdeposit') }}/{{$deposit->id}}">Process</a>
												@endif
											
											</td> 
										</tr> 
										
											<!-- POP Modal -->
									<div id="popModal{{$deposit->id}}" class="modal fade" role="dialog">
									<div class="modal-dialog">
		
										<!-- Modal content-->
										<div class="modal-content">
										<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
											<h4 class="modal-title text-{{$text}}">{{$deposit->duser->name}} proof of payment</h4>
											<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
											<img src="{{$settings->site_address}}/cloud/app/images/{{$deposit->proof}}" style="max-width:100%; height: auto;">
										</div>
										</div>
									</div>
									</div>
									<!-- /POP Modal -->
										@endforeach
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>	
			</div>
				
		@include('admin.includes.modals')
	@endsection