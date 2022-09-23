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
					<h1 class="title1 text-<?php echo e($text); ?>">Manage clients withdrawals</h1>
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
						<div class="col card p-3 shadow bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								<span style="margin:3px;">
								<table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Client name</th>
											<th>Amount requested</th>
											<th>Amount + charges</th>
											<th>Payment mode</th>
											<th>Receiver's email</th>
											<th>Status</th> 
											<th>Date created</th>
											<th>Option</th>
										</tr> 
									</thead> 
									<tbody> 
										<?php $__currentLoopData = $withdrawals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr> 
											<th scope="row"><?php echo e($deposit->id); ?></th>
											<td><?php echo e($deposit->duser->name); ?></td>
											<td><?php echo e($deposit->amount); ?></td> 
											<td><?php echo e($deposit->to_deduct); ?></td> 
											<td><?php echo e($deposit->payment_mode); ?></td> 
											<td><?php echo e($deposit->duser->email); ?></td> 
											<td><?php echo e($deposit->status); ?></td> 
											<td><?php echo e(\Carbon\Carbon::parse($deposit->created_at)->toDayDateTimeString()); ?></td> 
											<td>
											<?php if($deposit->status =="Processed"): ?> 
											<a class="btn btn-success btn-sm" href="#">Processed</a>
											<?php elseif($deposit->status =="Declined"): ?>
											<a class="btn btn-danger btn-sm" href="#">Declined</a>
											<?php else: ?>
											<a class="btn btn-primary btn-sm m-1" href="<?php echo e(url('admin/dashboard/pwithdrawal')); ?>/<?php echo e($deposit->id); ?>">Process</a>
											<a class="btn btn-danger btn-sm m-1" href="<?php echo e(url('admin/dashboard/decwithdrawal')); ?>/<?php echo e($deposit->id); ?>">Decline</a>
											<?php endif; ?>
											<a href="#" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#viewModal<?php echo e($deposit->id); ?>"><i class="fa fa-eye"></i> View</a>
											</td> 
										</tr> 
										
										<!-- View info modal-->
										<div id="viewModal<?php echo e($deposit->id); ?>" class="modal fade" role="dialog">
										<div class="modal-dialog">
			
											<!-- Modal content-->
											<div class="modal-content">
											<div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> ">
												<h4 class="modal-title text-<?php echo e($text); ?>"><?php echo e($deposit->duser->name); ?> withdrawal details.</strong></h4>
												<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
											</div>
											<div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
												<?php if($deposit->payment_mode=='Bitcoin'): ?>
												<h3 class="text-<?php echo e($text); ?>">BTC Wallet:</h3>
												<h4 class="text-<?php echo e($text); ?>"><?php echo e($deposit->duser->btc_address); ?></h4><br>
												<?php elseif($deposit->payment_mode=='Ethereum'): ?>
												<h3 class="text-<?php echo e($text); ?>">ETH Wallet:</h3>
												<h4 class="text-<?php echo e($text); ?>"><?php echo e($deposit->duser->eth_address); ?></h4><br>
												<?php elseif($deposit->payment_mode=='Litecoin'): ?>
												<h3 class="text-<?php echo e($text); ?>">LTC Wallet:</h3>
												<h4 class="text-<?php echo e($text); ?>"><?php echo e($deposit->duser->ltc_address); ?></h4><br>
												<?php elseif($deposit->payment_mode=='Bank transfer'): ?>
												<h4 class="text-<?php echo e($text); ?>">Bank name: <?php echo e($deposit->duser->bank_name); ?></h4><br>
												<h4 class="text-<?php echo e($text); ?>">Account name: <?php echo e($deposit->duser->account_name); ?></h4><br>
												<h4 class="text-<?php echo e($text); ?>">Account number: <?php echo e($deposit->duser->account_no); ?></h4>
												<?php else: ?>
												<h4 class="text-<?php echo e($text); ?>">Get in touch with client. <br><br><?php echo e($deposit->duser->email); ?></h4>
												<?php endif; ?>
											</div>
											</div>
										</div>
										</div>
										<!--End View info modal-->
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