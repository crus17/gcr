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
					<div class="row mb-5">
						<div class="col text-center card bg-<?php echo e($bg); ?> p-3">
							<h1 class="title1 text-<?php echo e($text); ?>"><?php echo e($settings->site_name); ?> Support</h1>
							<div class="sign-up-row widget-shadow text-<?php echo e($text); ?>">
								<h4 class="text-<?php echo e($text); ?>">For inquiries, suggestions or complains. Mail us at</h4>
								<h5 class="text-<?php echo e($text); ?> mt-3"><?php echo e($settings->contact_email); ?>

							</div>
						</div>
					</div>
				</div>
			</div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>