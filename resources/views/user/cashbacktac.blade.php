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
                        <h1 class="title1 text-{{$text}}">Cashback Program Terms and Conditions</h1>
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
                             <h2>1. Introduction</h2>
                             <p>These Terms and Conditions govern the Cashback Program ("Program") offered by {{$settings->site_name}} ("Company"). By participating in the Program, both the Referrer (the individual or entity referring others) and the Referee (the individual or entity being referred) agree to these Terms and Conditions.</p>
                         
                             <h2>2. Eligibility</h2>
                             <p><strong>2.1 Referrer Eligibility:</strong> The Program is open to all registered users of the Company’s platform who have completed the KYC (Know Your Customer) process.</p>
                             <p><strong>2.2 Referee Eligibility:</strong> The Referee must be a new user who has not previously registered with the Company’s platform.</p>
                         
                             <h2>3. Cashback Process</h2>
                             <p><strong>3.1 Cashback Link:</strong> Referrers will be provided with a unique cashback link to share with potential Referees.</p>
                             <p><strong>3.2 Registration:</strong> The Referee must register using the Referrer’s unique link for the cashback to be valid.</p>
                             <p><strong>3.3 Verification:</strong> Both the Referrer and Referee must complete the KYC verification process for the cashback to qualify for rewards.</p>
                         
                             <h2>4. Rewards</h2>
                             <p><strong>4.1 Referrer Cashback:</strong> The Referrer will receive rewards based on the deposits of the Referee and their subsequent layers of referrals:</p>
                             <ul>
                                 <li><strong>Direct Referee:</strong> The Referrer will receive 3% of the Direct Referee’s deposit.</li>
                                 <li><strong>Second Layer Referee:</strong> The Referrer will receive 1% of the deposit made by the Second Layer Referee (a referral made by the Direct Referee).</li>
                                 <li><strong>Third Layer Referee:</strong> The Referrer will receive 0.35% of the deposit made by the Third Layer Referee (a referral made by the Second Layer Referee).</li>
                             </ul>
                             <p><strong>4.2 Reward Cap:</strong> The total cashback rewards are capped at $100 per Referrer.</p>
                             <p><strong>4.3 Sign-Up Bonus:</strong> Each Referee will receive a one-time sign-up bonus of $20 upon successful registration and completion of their first trade.</p>
                         
                             <h2>5. Program Restrictions</h2>
                             <p><strong>5.1 Self-Referral:</strong> Referrers cannot refer themselves or create multiple accounts to take advantage of the Program.</p>
                             <p><strong>5.2 Prohibited Activities:</strong> Any abuse, manipulation, or fraudulent activity related to the Program will result in disqualification from the Program and forfeiture of any rewards earned.</p>
                             <p><strong>5.3 Non-Transferable:</strong> Cashback rewards are non-transferable and cannot be exchanged for cash or other benefits.</p>
                         
                             <h2>6. Termination and Changes</h2>
                             <p><strong>6.1 Modification:</strong> The Company reserves the right to modify these Terms and Conditions or terminate the Program at any time without prior notice.</p>
                             <p><strong>6.2 Termination:</strong> The Company may suspend or terminate the Program or a user’s participation in the Program if it suspects any fraudulent activity or breach of these Terms and Conditions.</p>
                         
                             <h2>7. Liability</h2>
                             <p><strong>7.1 No Liability:</strong> The Company is not responsible for any losses or damages incurred as a result of participating in the Program.</p>
                             <p><strong>7.2 Disclaimer:</strong> The Program is provided "as is" and "as available" without any warranties of any kind, either express or implied.</p>
                         
                             <h2>8. Governing Law</h2>
                             <p>These Terms and Conditions shall be governed by and construed in accordance with the laws of the United States, without regard to its conflict of law principles.</p>
                         
                             <h2>9. Contact Information</h2>
                             <p>For any questions or concerns regarding the Cashback Program, please contact us at  {{$settings->contact_email}}.</p>
                         
                             <p>By participating in the Cashback Program, you acknowledge that you have read, understood, and agree to be bound by these Terms and Conditions.</p>
                             

                                                     

                        </div>
                    </div>
                </div>
            </div>
    @endsection