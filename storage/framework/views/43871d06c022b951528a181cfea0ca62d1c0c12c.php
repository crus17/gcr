<?php $__env->startComponent('mail::message'); ?>
# Greetings!

<?php echo $demo->message; ?>


<br>
Kind regards,<br>
<?php echo e($demo->sender); ?>.
<?php echo $__env->renderComponent(); ?>
