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
        <div class="main-panel bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
            <div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                    <h1 class="title1 text-<?php echo e($text); ?>">Managers List</h1>
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
                        <div class="col p-4 shadow card bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="ShipTable" class="table table-hover text-<?php echo e($text); ?>"> 
                                    <thead> 
                                        <tr> 
                                            <th>USER ID</th>
                                            <th>FIRSTNAME</th>
                                            <th>LASTNAME</th>
                                            <th>EMAIL</th>
                                            <th>PHONE</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
                                            <th>ACTION</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($admin->id); ?></td>
                                        <td><?php echo e($admin->firstName); ?></td>
                                        <td><?php echo e($admin->lastName); ?></td>
                                        <td><?php echo e($admin->email); ?></td>
                                        <td><?php echo e($admin->phone); ?></td>
                                        <td><?php echo e($admin->type); ?></td>
                                        <td><?php echo e($admin->acnt_type_active); ?></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-secondary btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Actions
                                                </a>
                                                <div class="dropdown-menu bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" aria-labelledby="dropdownMenuLink">

                                                    <?php if($admin->acnt_type_active==NULL || $admin->acnt_type_active=='blocked'): ?>
                                                    <a class="btn btn-primary btn-sm m-1" href="<?php echo e(url('admin/dashboard/unblock')); ?>/<?php echo e($admin->id); ?>">Unblock</a> 
                                                    <?php else: ?>
                                                    <a class="btn btn-danger btn-sm m-1" href="<?php echo e(url('admin/dashboard/ublock')); ?>/<?php echo e($admin->id); ?>">Block</a>
                                                    <?php endif; ?>
                                                    <a href="#" data-toggle="modal" data-target="#resetpswdModal<?php echo e($admin->id); ?>"  class="btn btn-warning btn-sm m-1">Reset Password</a>
                                                    
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo e($admin->id); ?>" class="btn btn-danger btn-sm m-1">Delete</a>
                                                    <a href="#" data-toggle="modal" data-target="#edituser<?php echo e($admin->id); ?>" class="btn btn-secondary btn-sm m-1">Edit</a>
                                                    <a href="#" data-toggle="modal" data-target="#sendmailModal<?php echo e($admin->id); ?>" class="btn btn-info btn-sm m-1">Send Email</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>


                                    <!-- Reset user password Modal -->
										<div id="resetpswdModal<?php echo e($admin->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> ">
                                                    
                                                    <h4 class="modal-title text-<?php echo e($text); ?>">Reset Password</strong></h4>
                                                    <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3">
                                                    <p class="text-<?php echo e($text); ?>">Are you sure you want to reset password for <?php echo e($admin->firstName); ?> to <span class="text-primary font-weight-bolder">admin01236</span></p>
                                                    <a class="btn btn-danger" href="<?php echo e(url('admin/dashboard/resetadpwd')); ?>/<?php echo e($admin->id); ?>">Reset Now</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Reset user password Modal -->

                                        <!-- Delete user Modal -->
										<div id="deleteModal<?php echo e($admin->id); ?>" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
            
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    
                                                    <h4 class="modal-title text-<?php echo e($text); ?>">Delete Manager</strong></h4>
                                                    <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> p-3">
                                                    <p class="text-<?php echo e($text); ?>">Are you sure you want to delete <?php echo e($admin->firstName); ?></p>
                                                    <a class="btn btn-danger" href="<?php echo e(url('admin/dashboard/deluser')); ?>/<?php echo e($admin->id); ?>">Yes i'm sure</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Delete user Modal -->
                                        
								<!-- Edit user Modal -->
                                    <div id="edituser<?php echo e($admin->id); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                                <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    
                                                    <h4 class="modal-title text-<?php echo e($text); ?>">Edit user details.</strong></h4>
                                                    <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                        <form style="padding:3px;" role="form" method="post" action="<?php echo e(route('editadmin')); ?>">
                                                            <h5 class=" text-<?php echo e($text); ?>">Firstname</h5>
                                                            <input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($admin->firstName); ?>" type="text" name="fname" required><br/>
                                                            <h5 class=" text-<?php echo e($text); ?>">Lastname</h5>
                                                            <input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($admin->lastName); ?>" type="text" name="l_name" required><br/>
                                                            <h5 class=" text-<?php echo e($text); ?>">Email</h5>
                                                            <input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($admin->email); ?>" type="email" name="email" required><br/>
                                                            <h5 class=" text-<?php echo e($text); ?>">Phone Number</h5>
                                                            <input style="padding:5px;" class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" value="<?php echo e($admin->phone); ?>" type="text" name="phone" required>
                                                            <br>
                                                            <h5 class=" text-<?php echo e($text); ?>">Type</h5>
                                                            <select class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="type">
                                                                <option><?php echo e($admin->type); ?></option>
                                                                <option>Super Admin</option>
                                                                <option>Admin</option>
                                                            </select><br>
                                                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                            <input type="hidden" name="user_id" value="<?php echo e($admin->id); ?>">
                                                            <input type="submit" class="btn btn-info" value="Update account">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Edit user Modal -->
                                    <!-- send a single user email Modal-->
                                    <div id="sendmailModal<?php echo e($admin->id); ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    <h4 class="modal-title text-<?php echo e($text); ?>">Send Email Message</h4>
                                                    <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
                                                    <p class="text-<?php echo e($text); ?>">This message will be sent to <?php echo e($admin->firstName); ?> <?php echo e($admin->lastName); ?> </p>
                                                    <form role="form" method="post" action="<?php echo e(action('Admin\UsersController@sendmail')); ?>">

                                                        <input type="hidden" name="user_id" value="<?php echo e($admin->id); ?>">
                                                        <textarea class="form-control bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> text-<?php echo e($text); ?>" name="message " row="3" placeholder="Type your message here" required></textarea><br/>
                                                        
                                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                                        <input type="submit" class="btn btn-primary" value="Send">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>   
            </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>