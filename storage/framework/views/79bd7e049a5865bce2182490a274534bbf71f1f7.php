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
						<h1 class="title1 text-<?php echo e($text); ?>">Available Plans</h1>
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
					<div class="row mb-5">
						<div class="col-lg-12 mt-2">
							<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#plansModal"><i class="fa fa-plus"></i> New plan</a> <br> <br>
						</div>
						<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-4 p-3 card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
							<div class="pricing-table purple border bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> shadow-lg">
								<!-- Table Head -->
								<div class="pricing-label d-inline">Fixed Price</div>
								<h2 class="text-<?php echo e($text); ?>"><?php echo e($plan->name); ?></h2>
								<!-- Price -->
								<div class="price-tag">
									<span class="symbol text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?></span>
									<span class="amount text-<?php echo e($text); ?>"><?php echo e($plan->price); ?></span>
								</div>
								<!-- Features -->
								<div class="pricing-features">
									<div class="feature text-<?php echo e($text); ?>">Minimum Possible Deposit:<span class="text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e($plan->min_price); ?></span></div>
									<div class="feature text-<?php echo e($text); ?>">Maximum Possible Deposit:<span  class="text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e($plan->max_price); ?></span></div>
									<div class="feature text-<?php echo e($text); ?>">Minimum Return:<span class="text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e($plan->minr); ?></span></div>
									<div class="feature text-<?php echo e($text); ?>">Maximum Return:<span class="text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e($plan->maxr); ?></span></div>
									<div class="feature text-<?php echo e($text); ?>">Gift Bonus:<span class="text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e($plan->gift); ?></span></div>
									<div class="feature text-<?php echo e($text); ?>">Duration:<span class="text-<?php echo e($text); ?>"><?php echo e($plan->expiration); ?></span></div>
								</div> <br>
								
								<!-- Button -->
								<div class="text-center">
									<a href="#" data-toggle="modal" data-target="#editplansModal<?php echo e($plan->id); ?>" class="btn btn-primary"><i class="flaticon-pencil text-white"></i></a> &nbsp; 
								<a href="<?php echo e(url('admin/dashboard/trashplan')); ?>/<?php echo e($plan->id); ?>" class="btn btn-danger"><i class="text-white fa fa-times"></i></a>
								</div>
								
							</div>
						  
							<!-- Edit plan modal -->
							<div id="editplansModal<?php echo e($plan->id); ?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
									<!-- Modal content-->
									<div class="modal-content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
										<div class="modal-header ">
											<h4 class="modal-title text-<?php echo e($text); ?>">Update plan / package</h4>
											<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body">
											<form role="form" method="post" action="<?php echo e(route('updateplan')); ?>">
												<h5 class="text-<?php echo e($text); ?>">Plan Name</h5>   
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->name); ?>" type="text" name="name" required><br/>
												<h5 class="text-<?php echo e($text); ?>">Plan price</h5> 
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->price); ?>" type="text" name="price" required><br/>
												<h5 class="text-<?php echo e($text); ?>">Plan Minimum Price</h5> 	 
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->min_price); ?>" type="text" name="min_price" required><br/>
												<h5 class="text-<?php echo e($text); ?>">Plan Maximum Price</h5> 	 	 
												<input style="padding:5px;" class="form-control  text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->max_price); ?>" type="text" name="max_price" required><br/>
												<h5 class="text-<?php echo e($text); ?>"> Minimum Return</h5> 	 
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->minr); ?>" placeholder="Enter minimum return" type="text" name="minr" required><br/>
												<h5 class="text-<?php echo e($text); ?>"> Maximum Return</h5> 
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->maxr); ?>"  placeholder="Enter maximum return" type="text" name="maxr" required><br/>
												<h5 class="text-<?php echo e($text); ?>"> Gift Bonus</h5> 
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->gift); ?>"  placeholder="Enter Additional Gift Bonus" type="text" name="gift" required><br/>
												<h5 class="text-<?php echo e($text); ?>">Top Up Interval</h5> 
												<select class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" name="t_interval">
													<option><?php echo e($plan->increment_interval); ?></option>
													<option>Monthly</option>
													<option>Weekly</option>
													<option>Two Weeks</option>
													<option>Daily</option>
													<option>Hourly</option>
													<option>Minute</option>
												</select><br>
												<h5 class="text-<?php echo e($text); ?>">Top Up Type</h5> 
												<select class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" name="t_type">
													<option><?php echo e($plan->increment_type); ?></option>
													<option>Percentage</option>
													<option>Fixed</option>
												</select><br>
												<h5 class="text-<?php echo e($text); ?>">Top up Amount (in % or $ as specified above)</h5> 
												<input style="padding:5px;" class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" value="<?php echo e($plan->increment_amount); ?>" placeholder="top up amount" type="text" name="t_amount" required><br/>
												<h5 class="text-<?php echo e($text); ?>">Investment duration</h5> 
												<select class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" name="expiration">
													<option><?php echo e($plan->expiration); ?></option>
													<option>One week</option>
													<option>Two Weeks</option>
													<option>One month</option>
													<option>Three months</option>
													<option>Six months</option>
													<option>One year</option>
												</select><br>
												<input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
												<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
												<input type="submit" class="btn btn-primary" value="Update">
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /edit plans Modal -->
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		<?php echo $__env->make('admin.includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>