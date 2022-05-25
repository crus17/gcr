<?php
	if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";

}
?>
@extends('layouts.app')
    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
			<div class="content bg-{{$bg}}">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<h1 class="title1 text-{{$text}}">Request for Withdrawal</h1>
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
					<div class="row mb-5">
					@foreach($wmethods as $method)
					<div class="col-lg-4 p-3 rounded card bg-{{$bg}}">
							<div class="card-body shadow border-danger">
							<h2 class="card-title mb-3 text-{{$text}}"> {{$method->name}}</h2>
								<h4 class="text-{{$text}}">Minimum amount: <strong style="float:right;"> {{$settings->currency}}{{$method->minimum}}</strong></h4><br>
								
								<h4 class="text-{{$text}}">Maximum amount:<strong style="float:right;"> {{$settings->currency}}{{$method->maximum}}</strong></h4><br>
								
								<h4 class="text-{{$text}}">Charges (Fixed):<strong style="float:right;"> {{$settings->currency}}{{$method->charges_fixed}}</strong></h4><br>
								
								<h4 class="text-{{$text}}">Charges (%): <strong style="float:right;"> {{$method->charges_percentage}}%</strong></h4><br>
								
								<h4 class="text-{{$text}}">Duration:<strong style="float:right;"> {{$method->duration}}</strong></h4><br>
								<div class="text-center">
									<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#withdrawalModal{{$method->id}}"><i class="fa fa-plus"></i> Request withdrawal</a>
								</div>
								
							</div>
						</div>
						
							<!-- Withdrawal Modal -->
							<div id="withdrawalModal{{$method->id}}" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header bg-{{$bg}}">
								  <h4 class="modal-title text-{{$text}}">Payment will be sent through your selected method.</h4>
									<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
								  </div>
								  <div class="modal-body bg-{{$bg}}">
										<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@withdrawal')}}">
											   <input class="form-control p-3 text-{{$text}} bg-{{$bg}}" placeholder="Enter amount here" type="text" name="amount" required><br/>
											   <input  class="form-control text-{{$text}} bg-{{$bg}} " value="{{$method->name}}" type="text" disabled><br/>
											   <input value="{{$method->name}}" type="hidden" name="payment_mode">
											   <input value="{{$method->id}}" type="hidden" name="method_id"><br/>
											   
											   <input type="hidden" name="_token" value="{{ csrf_token() }}">
											   <input type="submit" class="btn btn-primary" value="Submit" onclick="this.disabled = true; form.submit(); this.value='Please Wait ...';" />
									   </form>
								  </div>
								</div>
							  </div>
							</div>
							<!-- /Withdrawals Modal -->
							@endforeach
					</div>
					{{-- <div class="row">
						<div class="col card bg-{{$bg}} p-3">
							<h3 class="title1 text-{{$text}}">Your Withdrawal History</h3>
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
							<table class="table table-hover text-{{$text}}"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Amount requested</th>
											<th>Amount + charges</th>
											<th>Recieving mode</th>
											<th>Status</th> 
											<th>Date created</th>
										</tr> 
									</thead> 
									<tbody> 
										@foreach($withdrawals as $withdrawal)
										<tr> 
											<th scope="row">{{$withdrawal->id}}</th>
											<td>{{$withdrawal->amount}}</td>
											<td>{{$withdrawal->to_deduct}}</td> 
											<td>{{$withdrawal->payment_mode}}</td> 
											<td>{{$withdrawal->status}}</td> 
											<td>{{$withdrawal->created_at}}</td> 
										</tr> 
										@endforeach
									</tbody> 
								</table>
							</div>
						</div>
					</div> --}}
				</div>
			</div>
	@endsection