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
						<h1 class="text-<?php echo e($text); ?>">Add your withdrawal info</h1>
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
					<div class="row mb-4">
						<div class="col card p-3 shadow-lg bg-<?php echo e($bg); ?>">
							<div class="accordion accordion-<?php echo e($text); ?> ">
								<form method="post" action="<?php echo e(action('UsersController@updateacct')); ?>">
								<!--............................... collapse one -->
								<div class="card">
									<div class="card-header bg-<?php echo e($bgmenu); ?>" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-<?php echo e($text); ?>">
											Bank transfer
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
										<div class="card-body bg-<?php echo e($bg); ?> shadow">
											<div class="form-group">
												<h5 class="text-<?php echo e($text); ?>">Bank Name</h5>
												<input type="text" name="bank_name" value="<?php echo e(Auth::user()->bank_name); ?>"  class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter bank name">
											</div>
											<div class="form-group">
												<h5 class="text-<?php echo e($text); ?>">Account Name</h5>
												<input type="text" name="account_name" value="<?php echo e(Auth::user()->account_name); ?>"  class="form-control  text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter Account name">
											</div>
											<div class="form-group">
												<h5 class="text-<?php echo e($text); ?>">Account Number</h5>
												<input type="text" name="account_no" value="<?php echo e(Auth::user()->account_no); ?>"  class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter Account Number">
											</div>
										</div>
									</div>
								</div>
									<!--............................... collapse two -->
								<div class="card">
									<div class="card-header bg-<?php echo e($bgmenu); ?>" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-<?php echo e($text); ?>">
											BItcoin
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
										<div class="card-body bg-<?php echo e($bg); ?> shadow">
											<div class="form-group">
												<h5 class="text-<?php echo e($text); ?>">BTC ADDRESS</h5>
												<input type="text" name="btc_address" value="<?php echo e(Auth::user()->btc_address); ?>"  class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter Bitcoin Address">
											</div>
										</div>
									</div>
								</div>
						<!--............................... collapse three -->
								<div class="card">
									<div class="card-header bg-<?php echo e($bg); ?>" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-<?php echo e($text); ?>">
										Ethereum
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
										<div class="card-body bg-<?php echo e($bg); ?> shadow">
											<div class="form-group">
												<h5 class="text-<?php echo e($text); ?>">ETH ADDRESS</h5>
												<input type="text" name="eth_address" value="<?php echo e(Auth::user()->eth_address); ?>"  class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter Etherium Address">
											</div>
										</div>
									</div>
								</div>
								<!--............................... collapse four -->
								<div class="card">
									<div class="card-header bg-<?php echo e($bgmenu); ?>" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-<?php echo e($text); ?>">
											Litcoin
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
										<div class="card-body bg-<?php echo e($bg); ?> shadow">
											<div class="form-group">
												<h5 class="text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>">LTC ADDRESS</h5>
												<input type="text" name="ltc_address" value="<?php echo e(Auth::user()->ltc_address); ?>"  class="form-control text-<?php echo e($text); ?> bg-<?php echo e($bg); ?>" placeholder="Enter Litcoin Address">
											</div>
										</div>
									</div>
								</div>
								<!--......................... end of collaps four -->
								<input type="submit" class="btn btn-primary" value="Submit">  &nbsp; &nbsp; 
								<a href="<?php echo e(url('dashboard/skip_account')); ?>" style="color:red;">Skip</a>
								<input type="hidden" name="id" value="<?php echo e(Auth::user()->id); ?>">
								<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>