<form method="post" action="<?php echo e(action('Admin\SettingsController@updatebotswt')); ?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for=""></label>
    <h5 class="text-<?php echo e($text); ?>">Referral Commission (%) </h5>
        <input type="text" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="ref_commission" value="<?php echo e($settings->referral_commission); ?>" required>
    </div>

    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Referral Commission 1 (%) </h5>
        <input type="text" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="ref_commission1" value="<?php echo e($settings->referral_commission1); ?>" required>
    </div>

    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Referral Commission 2 (%) </h5>
        <input type="text" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="ref_commission2" value="<?php echo e($settings->referral_commission2); ?>" required>
    </div>

    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Referral Commission 3 (%) </h5>
        <input type="text" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="ref_commission3" value="<?php echo e($settings->referral_commission3); ?>" required>
    </div>

    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Referral Commission 4 (%) </h5>
        <input type="text" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="ref_commission4" value="<?php echo e($settings->referral_commission4); ?>" required>
    </div>

    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Referral Commission 5 (%) </h5>
        <input type="text" class="form-control  bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="ref_commission5" value="<?php echo e($settings->referral_commission5); ?>" required>
    </div>

    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Sign up Bonus (<?php echo e($settings->currency); ?>)</h5>
        <input type="text" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="signup_bonus" value="<?php echo e($settings->signup_bonus); ?>" required>
    </div>

    <input type="submit" class="btn btn-primary  px-5 btn-lg" value="Update">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
</form>