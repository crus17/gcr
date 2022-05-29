<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
} else {
    $text = "light";
}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('admin.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('admin.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="main-panel">
			<div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
					<h1 class="title1 text-<?php echo e($text); ?>"><?php echo e($settings->site_name); ?> users list</h1>
					</div>
					<?php if(Session::has('message')): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> <?php echo e(Session::get('message')); ?>

							</div>
						</div>
					</div>
					<?php endif; ?>
		
					<?php if(count($errors) > 0): ?>
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissable" role="alert" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<i class="fa fa-warning"></i> <?php echo e($error); ?>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row">
						<div class="col">
							<a href="#" data-toggle="modal" data-target="#sendmailModal" class="btn btn-primary btn-lg" style="margin:10px;">Message all</a>
							<?php if($settings->enable_kyc =="yes"): ?>
							<a href="<?php echo e(url('admin/dashboard/kyc')); ?>" class="btn btn-warning btn-lg">KYC</a>
							<?php endif; ?> 
							
						</div>
					</div>
					<div class="row mb-5">
						<div class="col shadow card p-4 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								
								
								<table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>"> 
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
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr> 
											<th scope="row"><?php echo e($list->id); ?></th>
											<td>$<?php echo e($list->account_bal); ?></td> 
											<td><?php echo e($list->name); ?></td> 
											<td><?php echo e($list->l_name); ?></td> 
											<td><?php echo e($list->email); ?></td> 
											<td><?php echo e($list->phone_number); ?></td>
											<?php if(isset($list->dplan->name)): ?> 
											<td><?php echo e($list->dplan->name); ?></td>
											<?php else: ?>
											<td>NULL</td>
											<?php endif; ?> 
											<td><?php echo e($list->status); ?></td> 
											<td><?php echo e(\Carbon\Carbon::parse($list->created_at)->toDayDateTimeString()); ?></td> 
											<td>
												<div class="dropdown">
													<a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													Actions
													</a>
												<div class="dropdown-menu bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" aria-labelledby="dropdownMenuLink">
													<?php if($list->status==NULL || $list->status=='blocked'): ?>
													<a class="btn btn-primary btn-sm m-1" href="<?php echo e(url('admin/dashboard/uunblock')); ?>/<?php echo e($list->id); ?>">Unblock</a> 
													<?php else: ?>
													<a class="btn btn-danger btn-sm m-1" href="<?php echo e(url('admin/dashboard/uublock')); ?>/<?php echo e($list->id); ?>">Block</a>
													<?php endif; ?>
													<?php if($list->trade_mode=='on'): ?>
													<a class="btn btn-danger btn-sm m-1" href="<?php echo e(url('admin/dashboard/usertrademode')); ?>/<?php echo e($list->id); ?>/off">Turn off trade</a> 
													<?php else: ?>
													<a class="btn btn-primary btn-sm m-1" href="<?php echo e(url('admin/dashboard/usertrademode')); ?>/<?php echo e($list->id); ?>/on">Turn on trade</a>
													<?php endif; ?>
														<a href="#"  data-toggle="modal" data-target="#topupModal<?php echo e($list->id); ?>" class="btn btn-dark btn-sm m-1">Credit/Debit</a>
														<a href="#" data-toggle="modal" data-target="#resetpswdModal<?php echo e($list->id); ?>"  class="btn btn-warning btn-sm m-1">Reset Password</a>
														<a href="#" data-toggle="modal" data-target="#clearacctModal<?php echo e($list->id); ?>" class="btn btn-warning btn-sm m-1">Clear Account</a>
														<a href="#" data-toggle="modal" data-target="#TradingModal<?php echo e($list->id); ?>" class="btn btn-secondary btn-sm m-1">Add Trading History</a>
														<a href="#" data-toggle="modal" data-target="#deleteModal<?php echo e($list->id); ?>" class="btn btn-danger btn-sm m-1">Delete</a>
														<a href="#" data-toggle="modal" data-target="#edituser<?php echo e($list->id); ?>" class="btn btn-secondary btn-sm m-1">Edit</a>
														<a href="#" data-toggle="modal" data-target="#sendmailtooneuserModal<?php echo e($list->id); ?>" class="btn btn-info btn-sm m-1">Send Message</a>
														<a href="#" data-toggle="modal" data-target="#switchuserModal<?php echo e($list->id); ?>"  class="btn btn-success btn-sm m-2">Get access</a>
													</div>
												</div>
											</td> 
										</tr> 
		
											<!-- Deposit for a plan Modal -->
											<div id="topupModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												
												<h4 class="modal-title" style="text-align:center;">Credit/Debit user account.</strong></h4>
												<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
													<form style="padding:3px;" role="form" method="post" action="<?php echo e(route('topup')); ?>">
													<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->name); ?>" type="text" disabled><br/>
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" placeholder="Enter amount" type="text" name="amount" required><br/>
														<div class="form-group">
															<h5 class="text-<?php echo e($text); ?>">Select where to credit/debit</h5>
															<select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="type" required>
															<option value="">Select Column</option>
															<option value="Bonus">Bonus</option>
															<option value="Profit">Profit</option>
															<option value="Ref_Bonus">Ref_Bonus</option>
															</select>
														</div>
														<div class="form-group">
															<h5 class="text-<?php echo e($text); ?>">Select credit to add, debit to subtract.</h5>
															<select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="t_type" required>
															<option value="">Select type</option>
															<option value="Credit">Credit</option>
															<option value="Debit">Debit</option>
															</select>
														</div>
														<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
														<input type="hidden" name="user_id" value="<?php echo e($list->id); ?>">
													<input type="submit" class="btn btn-<?php echo e($text); ?>" value="Save">
												</form>
											</div>
											</div>
										</div>
										</div>
										<!-- /deposit for a plan Modal -->
		
		
										<!-- send a single user email Modal-->
										<div id="sendmailtooneuserModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
		
													<!-- Modal content-->
													<div class="modal-content">
													<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
														
														<h4 class="modal-title text-<?php echo e($text); ?>">Send Email Message</h4>
														<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
													</div>
													
													<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
														<p>This message will be sent to <?php echo e($list->name); ?> <?php echo e($list->l_name); ?> </p>
															<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('Admin\LogicController@sendmailtooneuser')); ?>">
																<input type="hidden" name="user_id" value="<?php echo e($list->id); ?>">
																<textarea placeholder="Type your message here" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="message" row="3" placeholder="Type your message here" required></textarea><br/>
																
																<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
																<input type="submit" class="btn btn-<?php echo e($text); ?>" value="Send">
														</form>
													</div>
													</div>
												</div>
												</div>
		
												<!-- /Trading History Modal -->
												
												<div id="TradingModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
												<div class="modal-dialog">
		
													<!-- Modal content-->
													<div class="modal-content">
													<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
														
														<h4 class="modal-title text-<?php echo e($text); ?>">Add Trading History for <?php echo e($list->name); ?> <?php echo e($list->l_name); ?> </h4>
														<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
													</div>
													<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
															<form role="form" method="post" action="<?php echo e(route('addhistory')); ?>">
															<input type="hidden" name="user_id" value="<?php echo e($list->id); ?>">
		
															<div class="form-group">
																<h5 class=" text-<?php echo e($text); ?>">Investment Plans</h5>
																
																<select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="plan">
																<option value="">Select Plan</option>
																<?php $__currentLoopData = $pl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																<option value="<?php echo e($plns->name); ?>"><?php echo e($plns->name); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																</select>
															</div>
															<h5 class=" text-<?php echo e($text); ?>">Amount</h5>
															<input type="number" name="amount" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>">
															<div class="form-group">
																<h5 class=" text-<?php echo e($text); ?>">Type</h5>
																<select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="type">
																<option value="">Select type</option>
																<option value="Bonus">Bonus</option>
																<option value="ROI">ROI</option>
																</select>
															</div>
																
																<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
														<input type="submit" class="btn btn-<?php echo e($text); ?>" value="Add History">
														</form>
													</div>
													</div>
												</div>
												</div>
												<!-- /send a single user email Modal -->
								
								<!-- Edit user Modal -->
											<div id="edituser<?php echo e($list->id); ?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												
												<h4 class="modal-title text-<?php echo e($text); ?>">Edit user details.</strong></h4>
												<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
													<form style="padding:3px;" role="form" method="post" action="<?php echo e(route('edituser')); ?>">
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->name); ?>" type="text" disabled><br/>
														<h5 class=" text-<?php echo e($text); ?>">Firstname</h5>
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->name); ?>" type="text" name="name" required><br/>
														<h5 class=" text-<?php echo e($text); ?>">Lastname</h5>
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->l_name); ?>" type="text" name="l_name" required><br/>
														<h5 class=" text-<?php echo e($text); ?>">Email</h5>
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->email); ?>" type="text" name="email" required><br/>
														<h5 class=" text-<?php echo e($text); ?>">Phone Number</h5>
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->phone_number); ?>" type="text" name="phone" required><br/>
														<h5 class=" text-<?php echo e($text); ?>">Referral link</h5>
														<input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($list->ref_link); ?>" type="text" name="ref_link" required><br/>
														<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
														<input type="hidden" name="user_id" value="<?php echo e($list->id); ?>">
													<input type="submit" class="btn btn-<?php echo e($text); ?>" value="Update user">
												</form>
											</div>
											</div>
										</div>
										</div>
										<!-- /Edit user Modal -->
		
										<!-- Reset user password Modal -->
										<div id="resetpswdModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<h4 class="modal-title text-<?php echo e($text); ?>">Reset Password</strong></h4>
												<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<p class="text-<?php echo e($text); ?>">Are you sure you want to reset password for <?php echo e($list->name); ?> <?php echo e($list->l_name); ?> to <span class="text-primary font-weight-bolder">user01236</span></p>
												<a class="btn btn-<?php echo e($text); ?>" href="<?php echo e(url('admin/dashboard/resetpswd')); ?>/<?php echo e($list->id); ?>">Reset Now</a>
											</div>
											</div>
										</div>
										</div>
										<!-- /Reset user password Modal -->
										
										<!-- Switch useraccount Modal -->
										<div id="switchuserModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<h4 class="modal-title text-<?php echo e($text); ?>">You are about to login as <?php echo e($list->name); ?>.</strong></h4>
												<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<a class="btn btn-<?php echo e($text); ?>" href="<?php echo e(url('admin/dashboard/switchuser')); ?>/<?php echo e($list->id); ?>">Proceed</a>
											</div>
											</div>
										</div>
										</div>
										<!-- /Switch user account Modal -->
		
										<!-- Clear account Modal -->
										<div id="clearacctModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
		
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<h4 class="modal-title text-<?php echo e($text); ?>">Clear Account</strong></h4>
												<button type="button" class="close  text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<p>You are clearing account for <?php echo e($list->name); ?> <?php echo e($list->l_name); ?> to $0.00</p>
												<a class="btn btn-<?php echo e($text); ?>" href="<?php echo e(url('admin/dashboard/clearacct')); ?>/<?php echo e($list->id); ?>">Proceed</a>
											</div>
											</div>
										</div>
										</div>
										<!-- /Clear account Modal -->

										<!-- Delete user Modal -->
										<div id="deleteModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    
                                                    <h4 class="modal-title text-<?php echo e($text); ?>">Delete User</strong></h4>
                                                    <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3">
                                                    <p class="text-<?php echo e($text); ?>">Are you sure you want to delete <?php echo e($list->name); ?> <?php echo e($list->l_name); ?></p>
                                                    <a class="btn btn-danger" href="<?php echo e(url('admin/dashboard/delsystemuser')); ?>/<?php echo e($list->id); ?>">Yes i'm sure</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Delete user Modal -->
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php echo $__env->make('admin.includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
				
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>