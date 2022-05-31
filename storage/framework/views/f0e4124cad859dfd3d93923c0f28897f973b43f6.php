<form method="post" action="<?php echo e(action('Admin\SettingsController@updatewebinfo')); ?>" enctype="multipart/form-data">
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Announcement</h5>
        <textarea name="update" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="2"><?php echo e($settings->update); ?></textarea>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Website Name</h5>
        <input type="text" name="site_name" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->site_name); ?>" required>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Website Description</h5>
        <textarea name="description" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4"><?php echo e($settings->description); ?></textarea>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Live chat widget Code</h5>
        <textarea name="tawk_to" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" rows="4"><?php echo e($settings->tawk_to); ?></textarea>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Website Title</h5>
        <input type="text" name="site_title" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->site_title); ?>" required>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Website Keywords</h5>
        <input type="text" name="keywords" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->keywords); ?>" required>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Website Url (https://yoursite.com)</h5>
        <input type="text" placeholder="https://yoursite.com" name="site_address" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($settings->site_address); ?>" required>
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Site Logo (Recommended size; max width, 200px and max height 100px.)</h5>
        <input name="logo" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" type="file">
    </div>
    <div class="form-group">
        <h5 class="text-<?php echo e($text); ?>">Site Favicon (Recommended type: png, size: max width, 32px and max height 32px.)</h5>
        <input name="favicon" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" type="file">
    </div>

    <input type="submit" class="btn btn-primary px-5 btn-lg" value="Update">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
</form>