<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->

<div class="sidebar sidebar-style-2" data-background-color="{{$bg}}">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <!-- Inser Avatar -->
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="profile-userpic mx-auto">
                            <img src="{{$settings->site_address}}/cloud/app/images/{{Auth::user()->photo}}" onerror="this.onerror=null; this.src=`{{ asset('dash/images/avatar.png')}}`;" class="avatar-img" alt="Avatar">
                        </div>
                        <h5 class="card-title">{{ Auth::user()->name }} {{ Auth::user()->l_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ Auth::user()->email }}</h6>
                        <div class="d-flex justify-content-around px-4">
                            <a href="{{ url('dashboard/profile') }}">
                                <p class="m-0 px-3 py-1 rounded">Edit Profile</p>
                            </a>
                        </div>
                    </div>
                    <!-- Avatar Ends -->
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/wallet') }}">
                        <i class="fa fa-wallet " aria-hidden="true"></i>
                        <p>Wallet</p>
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
                                <a href="{{ url('dashboard/accountdetails') }}">
                                    <span class="sub-item">Withdrawal Info</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('dashboard/notification') }}">
                                    <span class="sub-item">Notifications</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                <a href="{{ url('dashboard/deposits') }}">
                        <i class="fas fa-credit-card" aria-hidden="true"></i>
                        <span class="sub-item">Deposits</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/withdrawals') }}">
                        <i class="fa fa-money-bill " aria-hidden="true"></i>
                        <span class="sub-item">Withdrawal</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/tradinghistory') }}">
                        <i class="fa fa-signal " aria-hidden="true"></i>
                        <p>P/L record</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/accounthistory') }}">
                        <i class="fa fa-history " aria-hidden="true"></i>
                        <p>Transactions history</p>
                    </a>
                </li>
                <!--<li class="nav-item">
                    <a href="{{ url('dashboard/loan') }}">
                        <i class="fa fa-money-bill " aria-hidden="true"></i>
                        <p>Get a Loan</p>
                    </a>
                </li>-->
                <!--<li class="nav-item">
                    <a href="{{ url('dashboard/subtrade') }}">
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
                                <a href="{{ url('dashboard/mplans') }}">
                                    <span class="sub-item">Investment Plans</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('dashboard/myplans') }}">
                                    <span class="sub-item">My Packages</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/referuser') }}">
                        <i class="fa fa-recycle " aria-hidden="true"></i>
                        <p>Refer Users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('dashboard/support') }}">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <p>Support</p>
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
            <div class="modal-header bg-{{$bg}}">
            <h5 class="modal-title text-{{$text}}" style="text-align:center;">KYC verification - Upload documents below to get verified.</h5>
                <button type="button" class="close text-{{$text}}" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-{{$bg}}">
                <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@savevdocs')}}"  enctype="multipart/form-data">
                    <label class="text-{{$text}}">Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
                    <input type="file" class="form-control bg-{{$bg}} text-{{$text}}" name="id" required><br>
                    <label class="text-{{$text}}">Passport photogragh</label>
                    <input type="file" class="form-control bg-{{$bg}} text-{{$text}}" name="passport" required><br>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="submit" class="btn btn-{{$text}}" value="Submit documents">
               </form>
        </div>
    </div>
</div>
</div>
<!-- /Verify Modal -->