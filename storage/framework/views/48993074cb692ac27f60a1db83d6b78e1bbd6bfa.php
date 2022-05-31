<form method="post" action="<?php echo e(action('Admin\SettingsController@updatesubfee')); ?>">
    <div class="Form-group">
        <h4 class="text-<?php echo e($text); ?>">Monthly Subscription Fee:</h4>
        <input type="text" name="monthlyfee" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->monthlyfee); ?>">
    </div>

    <div class="form-group">
        <h4 class="text-<?php echo e($text); ?>">Quaterly Subscription Fee:</h4>
        <input type="text" name="quaterlyfee" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>"  value="<?php echo e($settings->quaterlyfee); ?>">
    </div>
    
    <div class="form-group">
        <h4 class="text-<?php echo e($text); ?>">Yearly Subscription Fee:</h4>
        <input type="text" name="yearlyfee" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>"  value="<?php echo e($settings->yearlyfee); ?>">
    </div>

    <input type="submit" class="btn btn-primary btn-round px-5 btn-lg" value="Save">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"><br/>
</form>