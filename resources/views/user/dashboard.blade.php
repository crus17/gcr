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
                <div class="page-inner">
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
                        <div class="promo-img d-sm-none d-md-block">
                            <img src="{{ asset('dash/images/bull.jpeg')}}" alt="">
                        </div>
                    </div>
                    <!-- Beginning of  Dashboard Stats  -->
                    <div class="row row-card-no-pd">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Deposited</p>
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
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Profit</p>
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Ref. Bonus</p>
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Balance</p>
                                                <h4 class="card-title text-{{$text}}">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
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
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round bg-{{$bg}}">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-stats">
                                            <div class="numbers">
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
    @endsection
   
    