<?php
if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
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
                        <h2 class="text-<?php echo e($text); ?> pb-2">Welcome, <?php echo e(Auth::user()->name); ?>!</h2>

                        <?php if(Session::has('getAnouc') && Session::get('getAnouc') == "true" ): ?>
                            <?php if($settings->enable_annoc == "on"): ?>
                                <h5 id="ann" class="text-<?php echo e($text); ?>op-7 mb-4"><?php echo e($settings->update); ?></h5>
                                <script type="text/javascript">
                                    var announment = $("#ann").html();
                                    console.log(announment);
                                    swal({
                                        title: "Annoucement!",
                                        text: announment,
                                        icon: "info",
                                        buttons: {
                                            confirm: {
                                                text: "Okay",
                                                value: true,
                                                visible: true,
                                                className: "btn btn-info",
                                                closeModal: true
                                            }
                                        }
                                    });
                                </script>  
                            <?php endif; ?>
                            
                            <?php echo e(session()->forget('getAnouc')); ?>

                            
                        <?php endif; ?>

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
                    
                    
                    <?php if(Session::has('message') && Auth::user()->trade_mode == "off"): ?>
                        <h5 id="impmsg" class="text-<?php echo e($text); ?>op-7 mb-4"><?php echo e(Session::get('message')); ?></h5>
                        <script type="text/javascript">
                            // var notice = Session::get('message').html();
                            var notice = $("#impmsg").html();
                            console.log(notice);
                            swal({
                                title: "Important Notice!",
                                text: notice,
                                icon: "info",
                                buttons: {
                                    confirm: {
                                        text: "Okay",
                                        value: true,
                                        visible: true,
                                        className: "btn btn-info",
                                        closeModal: true
                                    }
                                }
                            });
                        </script>  
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
                    <!-- Beginning of  Dashboard Stats  -->
                    <div class="row row-card-no-pd bg-<?php echo e($bg); ?> shadow-lg">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-download text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Deposited</p>
                                                <?php $__currentLoopData = $deposited; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deposited): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(!empty($deposited->count)): ?>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e(number_format($deposited->count, 2, '.', ',')); ?></h4>
                                                <?php else: ?>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e(number_format($deposited->count, 2, '.', ',')); ?></h4>
                                                <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-chart-line text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Profit</p>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->roi, 2, '.', ',')); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-gift text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Bonus</p>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?> <?php echo e(number_format($total_bonus->bonus, 2, '.', ',')); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-retweet text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Ref. Bonus</p>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->ref_bonus, 2, '.', ',')); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Balance</p>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($settings->currency); ?><?php echo e(number_format(Auth::user()->account_bal, 2, '.', ',')); ?></h4> <br>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-briefcase text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Packages</p>
                                                <?php if(count($user_plan)>0): ?>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($user_plan->count()); ?></h4>
                                                <?php else: ?>
                                                <h4 class="card-title text-<?php echo e($text); ?>">0</h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-<?php echo e($bg); ?>">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fa fa-hourglass-start text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Active Packages</p>
                                                
                                                <?php if(count($user_plan_active)>0): ?>
                                                <h4 class="card-title text-<?php echo e($text); ?>"><?php echo e($user_plan_active->count()); ?></h4>
                                                <?php else: ?>
                                                <h4 class="card-title text-<?php echo e($text); ?>">0</h4>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- Beginning of chart -->
                <div class="row">
                    <div class="col-12">
                        <div id="chart-page">
                            <?php echo $__env->make('includes.chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </div>
                    </div>
                </div>
                <!-- end of chart -->
            </div>
    <?php $__env->stopSection(); ?>
   
    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>