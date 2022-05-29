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
					<h1 class="title1 text-<?php echo e($text); ?>">Request for Withdrawal</h1>
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
					<?php $__currentLoopData = $wmethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-4 p-3 rounded card bg-<?php echo e($bg); ?>">
							<div class="card-body shadow border-danger">
							<h2 class="card-title mb-3 text-<?php echo e($text); ?>"> <?php echo e($method->name); ?></h2>
								<h4 class="text-<?php echo e($text); ?>">Minimum amount: <strong style="float:right;"> <?php echo e($settings->currency); ?><?php echo e($method->minimum); ?></strong></h4><br>
								
								<h4 class="text-<?php echo e($text); ?>">Maximum amount:<strong style="float:right;"> <?php echo e($settings->currency); ?><?php echo e($method->maximum); ?></strong></h4><br>
								
								<h4 class="text-<?php echo e($text); ?>">Charges (Fixed):<strong style="float:right;"> <?php echo e($settings->currency); ?><?php echo e($method->charges_fixed); ?></strong></h4><br>
								
								<h4 class="text-<?php echo e($text); ?>">Charges (%): <strong style="float:right;"> <?php echo e($method->charges_percentage); ?>%</strong></h4><br>
								
								<h4 class="text-<?php echo e($text); ?>">Duration:<strong style="float:right;"> <?php echo e($method->duration); ?></strong></h4><br>
								<div class="text-center">
									<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#withdrawalModal<?php echo e($method->id); ?>"><i class="fa fa-plus"></i> Request withdrawal</a>
								</div>
								
							</div>
						</div>
						
							<!-- Withdrawal Modal -->
							<div id="withdrawalModal<?php echo e($method->id); ?>" class="modal fade" role="dialog">
							  <div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
								  <div class="modal-header bg-<?php echo e($bg); ?>">
								  <h4 class="modal-title text-<?php echo e($text); ?>">Payment will be sent through your selected method.</h4>
									<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
								  </div>
								  <div class="modal-body bg-<?php echo e($bg); ?>">
										<form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@withdrawal')); ?>">
											   <input class="form-control p-3 text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter amount here" type="text" name="amount" required><br/>
											   <input  class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?> " value="<?php echo e($method->name); ?>" type="text" disabled><br/>
											   <input value="<?php echo e($method->name); ?>" type="hidden" name="payment_mode">
											   <input value="<?php echo e($method->id); ?>" type="hidden" name="method_id"><br/>
											   
											   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
											   <input type="submit" class="btn btn-primary" value="Submit" onclick="this.disabled = true; form.submit(); this.value='Please Wait ...';" />
									   </form>
								  </div>
								</div>
							  </div>
							</div>
							<!-- /Withdrawals Modal -->
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					
				</div>
			</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>