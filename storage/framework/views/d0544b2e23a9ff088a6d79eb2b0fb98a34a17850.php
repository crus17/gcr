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
        <div class="main-panel bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
			<div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>">System Settings</h1>
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
						<div class="col card p-3 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
							<nav>
								<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
		
								  <a class="nav-item nav-link active pt-3 " id="nav-home-tab" data-toggle="tab" href="#1" role="tab" aria-controls="nav-home" aria-selected="true"> Website Information</a>
		
								  <a class="nav-item nav-link pt-3" id="nav-profile-tab" data-toggle="tab" href="#2" role="tab" aria-controls="nav-profile" aria-selected="false">Website Settings/Preference</a>
		
								  <a class="nav-item nav-link pt-3" id="nav-about-tab" data-toggle="tab" href="#4" role="tab" aria-controls="nav-about" aria-selected="false">Bonus/Ref. commission</a>
		
								  <a class="nav-item nav-link pt-3" id="nav-contact-tab" data-toggle="tab" href="#5" role="tab" aria-controls="nav-contact" aria-selected="false">Payment/Settings</a>
		
								  <a class="nav-item nav-link pt-3" id="nav-about-tab" data-toggle="tab" href="#6" role="tab" aria-controls="nav-about" aria-selected="false">Subscription Fees</a>
		
								  
		
								  
		
								</div>
							</nav>
		
		
							<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
		
								
								<div class="tab-pane fade show active bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> card p-3" id="1" role="tabpanel" aria-labelledby="nav-home-tab">
									<?php echo $__env->make('admin.includes.webinfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
		
								
								<div class="tab-pane fade p-3 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" id="2" role="tabpanel" aria-labelledby="nav-profile-tab">
									<?php echo $__env->make('admin.includes.websettings', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
		
								
								<div class="tab-pane fade p-3 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" id="4" role="tabpanel" aria-labelledby="nav-about-tab">
									<?php echo $__env->make('admin.includes.bonus', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
		
								
								<div class="tab-pane fade p-3 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" id="5" role="tabpanel" aria-labelledby="nav-about-tab">
									<?php echo $__env->make('admin.includes.payments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
		
								
								<div class="tab-pane fade p-4 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" id="6" role="tabpanel" aria-labelledby="nav-about-tab">
									<?php echo $__env->make('admin.includes.subscript', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php echo $__env->make('admin.includes.modals', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>