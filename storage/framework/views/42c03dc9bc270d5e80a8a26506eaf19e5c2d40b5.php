<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->

<div class="sidebar sidebar-style-2" data-background-color="<?php echo e($bg); ?>">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo e(Auth::user()->name); ?>

                            
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="<?php echo e(url('dashboard/profile')); ?>">
                                    <span class="link-collapse">Account Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="<?php echo e(url('/dashboard')); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#bases">
                        <i class="fas fa-user"></i>
                        <p>Account</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="bases">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('dashboard/accountdetails')); ?>">
                                    <span class="sub-item">Withdrawal Info</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('dashboard/notification')); ?>">
                                    <span class="sub-item">Notifications</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('dashboard/support')); ?>">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <p>Support</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('dashboard/tradinghistory')); ?>">
                        <i class="fa fa-signal " aria-hidden="true"></i>
                        <p>P/L record</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('dashboard/accounthistory')); ?>">
                        <i class="fa fa-history " aria-hidden="true"></i>
                        <p>Transactions history</p>
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="<?php echo e(url('dashboard/loan')); ?>">
                        <i class="fa fa-money-bill " aria-hidden="true"></i>
                        <p>Get a Loan</p>
                    </a>
                </li>-->
                <li class="nav-item">
                    <!--<a data-toggle="collapse" href="#dept">
                        <i class="fas fa-credit-card"></i>
                        <p>Deposit/Withdrawal</p>
                        <span class="caret"></span>
                    </a>-->
                    <a href="<?php echo e(url('dashboard/deposits')); ?>">
                        <i class="fas fa-credit-card" aria-hidden="true"></i>
                        <span class="sub-item">Deposits</span>
                    </a>
                    <a href="<?php echo e(url('dashboard/withdrawals')); ?>">
                        <i class="fa fa-money-bill " aria-hidden="true"></i>
                        <span class="sub-item">Withdrawal</span>
                    </a>
                    <!--<div class="collapse" id="dept">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('dashboard/deposits')); ?>">
                                    <span class="sub-item">Deposits</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('dashboard/withdrawals')); ?>">
                                    <span class="sub-item">Withdrawal</span>
                                </a>
                            </li>
                        </ul>
                    </div>-->
                </li>
                <!--<li class="nav-item">
                    <a href="<?php echo e(url('dashboard/subtrade')); ?>">
                        <i class="fa fa-th" aria-hidden="true"></i>
                        <p>Subscription Trade</p>
                    </a>
                </li>-->
                <li class="nav-item">
                    <a data-toggle="collapse" href="#mpack">
                        <i class="fa fa-briefcase"></i>
                        <p>Packages</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="mpack">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="<?php echo e(url('dashboard/mplans')); ?>">
                                    <span class="sub-item">Investment Plans</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo e(url('dashboard/myplans')); ?>">
                                    <span class="sub-item">My Packages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(url('dashboard/referuser')); ?>">
                        <i class="fa fa-recycle " aria-hidden="true"></i>
                        <p>Refer Users</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<!-- Verify Modal -->

<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-<?php echo e($bg); ?>">
            <h5 class="modal-title text-<?php echo e($text); ?>" style="text-align:center;">KYC verification - Upload documents below to get verified.</h5>
                <button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-<?php echo e($bg); ?>">
                <form style="padding:3px;" role="form" method="post" action="<?php echo e(action('SomeController@savevdocs')); ?>"  enctype="multipart/form-data">
                    <label class="text-<?php echo e($text); ?>">Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
                    <input type="file" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="id" required><br>
                    <label class="text-<?php echo e($text); ?>">Passport photogragh</label>
                    <input type="file" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" name="passport" required><br>
                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                   <input type="submit" class="btn btn-<?php echo e($text); ?>" value="Submit documents">
               </form>
        </div>
    </div>
</div>
</div>
<!-- /Verify Modal -->