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
					<h1 class="title1 text-{{$text}}">{{$settings->site_name}} users list</h1>
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
					<div class="row">
						<div class="col">
							<a href="#" data-toggle="modal" data-target="#sendmailModal" class="btn btn-primary btn-lg" style="margin:10px;">Message all</a>
							@if($settings->enable_kyc =="yes")
							<a href="{{ url('admin/dashboard/kyc') }}" class="btn btn-warning btn-lg">KYC</a>
							@endif 
							
						</div>
					</div>
					<div class="row mb-5">
						<div class="col shadow card p-4 bg-{{Auth('admin')->User()->dashboard_style}}">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								{{-- <nav aria-label="Page navigation example">
									<ul class="pagination text-{{$text}}">
									  <li class="page-item ">{{$users->render()}}</li>
									</ul>
								</nav>
								
								<form class="form-inline" role="form" method="post" action="{{action('Admin\HomeController@search')}}">
									<a class="btn btn-{{$text}} m-2 " href="{{ url('dashboard/manageusers') }}">Show all</a>
									<input class=" shadow-sm bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}} form-control" placeholder="Search user" type="text" name="searchItem" required>
									<input type="hidden" name="_token"  value="{{ csrf_token() }}">
									<input type="submit" class="btn btn-{{$text}} m-2" value="Go">
								</form> --}}
								
								<table id="ShipTable" class="table table-hover text-{{$text}}"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Balance</th> 
											<th>First Name</th> 
											<th>Last Name</th> 
											<th>Email</th> 
											<th>Phone</th>
											<th>Inv. plan</th>
											<th>Status</th>
											<th>Date registered</th> 
											<th>Action</th> 
										</tr> 
									</thead> 
									<tbody> 
										@foreach($users as $list)
										<tr> 
											<th scope="row">{{$list->id}}</th>
											<td>${{$list->account_bal}}</td> 
											<td>{{$list->name}}</td> 
											<td>{{$list->l_name}}</td> 
											<td>{{$list->email}}</td> 
											<td>{{$list->phone_number}}</td>
											@if(isset($list->dplan->name)) 
											<td>{{$list->dplan->name}}</td>
											@else
											<td>NULL</td>
											@endif 
											<td>{{$list->status}}</td> 
											<td>{{\Carbon\Carbon::parse($list->created_at)->toDayDateTimeString()}}</td> 
											<td>
												<div class="dropdown">
													<a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Actions
													</a>
												<div class="dropdown-menu bg-{{Auth('admin')->User()->dashboard_style}}" aria-labelledby="dropdownMenuLink">
													@if($list->status==NULL || $list->status=='blocked')
													<a class="btn btn-primary btn-sm m-1" href="{{ url('admin/dashboard/uunblock') }}/{{$list->id}}">Unblock</a> 
													@else
													<a class="btn btn-danger btn-sm m-1" href="{{ url('admin/dashboard/uublock') }}/{{$list->id}}">Block</a>
													@endif
													@if($list->trade_mode=='on')
													<a class="btn btn-danger btn-sm m-1" href="{{ url('admin/dashboard/usertrademode') }}/{{$list->id}}/off">Turn off trade</a> 
													@else
													<a class="btn btn-primary btn-sm m-1" href="{{ url('admin/dashboard/usertrademode') }}/{{$list->id}}/on">Turn on trade</a>
													@endif
														<a href="#"  data-toggle="modal" data-target="#topupModal{{$list->id}}" class="btn btn-dark btn-sm m-1">Credit/Debit</a>
														<a href="#" data-toggle="modal" data-target="#resetpswdModal{{$list->id}}"  class="btn btn-warning btn-sm m-1">Reset Password</a>
														<a href="#" data-toggle="modal" data-target="#clearacctModal{{$list->id}}" class="btn btn-warning btn-sm m-1">Clear Account</a>
														<a href="#" data-toggle="modal" data-target="#TradingModal{{$list->id}}" class="btn btn-secondary btn-sm m-1">Add Trading History</a>
														<a href="#" data-toggle="modal" data-target="#deleteModal{{$list->id}}" class="btn btn-danger btn-sm m-1">Delete</a>
														<a href="#" data-toggle="modal" data-target="#edituser{{$list->id}}" class="btn btn-secondary btn-sm m-1">Edit</a>
														<a href="#" data-toggle="modal" data-target="#sendmailtooneuserModal{{$list->id}}" class="btn btn-info btn-sm m-1">Send Message</a>
														<a href="#" data-toggle="modal" data-target="#switchuserModal{{$list->id}}"  class="btn btn-success btn-sm m-2">Get access</a>
													</div>
												</div>
											</td> 
										</tr> 
		
											<!-- Deposit for a plan Modal -->
											<div id="topupModal{{$list->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
												
												<h4 class="modal-title" style="text-align:center;">Credit/Debit user account.</strong></h4>
												<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
													<form style="padding:3px;" role="form" method="post" action="{{route('topup')}}">
													<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->name}}" type="text" disabled><br/>
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Enter amount" type="text" name="amount" required><br/>
														<div class="form-group">
															<h5 class="text-{{$text}}">Select where to credit/debit</h5>
															<select class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="type" required>
															<option value="">Select Column</option>
															<option value="Bonus">Bonus</option>
															<option value="Profit">Profit</option>
															<option value="Ref_Bonus">Ref_Bonus</option>
															</select>
														</div>
														<div class="form-group">
															<h5 class="text-{{$text}}">Select credit to add, debit to subtract.</h5>
															<select class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="t_type" required>
															<option value="">Select type</option>
															<option value="Credit">Credit</option>
															<option value="Debit">Debit</option>
															</select>
														</div>
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="hidden" name="user_id" value="{{$list->id}}">
													<input type="submit" class="btn btn-{{$text}}" value="Save">
												</form>
											</div>
											</div>
										</div>
										</div>
										<!-- /deposit for a plan Modal -->
		
		
										<!-- send a single user email Modal-->
										<div id="sendmailtooneuserModal{{$list->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
		
													<!-- Modal content-->
													<div class="modal-content">
													<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
														
														<h4 class="modal-title text-{{$text}}">Send Email Message</h4>
														<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
													</div>
													
													<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
														<p>This message will be sent to {{$list->name}} {{$list->l_name}} </p>
															<form style="padding:3px;" role="form" method="post" action="{{action('Admin\LogicController@sendmailtooneuser')}}">
																<input type="hidden" name="user_id" value="{{$list->id}}">
																<textarea placeholder="Type your message here" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="message" row="3" placeholder="Type your message here" required></textarea><br/>
																
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
																<input type="submit" class="btn btn-{{$text}}" value="Send">
														</form>
													</div>
													</div>
												</div>
												</div>
		
												<!-- /Trading History Modal -->
												
												<div id="TradingModal{{$list->id}}" class="modal fade" role="dialog">
												<div class="modal-dialog">
		
													<!-- Modal content-->
													<div class="modal-content">
													<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
														
														<h4 class="modal-title text-{{$text}}">Add Trading History for {{$list->name}} {{$list->l_name}} </h4>
														<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
															<form role="form" method="post" action="{{route('addhistory')}}">
															<input type="hidden" name="user_id" value="{{$list->id}}">
		
															<div class="form-group">
																<h5 class=" text-{{$text}}">Investment Plans</h5>
																
																<select class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="plan">
																<option value="">Select Plan</option>
																@foreach($pl as $plns)
																<option value="{{$plns->name}}">{{$plns->name}}</option>
																@endforeach
																</select>
															</div>
															<h5 class=" text-{{$text}}">Amount</h5>
															<input type="number" name="amount" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}">
															<div class="form-group">
																<h5 class=" text-{{$text}}">Type</h5>
																<select class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="type">
																<option value="">Select type</option>
																<option value="Bonus">Bonus</option>
																<option value="ROI">ROI</option>
																</select>
															</div>
																
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="submit" class="btn btn-{{$text}}" value="Add History">
														</form>
													</div>
													</div>
												</div>
												</div>
												<!-- /send a single user email Modal -->
								
								<!-- Edit user Modal -->
											<div id="edituser{{$list->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
												
												<h4 class="modal-title text-{{$text}}">Edit user details.</strong></h4>
												<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
													<form style="padding:3px;" role="form" method="post" action="{{route('edituser')}}">
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->name}}" type="text" disabled><br/>
														<h5 class=" text-{{$text}}">Firstname</h5>
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->name}}" type="text" name="name" required><br/>
														<h5 class=" text-{{$text}}">Lastname</h5>
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->l_name}}" type="text" name="l_name" required><br/>
														<h5 class=" text-{{$text}}">Email</h5>
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->email}}" type="text" name="email" required><br/>
														<h5 class=" text-{{$text}}">Phone Number</h5>
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->phone_number}}" type="text" name="phone" required><br/>
														<h5 class=" text-{{$text}}">Referral link</h5>
														<input style="padding:5px;" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$list->ref_link}}" type="text" name="ref_link" required><br/>
														<input type="hidden" name="_token" value="{{ csrf_token() }}">
														<input type="hidden" name="user_id" value="{{$list->id}}">
													<input type="submit" class="btn btn-{{$text}}" value="Update user">
												</form>
											</div>
											</div>
										</div>
										</div>
										<!-- /Edit user Modal -->
		
										<!-- Reset user password Modal -->
										<div id="resetpswdModal{{$list->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
												<h4 class="modal-title text-{{$text}}">Reset Password</strong></h4>
												<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
												<p class="text-{{$text}}">Are you sure you want to reset password for {{$list->name}} {{$list->l_name}} to <span class="text-primary font-weight-bolder">user01236</span></p>
												<a class="btn btn-{{$text}}" href="{{ url('admin/dashboard/resetpswd') }}/{{$list->id}}">Reset Now</a>
											</div>
											</div>
										</div>
										</div>
										<!-- /Reset user password Modal -->
										
										<!-- Switch useraccount Modal -->
										<div id="switchuserModal{{$list->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
												<h4 class="modal-title text-{{$text}}">You are about to login as {{$list->name}}.</strong></h4>
												<button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
												<a class="btn btn-{{$text}}" href="{{ url('admin/dashboard/switchuser') }}/{{$list->id}}">Proceed</a>
											</div>
											</div>
										</div>
										</div>
										<!-- /Switch user account Modal -->
		
										<!-- Clear account Modal -->
										<div id="clearacctModal{{$list->id}}" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
												<h4 class="modal-title text-{{$text}}">Clear Account</strong></h4>
												<button type="button" class="close  text-{{$text}}" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
												<p>You are clearing account for {{$list->name}} {{$list->l_name}} to $0.00</p>
												<a class="btn btn-{{$text}}" href="{{ url('admin/dashboard/clearacct') }}/{{$list->id}}">Proceed</a>
											</div>
											</div>
										</div>
										</div>
										<!-- /Clear account Modal -->

										<!-- Delete user Modal -->
										<div id="deleteModal{{$list->id}}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
                                                    
                                                    <h4 class="modal-title text-{{$text}}">Delete User</strong></h4>
                                                    <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}} p-3">
                                                    <p class="text-{{$text}}">Are you sure you want to delete {{$list->name}} {{$list->l_name}}</p>
                                                    <a class="btn btn-danger" href="{{ url('admin/dashboard/delsystemuser') }}/{{$list->id}}">Yes i'm sure</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Delete user Modal -->
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
				