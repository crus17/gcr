
<!doctype html>
<html lang="en">

<head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!--<meta name="viewport" content="width=1366">-->
            <title>{{$settings->site_name}} | {{$settings->site_title}}</title>
            <link rel="icon" href="{{ asset ('home/images/favicon.png')}}" type="image/png" sizes="32x32">
            
            <!--Google font-->
            <link href="https://fonts.googleapis.com/css?family=PT+Sans&amp;Ubuntu:400,500,700" rel="stylesheet">
             
            <!-- Libraries CSS Files -->
            <!--<link href="{{ asset ('home/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">-->
            <!--{{ asset ('home/')}}-->
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/bootstrap.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/magnific-popup/magnific-popup.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/owl-carousel/owl.carousel.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/animate.css')}}" />
            <!--<link rel="stylesheet" type="text/css" href="{{ asset ('home/css/font-awesome.css')}}" />-->
            <link href="{{ asset ('home/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/ionicons.min.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/flaticon.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/shop.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/revslider/css/settings.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/style.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/responsive.css')}}">
            <link rel="stylesheet" type="text/css" href="{{ asset ('home/css/custom.css')}}">
        
            <!-- Main Stylesheet File -->
            <link rel="stylesheet" href="javascript:void(0)" data-style="styles">
            <link rel="stylesheet" href="{{ asset ('home/css/style-customizer.css')}}" />
            
            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                {{!! $settings->tawk_to !!}}
            </script>
        
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-113778816-1"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
            
                gtag('config', 'UA-113778816-1');
            </script>
        </head>

<body>

<div id="loading">
<div id="loading-center">
<img src="{{ asset('home/images/loader.gif') }}" alt="loder">
</div>
</div>


<header class="transparent">
<div class="topbar">
<div class="container">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="topbar-left">
<ul class="list-inline">
<li class="list-inline-item"><i class="fa fa-envelope-o text-blue"></i>
    {{$settings->contact_email}}
</li>
</ul>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<div class="topbar-right text-right">
<ul class="list-inline">

    <li class="list-inline-item"><a href="login/"><i class="fa fa-android"></i>Start Invest</a></li>
</ul>
</div>
</div>
</div>
 </div>
</div>
<div class="iq-header">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="logo">
    <a href="\"><img id="logo_img" id="logo_img" class="img-fluid" src="{{ asset('home/images/logo-white.png') }}" alt="logo"></a>
</div>
<nav> <a id="resp-menu" class="responsive-menu" href="javascript:void(0)"><i class="fa fa-reorder"></i> Menu</a>
<ul class="menu text-right">
<li><a href="\">HOME</a></li>
<li><a href="insight">Insight</a></li>
<li><a href="timeline">Timeline</a></li>
<li><a class="active" href="#">Packages</a></li>
<li><a href="login">Login/Join</a></li>
<li><a href="javascript:void(0)">Company</a>
<ul class="sub-menu">
<li><a href="contact">About Us</a></li>
<li><a href="contact">Contact Us</a></li>
</ul>
</li>

</ul>
</nav>
</div>
</div>
</div>
</div>
</header>

<div class="clearfix"></div>

<section class="iq-bg iq-bg-fixed iq-over-black-70 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url( {{ asset('home/images/bg/bg-2.jpg') }}); background-position: center center;">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<div class="heading-title iq-mb-25">
<h3 class="title text-uppercase iq-font-white iq-tw-6">Packages</h3>
</div>
<p>Check below our amazing packages that are designed to give you the very best.</p>
</div>
</div>
</div>
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="\">Home</a></li>
<li class="breadcrumb-item active" aria-current="page">Packages</li>
</ol>
</nav>
</section>


<div class="main-content">

<section class="overview-block-ptb">
<div class="container">
<div class="row">
<div class="col-sm-12">
<div class="heading-title">
<h3 class="title iq-tw-5 iq-mb-20">Investment Packages</h3>
<p>Our amazing packages are designed for all users of varying financial capabilities. Kindly pick from any of the packages below to start investing immediately </p>
</div>
</div>
</div>
<div class="row">
    @foreach ($plans as $plan)
    <div class="col-md-4 col-sm-6">
        <div class="iq-pricing">
            <span class="icon"><i aria-hidden="true" class="ion-social-bitcoin-outline"></i></span>
            <div class="pricing-header">
                <h3 class="title">{{$plan->name}}</h3>
                <span class="price-value">{{$plan->increment_amount}}%</span>
            </div>
            <ul class="pricing-content">
                <li><i aria-hidden="true" class="iq-mr-10 ion-checkmark-round"></i>Min: {{$settings->currency}}{{$plan->min_price}}</li>
                <li><i aria-hidden="true" class="iq-mr-10 ion-checkmark-round"></i>Max: {{$settings->currency}}{{$plan->max_price}}</li>
                <li><i aria-hidden="true" class="iq-mr-10 ion-checkmark-round"></i>{{$settings->currency}}{{$plan->gift}} Gift Bonus</li>
                <li><i aria-hidden="true" class="iq-mr-10 ion-checkmark-round"></i>ROI After 30 days</li>
            </ul>
            <a class="button" href="register">Get Started</a>
        </div>
    </div>
    @endforeach
    
</div>

</div>
</section>

    
<div class="overview-block-ptb3 iq-bg iq-over-black-80 jarallax" style="background-image: url({{ asset('home/images/bg/bg-5.jpg') }}); background-position: center center;">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
<div class="counter"><i class="ion-ios-monitor-outline iq-font-yellow" aria-hidden="true"></i>
<div class="right text-left">
<span class="timer iq-font-white" data-to="5" data-speed="10000">5</span>
<label class="iq-font-white">Servers</label>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
<div class="counter"> <i class="ion-ios-paper-outline iq-font-yellow" aria-hidden="true"></i>
<div class="right text-left">
<span class="timer iq-font-white" data-to="25" data-speed="10000">25</span>
<label class="iq-font-white">AWARDS</label>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
<div class="counter"> <i class="ion-ios-person-outline iq-font-yellow" aria-hidden="true"></i>
<div class="right text-left">
<span class="timer iq-font-white" data-to="3120" data-speed="10000">3120</span>
<label class="iq-font-white">CLIENTS</label>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-xs-12 iq-mtb-20">
<div class="counter"> <i class="ion-ios-star-outline iq-font-yellow" aria-hidden="true"></i>
<div class="right text-left">
<span class="timer iq-font-white" data-to="1620" data-speed="10000">1620</span>
<label class="iq-font-white">RATES</label>
</div>
</div>
</div>
</div>
</div>
</div>
    
 <div class="iq-our-clients particles-bg white-bg iq-ptb-40">
<canvas id="canvas"></canvas>
<div class="container ">
<div class="row ">
<div class="col-lg-12 col-md-12 ">
<div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="false" data-items="5" data-items-laptop="4" data-items-tab="3" data-items-mobile="2" data-items-mobile-sm="1" data-margin="30">
<div class="item"> <a href="#"><img class="img-fluid" src="{{ asset('home/images/clients/white/logo2.png') }}" alt="#"></a></div>
<div class="item"> <a href="#"><img class="img-fluid" src="{{ asset('home/images/clients/white/logo3.png') }}" alt="#"></a></div>
<div class="item"> <a href="#"><img class="img-fluid" src="{{ asset('home/images/clients/white/logo6.jpg') }}" alt="#"></a></div>
<div class="item"> <a href="#"><img class="img-fluid" src="{{ asset('home/images/clients/white/logo2.png') }}" alt="#"></a></div>
<div class="item"> <a href="#"><img class="img-fluid" src="{{ asset('home/images/clients/white/logo3.png') }}" alt="#"></a></div>
<div class="item"> <a href="#"><img class="img-fluid" src="{{ asset('home/images/clients/white/logo6.jpg') }}" alt="#"></a></div>
</div>
</div>
</div>
</div>
</div>
</div>

<footer class="iq-footer">
<div class="footer-top iq-bg iq-bg-fixed iq-over-black-80" style="background-image:url({{ asset('home/images/bg/bg-13.jpg') }}); ">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-12 iq-mtb-60">
<div class="logo">
<img id="logo_img_2" class="img-fluid" src="{{ asset('home/images/logo-white.png') }}" alt="# ">
<div class="iq-font-white iq-mt-15 ">{{$settings->site_name}} is a trading platform that pays his investors 100% daily for 30days. 
We are here to help you trade and lead you to financial freedom. The bot has been built with the latest artificial intelligence technology in the industry.
</div>
</div>
</div>
<div class="col-lg-2 col-md-6 col-sm-12 iq-mtb-60 footer-menu">
<h5 class="small-title iq-tw-5 iq-font-white">Menu</h5>
<ul class="iq-pl-0">
<li><a href="home">Home</a></li>
<li><a href="insight">Insight</a></li>
<li><a href="timeline">Timeline</a></li>
<li><a href="about">About us</a></li>
<li><a href="contact">Contact Us</a>
</li>
</ul>
</div>
<div class="col-lg-3 col-md-6 col-sm-12 iq-contact iq-mtb-60">
<h5 class="small-title iq-tw-5 iq-font-white">Contact us</h5>
<div class="iq-mb-30">
<div class="blog"><i class="ion-ios-telephone-outline"></i>
<div class="content ">
<div class="iq-tw-6 title ">Phone</div> {{$settings->contact_number}}</div>
</div>
</div>
<div class="iq-mb-30">
<div class="blog "><i class="ion-ios-email-outline"></i>
<div class="content ">
    <div class="iq-tw-6 title ">Mail</div> 
        {{$settings->contact_email}}
    </div>
 </div>
</div>
<div class="blog"><i class="ion-ios-location-outline"></i>
<div class="content ">
<div class="iq-tw-6 title ">Address</div> 103 Bedford street suite 102, Hamilton 
Montana, 59840, USA</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-12 iq-mb-60">
<div class="call-back">
<h5 class="small-title iq-tw-5 iq-font-white">Request a Call Back</h5>
<form>
<div class="form-group iq-mb-20">
<input type="text" class="form-control" id="exampleInputName" placeholder="Enter Name">
</div>
<div class="form-group iq-mb-20">
<input type="text" class="form-control" id="exampleInputPhone" placeholder="Phone Number">
</div>
<div class="form-group iq-mb-20">
<input type="text" class="form-control" id="exampleInputsubject" placeholder="Subject">
</div>
<a class="button" href="javascript:void(0)">Submit</a>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="footer-bottom iq-ptb-20 ">
<div class="container">
<div class="row">
<div class="col-sm-6">
    <div class="iq-copyright iq-mt-10 iq-font-white">Copyright <span id="copyright"> <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="javascript:void(0)">{{$settings->site_name}}</a> All Rights Reserved </div>
</div>
<div class="col-sm-6">
<ul class="iq-media-blog ">
<li><a href="# "><i class="fa fa-twitter "></i></a></li>
<li><a href="# "><i class="fa fa-facebook "></i></a></li>
<li><a href="# "><i class="fa fa-google "></i></a></li>
<li><a href="# "><i class="fa fa-github "></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>







<div id="back-to-top">
<a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
</div>





        <script src="{{ asset('home/js/jquery-min.js') }}"></script>
        <script src="{{ asset('home/js/popper.min.js') }}"></script>
        <script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('home/js/widget.js') }}"></script>
        <script src="{{ asset('home/js/all-plugins.js') }}"></script>
        <script src="{{ asset('home/js/particles.js') }}"></script>
        <script src="{{ asset('home/js/style-customizer.js') }}"></script>
        <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

<!-- Mirrored from iqonicthemes.com/themes/coinex/dark/pricing.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 19 Jan 2019 08:47:31 GMT -->
</html>