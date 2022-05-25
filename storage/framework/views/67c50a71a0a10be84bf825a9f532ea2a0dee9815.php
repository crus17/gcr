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

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('user.topmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('user.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="main-panel bg-<?php echo e($bg); ?>">
			<div class="content bg-<?php echo e($bg); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>">Available packages</h1>
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
						<?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-4 p-4 card bg-<?php echo e($bg); ?> shadow-lg">
							<div class="pricing-table purple border bg-<?php echo e($bg); ?> shadow-lg">
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
									<!--<div class="feature text-<?php echo e($text); ?>">Duration:<span class="text-<?php echo e($text); ?>"><?php echo e($plan->expiration); ?></span></div>-->
								</div> <br>
								<!-- Button -->
								<div class="">
									<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('Controller@joinplan')); ?>">
										<h5 class="text-<?php echo e($text); ?>">Amount to invest: (<?php echo e($settings->currency); ?><?php echo e($plan->price); ?> default)</h5>
										<input type="number" min="<?php echo e($plan->min_price); ?>" max="<?php echo e($plan->max_price); ?>" name="iamount" placeholder="<?php echo e($settings->currency.$plan->price); ?>" class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>"> <br>
										<input type="hidden" name="duration" value="<?php echo e($plan->expiration); ?>">
										<input type="hidden" name="id" value="<?php echo e($plan->id); ?>">
										<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
										<input type="submit" class="btn btn-block pricing-action btn-primary nav-pills" value="Join plan" style=" border-radius: 40px;">
									</form>
								</div>
								
							</div>
							<!-- Deposit for a plan Modal -->
							<div id="depositModal<?php echo e($plan->id); ?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
							<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header bg-dark">
										<h4 class="modal-title" style="text-align:center;">Make a deposit of <strong><?php echo e($settings->currency); ?><?php echo e($plan->price); ?> to join this plan</strong></h4>
											<button type="button" class="close text-white" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body bg-dark">
											<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@deposit')); ?>">
												<input style="padding:5px;" class="form-control" value="<?php echo e($plan->price); ?>" type="text" name="amount" required><br/>
												
												<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
												<input type="hidden" name="pay_type" value="plandeposit">
												<input type="hidden" name="plan_id" value="<?php echo e($plan->id); ?>">
												<input type="submit" class="btn btn-default" value="Continue">
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /deposit for a plan Modal -->
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>	
			</div>
				
		<?php echo $__env->make('user.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>