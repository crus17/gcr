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
                                <a href="{{ url('dashboard/cashback') }}" class="btn btn-primary mr-2 rounded-pill">Learn more</a>
                                <a href="{{ url('dashboard/cashbacktac') }}" class="btn bg-transparent text-muted">Terms & condition</a>
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
                            <p class="quick-action-label text-mute">Wallet Balance</p>
                            <h4 class="card-title text-{{$text}} font-weight-bold">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</h4>
                        </div>
                        <div class="chart"></div>
                        
                    </div>
            </div>
			@include('user.modals')	

    @endsection
   
    