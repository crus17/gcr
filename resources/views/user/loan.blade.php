<?php
	if (Auth::user()->dashboard_style == "light") {
		$bg="light";
		$text = "dark";
	} else {
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
						<h1 class="title1 text-{{$text}}">Loan Request</h1>
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
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									@foreach ($errors->all() as $error)
									<i class="fa fa-warning"></i> {{ $error }}
									@endforeach
								</div>
							</div>
						</div>
                	@endif
					<div class="row">
						<div class="col card bg-{{$bg}} shadow-lg p-4">
						    
							<div>
								<!-- Form Starts -->
        						<form  class="form" method="POST" action="{{ action('SomeController@saveloanrequest') }}" enctype="multipart/form-data">
                                    {{csrf_field()}}   
                                    <!-- Input Field Starts -->
                                    
                                    <!--<input style="padding:5px;" class="form-control bg-light text-dark" placeholder="Enter amount here" type="text" name="amount" required><br/>-->
        							
                                    <div style="padding:5px;" class="form__group">
                                        
                                        <!--<label for="amount" style="color:green;" class="form__label">How much would you like to borrow?</label>-->
        								<input  class="form-control bg-light text-dark" id="amount" autocomplete="off" placeholder="Enter Loan Amount"  name="amount" type="number" value="{{ old('amount') }}" required>
                                        @if ($errors->has('amount'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('amount') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div style="padding:5px;" class="form__group">
                                        <select  class="form-control bg-light text-dark" name="repayments" id="repayments">
            								<option value="None">How many repayments?</option>
            								<option value="1">1</option>
            								<option value="2">2</option>
            								<option value="3">3</option>
                                        </select>
                                    </div>
                                    
        							<!-- Submit Form Button Starts -->
        							<div class="form__group text-center">
        								<button class="btn btn__login" type="submit">Submit Request</button>
                                    </div>
                                    
        							<!-- Submit Form Button Ends -->
                                </form>
                                <!-- Form Ends -->
							</div>
							
							
						</div>
					</div>
					
					
    					<div class="mt-2 mb-4">
    						<h2 class="title1 text-{{$text}}">Loan History</h2>
    					</div>
    					<div class="row mb-5">
    						<div class="col text-center card shadow-lg bg-{{$bg}} p-3">
    							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
    								<table id="UserTable" class="UserTable table table-hover text-{{$text}}"> 
    									<thead> 
    										<tr> 
    											<!--<th>ID</th> -->
    											<th>Amount</th>
    											<th>Repayments</th>
    											<th>Date created</th> 
    											<th>Status</th>
    										</tr> 
    									</thead> 
    									<tbody> 
    									@foreach($loans as $loan)
    										<tr> 
    											<!--<th scope="row">{{$loan->id}}</th>-->
    											<td>{{$settings->currency}}{{$loan->amount}}</td> 
    											<td>{{$loan->repayments}}</td>
    											<td>{{\Carbon\Carbon::parse($loan->created_at)->toDayDateTimeString()}}</td>  
    											@if($loan->status==Approved) <td><div class="btn btn-success btn-sm m-1" >{{$loan->status}}</div></td>
    											@elseif($loan->status==Rejected) <td><div class="btn btn-danger btn-sm m-1">{{$loan->status}}</div></td>
    											@else <td><div class="btn btn-warning btn-sm m-1">{{$loan->status}}</div></td>
    											@endif
    										</tr> 
    									@endforeach
    									</tbody> 
    								</table>
    							</div>
    						</div>
    					</div>
					
				</div>
			</div>
    @endsection
