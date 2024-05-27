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
@extends('layouts.app')
    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        @inject('uc', 'App\Http\Controllers\UsersController')
        <?php
        $array = \App\users::all();
        $usr = Auth::user()->id;
        ?>
        <div class="main-panel bg-{{$bg}}">
            <div class="content bg-{{$bg}}">
                <div class="page-inner page-inner-{{$bg}}">
                    <div class="mt-2 mb-4">
                        <h1 class="title1 text-{{$text}}">Cashback Program Details</h1>
                    </div>
                    @if(Session::has('message'))
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert alert-info alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <i class="fa fa-info-circle"></i> {{Session::get('message')}}
                            </div>
                        </div>
                    </div>
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
                    
                    <div class="row">
                        <div class="col-12 card bg-{{$bg}} shadow-lg p-3 text-{{$text}}">
                                
                                <p>Welcome to the  {{$settings->site_name}} Cashback Program! By participating in our cashback program, you can earn rewards based on the deposits made by users you refer to our platform. Here's how it works:</p>
                            
                                <h2>How to Participate</h2>
                                <ul>
                                    <li>Share your unique referral link with potential users.</li>
                                    <li>Ensure that the referred users (Referees) register using your link and complete the KYC (Know Your Customer) process.</li>
                                </ul>
                            
                                <h2>Your Unique Referral Link</h2>
                                <div class="referral-link">
                                    <!-- Replace with server-side code to dynamically insert the user's referral link -->
                                    <p>Your referral link: <a href="{{Auth::user()->ref_link}}"><strong>{{Auth::user()->ref_link}}</strong></a> </p>
                                </div>
                            
                                <h2>Cashback Rewards</h2>
                                <p>As a Referrer, you will earn cashback rewards based on the deposits made by your Referees:</p>
                                <ul>
                                    <li><strong>Direct Referee:</strong> Earn {{$settings->referral_commission}}% of the Direct Referee’s deposit.</li>
                                    <li><strong>Second Layer Referee:</strong> Earn {{$settings->referral_commission1}}% of the deposit made by the Second Layer Referee (a referral made by your Direct Referee).</li>
                                    <li><strong>Third Layer Referee:</strong> Earn {{$settings->referral_commission2}}% of the deposit made by the Third Layer Referee (a referral made by the Second Layer Referee).</li>
                                </ul>
                                <p><strong>Note:</strong> The total cashback rewards are capped at $100 per Referrer.</p>
                            
                                <h2>Sign-Up Bonus</h2>
                                <p>Each Referee will receive a one-time sign-up bonus of ${{$settings->signup_bonus}} upon successful registration and completion of their first trade.</p>
                            
                                <h2>Program Restrictions</h2>
                                <ul>
                                    <li>Self-referrals are not allowed.</li>
                                    <li>Any abuse, manipulation, or fraudulent activity will result in disqualification from the Program and forfeiture of any rewards earned.</li>
                                    <li>Cashback rewards are non-transferable and cannot be exchanged for cash or other benefits.</li>
                                </ul>
                            
                                <h2>Terms and Conditions</h2>
                                <p>For the complete Terms and Conditions of the Cashback Program, please <a href="{{ url('dashboard/cashbacktac') }}">click here</a>.</p>
                            
                                <h2>Contact Information</h2>
                                <p>If you have any questions or need further assistance, please contact us at {{$settings->contact_email}}.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
    @endsection