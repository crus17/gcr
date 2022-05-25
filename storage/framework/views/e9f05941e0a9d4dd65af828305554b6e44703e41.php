<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($demo->receiver_name); ?>,

This is a notification of a new return on investment (ROI) on your investment account. 
<br>

<strong>Plan: </strong> <?php echo e($demo->receiver_plan); ?> <br>
<strong>Amount: </strong> <?php echo e($demo->received_amount); ?> <br>
<strong>Date: </strong> <?php echo e($demo->date); ?> <br>

Thanks,<br>
<?php echo e($demo->sender); ?>.
<?php echo $__env->renderComponent(); ?>
