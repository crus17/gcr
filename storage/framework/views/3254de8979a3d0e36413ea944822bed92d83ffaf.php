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
<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="<?php echo e($bgmenu); ?>">
        <a href="/" class="logo" style="font-size: 27px; color:#fff;">
            <?php echo e($settings->site_name); ?>

        </a>
        <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="icon-menu"></i>
            </span>
        </button>
        <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
        <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
                <i class="icon-menu"></i>
            </button>
        </div>
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="<?php echo e($bgmenu); ?>">
        
        <div class="container-fluid">
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
              
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        
                    </a>
                    <ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
                        
                        
                        <li>
                            <a class="see-all" href="<?php echo e(url('dashboard/notification')); ?>">See all notifications<i class="fa fa-angle-right"></i> </a>
                        </li>
                    </ul>
                </li>
                <?php if($settings->enable_kyc =="yes"): ?>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-layer-group"></i><strong style="font-size:8px;">KYC</strong>
                    </a>
                    <div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
                        <div class="quick-actions-header">
                            <span class="title mb-1">KYC verification</span>
                            <?php if(Auth::user()->account_verify=='yes'): ?>	
                            <span class="subtitle op-8">
                             <a href="#" class="col-12 p-0" ><i class="glyphicon glyphicon-ok"></i> KYC status: Account verified</a>
                            </span>
                            <?php else: ?>
                           <span class="subtitle op-8"><a>KYC status: <?php echo e(Auth::user()->account_verify); ?></a></span>
                            <?php endif; ?>
                        </div>
                        <div class="quick-actions-scroll scrollbar-outer">
                            <div class="quick-actions-items">
                                <div class="row m-0">
                                <?php if(Auth::user()->account_verify !='yes'): ?>
                                <a href="#" data-toggle="modal" data-target="#verifyModal" class="btn btn-success">Verify Account </a>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endif; ?>
                <li class="nav-item dropdown hidden-caret">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-user"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <a class="dropdown-item" href="<?php echo e(url('dashboard/changepassword')); ?>">Change Password</a>
                                <a class="dropdown-item" href="<?php echo e(url('dashboard/profile')); ?>">Update Account</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Logout
                                    </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>