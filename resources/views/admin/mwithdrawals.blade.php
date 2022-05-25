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
			<div class="content bg-{{Auth('admin')->User()->dashboard_style}}">
				<div class="page-inner">
					<div class="mt-2 mb-4"> 
					<h1 class="title1 text-{{$text}}">Manage clients withdrawals</h1>
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
							<form class="form-inline" role="form" method="post" action="{{action('Admin\HomeController@searchWt')}}">
								<a class="btn btn-{{$text}} m-2" href="{{ url('admin/dashboard/mwithdrawals') }}">Show all</a>
								<input placeholder="Search by user ID, Status, Payment mode, Amount" class="form-control shadow-sm bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" type="text" name="wtquery" required>
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="submit"  class="m-2 btn btn-{{$text}}" value="Search">
							</form>
						</div>
					</div> --}}
		
					<div class="row mb-5">
						<div class="col card p-3 shadow bg-{{Auth('admin')->User()->dashboard_style}}">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								<span style="margin:3px;">
								<table id="ShipTable" class="table table-hover text-{{$text}}"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Client name</th>
											<th>Amount requested</th>
											<th>Amount + charges</th>
											<th>Payment mode</th>
											<th>Receiver's email</th>
											<th>Status</th> 
											<th>Date created</th>
											<th>Option</th>
										</tr> 
									</thead> 
									<tbody> 
										@foreach($withdrawals as $deposit)
										<tr> 
											<th scope="row">{{$deposit->id}}</th>
											<td>{{$deposit->duser->name}}</td>
											<td>{{$deposit->amount}}</td> 
											<td>{{$deposit->to_deduct}}</td> 
											<td>{{$deposit->payment_mode}}</td> 
											<td>{{$deposit->duser->email}}</td> 
											<td>{{$deposit->status}}</td> 
											<td>{{\Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString()}}</td> 
											<td>
											@if($deposit->status =="Processed") 
											<a class="btn btn-success btn-sm" href="#">Processed</a>
											@else
											<a class="btn btn-primary btn-sm m-1" href="{{ url('admin/dashboard/pwithdrawal') }}/{{$deposit->id}}">Process</a>
											@endif
											<a href="#" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#viewModal{{$deposit->id}}"><i class="fa fa-eye"></i> View</a>
											</td> 
										</tr> 
										
										<!-- View info modal-->
										<div id="viewModal{{$deposit->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
			
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}} ">
												<h4 class="modal-title text-{{$text}}">{{$deposit->duser->name}} withdrawal details.</strong></h4>
												<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
												@if($deposit->payment_mode=='Bitcoin')
												<h3 class="text-{{$text}}">BTC Wallet:</h3>
												<h4 class="text-{{$text}}">{{$deposit->duser->btc_address}}</h4><br>
												@elseif($deposit->payment_mode=='Ethereum')
												<h3 class="text-{{$text}}">ETH Wallet:</h3>
												<h4 class="text-{{$text}}">{{$deposit->duser->eth_address}}</h4><br>
												@elseif($deposit->payment_mode=='Litecoin')
												<h3 class="text-{{$text}}">LTC Wallet:</h3>
												<h4 class="text-{{$text}}">{{$deposit->duser->ltc_address}}</h4><br>
												@elseif($deposit->payment_mode=='Bank transfer')
												<h4 class="text-{{$text}}">Bank name: {{$deposit->duser->bank_name}}</h4><br>
												<h4 class="text-{{$text}}">Account name: {{$deposit->duser->account_name}}</h4><br>
												<h4 class="text-{{$text}}">Account number: {{$deposit->duser->account_no}}</h4>
												@else
												<h4 class="text-{{$text}}">Get in touch with client. <br><br>{{$deposit->duser->email}}</h4>
												@endif
											</div>
											</div>
										</div>
										</div>
										<!--End View info modal-->
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