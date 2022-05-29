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
						<h1 class="title1 text-<?php echo e($text); ?>">Account Profile Information</h1>
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
					<div class="row profile">
						<div class="col-lg-3 col-sm-12 bg-<?php echo e($bg); ?> p-3">
							<div class="profile-sidebar card bg-<?php echo e($bg); ?> shadow rounded pb-5 pt-5">
                                <!-- SIDEBAR USERPIC -->
                                <div class="profile-userpic">
                                  <img src="<?php echo e($settings->site_address); ?>/cloud/app/images/<?php echo e(Auth::user()->photo); ?>" class="img-responsive" alt="">
                                </div>
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                  <div class="profile-usertitle-name">
                                    <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->l_name); ?>

                                  </div>
                                  <div class="profile-usertitle-job">
                                    <?php echo e($settings->site_name); ?> User
                                  </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                <div class="profile-userbuttons">
                                  <button type="button" data-toggle="modal" data-target="#ppix" class="btn btn-success btn-sm">Update Picture</button>
                                  

                                  <div id="ppix" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header .modal-dialog-centered bg-<?php echo e($bg); ?>">
                                            Update Profile Picture
                                            <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body bg-<?php echo e($bg); ?>">
                                            <form role="form" method="post"action="<?php echo e(action('SomeController@updatepix')); ?>" enctype="multipart/form-data">
                                                <input type="file" name="ppix" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" required> <br>
                                                <input type="hidden" name="user_id" value="<?php echo e($userinfo->id); ?>">
                                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- END SIDEBAR BUTTONS -->
                                
                            </div>
                        </div>
                        <div class="col-lg-9 p-2">
                            <div class="card p-5 shadow-lg bg-<?php echo e($bg); ?>">
                                <h2> <span class="fa fa-user"></span> &nbsp; <?php echo e(Auth::user()->name); ?> <?php echo e(Auth::user()->l_name); ?></h2>
                                <h5> <span class="fa fa-location-arrow"></span> &nbsp; <?php echo e(Auth::user()->address); ?>, <?php echo e(Auth::user()->country); ?></h5>
                                <h5> <span class="fa fa-envelope"></span> &nbsp; <?php echo e(Auth::user()->email); ?>  </h5>
                                <h5> <span class="fa fa-mobile"></span> &nbsp; <?php echo e(Auth::user()->phone_number); ?>  </h5>
                                <h5> <span class="fa fa-calendar-alt"></span> &nbsp; <?php echo e(Auth::user()->dob); ?> </h5>
                               
                                <form action="javascript:void(0)" method="post" id="styleform" class="form-inline">
                                    <div class="form-group">
                                        <h5 class="text-<?php echo e($text); ?>">Dashboard Style:</h5> &nbsp; &nbsp;
                                        <label class="style_switch">
                                            <input name="style" id="style" type="checkbox" value="true" class="modes">
                                            <span class="slider round"></span>
                                        </label>
                                    </div> 
                                    <?php if(Auth::user()->dashboard_style =='dark'): ?>
                                    <script>document.getElementById("style").checked= true;</script>
                                    <?php endif; ?>
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                </form>
                                <div>
                                    <input type="submit" data-toggle="modal" data-target="#edit" value="Update Info" class="btn btn-primary">
                                </div>

                                <div id="edit" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header .modal-dialog-centered bg-<?php echo e($bg); ?>">
                                            Edit my Profile
                                            <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body bg-<?php echo e($bg); ?>">
                                            <form role="form" method="post"action="<?php echo e(action('SomeController@updateprofile')); ?>">
                                            <input type="hidden" name="user_id" value="<?php echo e($userinfo->id); ?>">
                                                
                                                <h5 class="text-<?php echo e($text); ?>">Firstname</h5>
                                            <input type="text" name="firstname" value="<?php echo e($userinfo->name); ?>" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"> <br>
                                                <h5 class="text-<?php echo e($text); ?>">Surname</h5>
                                                <input type="text" name="surname" value="<?php echo e($userinfo->l_name); ?>" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"> <br>
                                                <h5 class="text-<?php echo e($text); ?>">Date of Birth</h5>
                                                <input type="date" name="dob"  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" value="<?php echo e($userinfo->dob); ?>"> <br>
                                                <h5 class="text-<?php echo e($text); ?>">Phone Number</h5>
                                                <input type="text" name="phone"  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" value="<?php echo e($userinfo->phone_number); ?>"> <br>
                                                <h5 class="text-<?php echo e($text); ?>">Address</h5>
                                                <textarea class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" placeholder="Full Address" name="address" row="3" value="<?php echo e($userinfo->address); ?>"><?php echo e($userinfo->address); ?></textarea><br/>
                                                
                                                    <input type="hidden" name="user_id" value="">
                                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                    <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <script type="text/javascript">
                                            $("#styleform").on('change',function(){
                                            $.ajax({
                                                url: "<?php echo e(url('/dashboard/changetheme')); ?>",
                                                type: 'POST',
                                                data:$("#styleform").serialize(),
                                                success: function (data) {
                                                    location.reload(true);
                                                },
                                                error: function (data) {
                                                    console.log('Something went wrong');
                                                },

                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
					</div>
				</div>	
			</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>