<?php
if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}

?>

@extends('layouts.app')

    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
            <div class="content bg-{{$bg}}">
                <div class="page-inner page-inner-{{$bg}}">
                    @if ($settings->translate_page !== "off")
                        <div id="google_translate_element"></div>
                    @endif
                    <div class="mt-2 mb-4">
                        <h2 class="text-{{$text}} pb-2">Welcome, {{ Auth::user()->name }}!</h2>

                        @if(Session::has('getAnouc') && Session::get('getAnouc') == "true" )
                            @if ($settings->enable_annoc == "on")
                                <h5 id="ann" class="text-{{$text}}op-7 mb-4">{{$settings->update}}</h5>
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
                            @endif
                            
                            {{session()->forget('getAnouc')}}
                            
                        @endif

                    </div>
                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {{ Session::get('message') }}
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    
                    @if (Session::has('message') && Auth::user()->trade_mode == "off")
                        <h5 id="impmsg" class="text-{{$text}}op-7 mb-4">{{Session::get('message')}}</h5>
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
                    @endif
        
                    @if(count($errors) > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissable" role="alert" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- Beginning of Promo banner -->
                    <div class="platform-promo bg-{{$bg}}">
                        <div class="promo-ads">
                            <h1 class="text-{{$text}}">Get a cashback</h1>
                            <p>Invite vour friends to use {{$settings->site_name}} and get up to $100 Cashback straight to vour wallet</p>
                            <div class="d-flex">
                                <button class="btn btn-primary mr-2 rounded-pill">Learn more</button>
                                <button class="btn bg-transparent text-muted">Terms & condition</button>
                            </div>
                        </div>
                        <div class="promo-img d-none d-sm-block d-md-block">
                            <img src="{{ asset('dash/images/bull.jpeg')}}" alt="">
                        </div>
                    </div>
                    <div class="quick-action-view bg-{{$bg}} col-sm-10 col-md-6">
                        <!-- Quick action buttons -Withdraw Deposit  -->
                        <div class="quick-action-btn-group">
                            <h4 class="card-title text-{{$text}} flex-1">My Wallet</h4>
                            <a href="#" data-toggle="modal" data-target="#depositModal">
                                <div class="btn btn-success action-button">
                                    Deposit
                                </div>
                            </a>
                            <a href="{{ url('dashboard/withdrawals') }}" >
                                <div class="btn btn-warning action-button">
                                    Withdraw
                                </div>
                            </a>
                        </div>
                        <div class="quick-action-view-balance">
                            <p class="quick-action-label text-mute">Total Balance</p>
                            <h4 class="card-title text-{{$text}} font-weight-bold">{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}</h4>
                        </div>
                        <div class="chart"></div>
                        
                    </div>

                    <!-- Beginning of  Dashboard Stats  -->
                    <div class="row row-card-no-pd">
                        <div class="col-6 col-sm-4 col-md-3 px-1">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <div class="card-icon bg-{{$text}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M535 41c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l64 64c4.5 4.5 7 10.6 7 17s-2.5 12.5-7 17l-64 64c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l23-23L384 112c-13.3 0-24-10.7-24-24s10.7-24 24-24l174.1 0L535 41zM105 377l-23 23L256 400c13.3 0 24 10.7 24 24s-10.7 24-24 24L81.9 448l23 23c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L7 441c-4.5-4.5-7-10.6-7-17s2.5-12.5 7-17l64-64c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9zM96 64H337.9c-3.7 7.2-5.9 15.3-5.9 24c0 28.7 23.3 52 52 52l117.4 0c-4 17 .6 35.5 13.8 48.8c20.3 20.3 53.2 20.3 73.5 0L608 169.5V384c0 35.3-28.7 64-64 64H302.1c3.7-7.2 5.9-15.3 5.9-24c0-28.7-23.3-52-52-52l-117.4 0c4-17-.6-35.5-13.8-48.8c-20.3-20.3-53.2-20.3-73.5 0L32 342.5V128c0-35.3 28.7-64 64-64zm64 64H96v64c35.3 0 64-28.7 64-64zM544 320c-35.3 0-64 28.7-64 64h64V320zM320 352a96 96 0 1 0 0-192 96 96 0 1 0 0 192z"/></svg>
                                                </div>
                                                <p class="card-category">Spot</p>
                                                @foreach($deposited as $deposited)
                                                @if(!empty($deposited->count))
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format($deposited->count, 2, '.', ',')}}</h4>
                                                @else
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format($deposited->count, 2, '.', ',')}}</h4>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 px-1">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <div class="card-icon bg-{{$text}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M470.7 9.4c3 3.1 5.3 6.6 6.9 10.3s2.4 7.8 2.4 12.2l0 .1v0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3L310.6 214.6c-11.8 11.8-30.8 12.6-43.5 1.7L176 138.1 84.8 216.3c-13.4 11.5-33.6 9.9-45.1-3.5s-9.9-33.6 3.5-45.1l112-96c12-10.3 29.7-10.3 41.7 0l89.5 76.7L370.7 64H352c-17.7 0-32-14.3-32-32s14.3-32 32-32h96 0c8.8 0 16.8 3.6 22.6 9.3l.1 .1zM0 304c0-26.5 21.5-48 48-48H464c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V304zM48 416v48H96c0-26.5-21.5-48-48-48zM96 304H48v48c26.5 0 48-21.5 48-48zM464 416c-26.5 0-48 21.5-48 48h48V416zM416 304c0 26.5 21.5 48 48 48V304H416zm-96 80a64 64 0 1 0 -128 0 64 64 0 1 0 128 0z"/></svg>    
                                                </div>
                                                <p class="card-category">Funding</p>
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 px-1">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <div class="card-icon bg-{{$text}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"/></svg>
                                                </div>
                                                <p class="card-category">Margin</p>
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                        <div class="col-6 col-sm-4 col-md-3 px-1">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <div class="card-icon bg-{{$text}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/></svg>
                                                </div>
                                                <p class="card-category">Total Packages</p>
                                                @if(count($user_plan)>0)
                                                <h4 class="card-title text-{{$text}}">{{$user_plan->count()}}</h4>
                                                @else
                                                <h4 class="card-title text-{{$text}}">0</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-sm-4 col-md-3 px-1">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <div class="card-icon bg-{{$text}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 352h8.2c32.3-39.1 81.1-64 135.8-64c5.4 0 10.7 .2 16 .7V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM320 352H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H360.2C335.1 449.6 320 410.5 320 368c0-5.4 .2-10.7 .7-16l-.7 0zm320 16a144 144 0 1 0 -288 0 144 144 0 1 0 288 0zM496 288c8.8 0 16 7.2 16 16v48h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H496c-8.8 0-16-7.2-16-16V304c0-8.8 7.2-16 16-16z"/></svg>
                                                </div>
                                                <p class="card-category">Active Packages</p>
                                                
                                                @if(count($user_plan_active)>0)
                                                <h4 class="card-title text-{{$text}}">{{$user_plan_active->count()}}</h4>
                                                @else
                                                <h4 class="card-title text-{{$text}}">0</h4>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->
                    </div>
                <!-- Beginning of chart -->
                <div class="row">
                    <div class="col-12">
                        <div id="chart-page">
                            @include('includes.chart')
                        </div>
                    </div>
                </div>
                <!-- end of chart -->
            </div>
			@include('user.modals')	

    @endsection
   
    