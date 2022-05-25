
<!doctype html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<meta name="viewport" content="width=1366">-->
        <title><?php echo e($settings->site_name); ?> | <?php echo e($settings->site_title); ?></title>
        <link rel="icon" href="<?php echo e(asset ('temp/img/favicon.png')); ?>" type="image/png" sizes="32x32">
        
        <!--Google font-->
        <link href="https://fonts.googleapis.com/css?family=PT+Sans&amp;Ubuntu:400,500,700" rel="stylesheet">
        
        <!-- Libraries CSS Files -->
        <!--<link href="<?php echo e(asset ('zenith/lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">-->
        <!--<?php echo e(asset ('zenith/')); ?>-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/magnific-popup/magnific-popup.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/owl-carousel/owl.carousel.css')); ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/animate.css')); ?>" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/font-awesome.css')); ?>" />-->
        <link href="<?php echo e(asset ('temp/lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/ionicons.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/flaticon.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/shop.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/revslider/css/settings.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/responsive.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/css/custom.css')); ?>">
    
        <!-- Main Stylesheet File -->
        <link rel="stylesheet" href="javascript:void(0)" data-style="styles">
        <link rel="stylesheet" href="<?php echo e(asset ('zenith/css/style-customizer.css')); ?>" />
        
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            {<?php echo $settings->tawk_to; ?>}
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
            <img src="<?php echo e(asset('zenith/images/loader.gif')); ?>" alt="loder">
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
                                    <?php echo e($settings->contact_email); ?>

                                    <!--<a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b32353d341b39322f383432353e232b3e292f372f3f75383436">[email&#160;protected]</a></li>-->
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
                            <a href="\"><img id="logo_img" id="logo_img" class="img-fluid" src="<?php echo e(asset('zenith/images/logo-white.png')); ?>" alt="logo"></a>
                        </div>
                        <nav> <a id="resp-menu" class="responsive-menu" href="javascript:void(0)"><i class="fa fa-reorder"></i> Menu</a>
                            <ul class="menu text-right">
                                <li><a href="\">HOME</a></li>
                                <li><a href="insight">Insight</a></li>
                                <li><a href="timeline">Timeline</a></li>
                                <li><a href="pricing">Packages</a></li>
                                <li><a href="login">Login/Join</a></li>
                                <li><a class="active" href="javascript:void(0)">Company</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">Contact Us</a></li>
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

    <section class="iq-bg iq-bg-fixed iq-over-black-70 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url(<?php echo e(asset('zenith/images/bg/bg-2.jpg')); ?>); background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="heading-title iq-mb-25">
                        <h3 class="title text-uppercase iq-font-white iq-tw-6">Contact Us</h3>
                    </div>
                    <p>For your questions and data verification and confirmation of transactions do not hesitate to contact our support team</p>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="\">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
            </ol>
        </nav>
    </section>

    <div class="main-content">
    
        <section class="contact-2">
            <div class="container">
                <div class="row iq-ptb-60">
                    <div class="col-lg-5">
                    <h3 class="iq-mtb-30">Contact Info</h3>
                    <div class="contact-box iq-mb-30">
                        <div>
                            <i aria-hidden="true" class="ion-ios-location-outline iq-icon"></i><span class="iq-title text-uppercase iq-ml-15 iq-tw-6 iq-font-yellow">Address</span>
                        </div>
                        <div class="lead iq-font-white">103 Bedford street suite 102, Hamilton Montana, 59840, USA</div>
                    </div>
                    <div class="contact-box iq-mb-30">
                        <div>
                            <i aria-hidden="true" class="ion-ios-time-outline iq-icon"></i><span class="iq-title text-uppercase iq-ml-15 iq-tw-6 iq-font-yellow">Working Hour</span>
                        </div>
                        <div class="lead iq-font-white"> <span>(Mon-Fri 8:00am - 8:00pm)</span> </div>
                    </div>
                    <div class="contact-box iq-mb-30">
                        <div>
                            <i aria-hidden="true" class="ion-ios-email-outline iq-icon"></i><span class="iq-title text-uppercase iq-ml-15 iq-tw-6 iq-font-yellow">Mail</span>
                        </div>
                        <div class="lead iq-font-white">  
                            <span> <?php echo e($settings->contact_email); ?> </span>
                        </div>
                    </div>
                    </div>
                        <div class="col-lg-7">
                            <h3 class="iq-mtb-30">Contact Form</h3>
                            <div id="formmessage">Success/Error Message Goes Here</div>
                                <form class="form-horizontal" id="contactform" method="post" action="">
                                   <div class="contact-form">
                                        <div class="section-field iq-mb-30">
                                            <input id="name" type="text" placeholder="Name*" name="name">
                                        </div>
                                        <div class="section-field iq-mb-30">
                                            <input id="email" type="text" placeholder="Email*" name="email">
                                        </div>
                                        <div class="section-field iq-mb-30">
                                            <input id="phone" type="text" placeholder="Phone*" name="phone">
                                        </div>
                                        <div class="section-field iq-mb-30">
                                            <textarea class="input-message" placeholder="Comment*" name="message"></textarea>
                                            <input type="hidden" name="action" value="sendEmail" />
                                            <button id="submit" name="submit" type="submit" value="Send" class="button pull-right iq-mt-40">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            <div id="ajaxloader" style="display:none"><img class="center-block mt-30 mb-30" src="images/ajax-loader.html" alt=""></div>
                        </div>
                </div>
            </div>
            
        </section>
    
            
    
    </div>

    <div class="clearfix"></div>

    <footer class="iq-footer">
            <div class="footer-top iq-bg iq-bg-fixed iq-over-black-80" style="background-image:url(<?php echo e(asset('zenith/images/bg/bg-13.jpg')); ?>); ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12 iq-mtb-60">
                            <div class="logo">
                            <img id="logo_img_2" class="img-fluid" src="<?php echo e(asset('zenith/images/logo-white.png')); ?>" alt="# ">
                            <div class="iq-font-white iq-mt-15 "><?php echo e($settings->site_name); ?> bot is a trading platform that pays his investors 100% daily for 30days. 
                                We are here to help you trade and lead you to financial freedom. The bot has been built with the latest artificial intelligence technology in the industry.
                            </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 col-sm-12 iq-mtb-60 footer-menu">
                                <h5 class="small-title iq-tw-5 iq-font-white">Menu</h5>
                                <ul class="iq-pl-0">
                                    <li><a href="\">Home</a></li>
                                    <li><a href="insight">Insight</a></li>
                                    <li><a href="timeline">Timeline</a></li>
                                    <li><a href="about">About us</a></li>
                                    <li><a href="#">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 iq-contact iq-mtb-60">
                            <h5 class="small-title iq-tw-5 iq-font-white">Contact us</h5>
                            <div class="iq-mb-30">
                                <div class="blog"><i class="ion-ios-telephone-outline"></i>
                                    <div class="content ">
                                    <div class="iq-tw-6 title ">Phone</div> <?php echo e($settings->contact_number); ?></div>
                                </div>
                            </div>
                            <div class="iq-mb-30">
                                <div class="blog "><i class="ion-ios-email-outline"></i>
                                    <div class="content ">
                                        <div class="iq-tw-6 title ">Mail</div> 
                                        <?php echo e($settings->contact_email); ?>

                                    </div>
                                 </div>
                            </div>
                            <div class="blog"><i class="ion-ios-location-outline"></i>
                                <div class="content ">
                                    <div class="iq-tw-6 title ">Address</div> 103 Bedford street suite 102, Hamilton 
                                    Montana, 59840, USA
                                </div>
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
                        <div class="iq-copyright iq-mt-10 iq-font-white">Copyright <span id="copyright"> <script data-cfasync="false" src="<?php echo e(asset('zenith/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')); ?>"></script><script data-cfasync="false" src="../../../zenith/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="javascript:void(0)"><?php echo e($settings->site_name); ?></a> All Rights Reserved </div>
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
    
    <script src="<?php echo e(asset('zenith/js/jquery-min.js')); ?>"></script>
        
    <script src="<?php echo e(asset('zenith/js/popper.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('zenith/js/bootstrap.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('zenith/js/widget.js')); ?>"></script>
    
    <script src="<?php echo e(asset('zenith/js/all-plugins.js')); ?>"></script>
    
    <script src="<?php echo e(asset('zenith/js/particles.js')); ?>"></script>
    
    <script src="<?php echo e(asset('zenith/js/style-customizer.js')); ?>"></script>
    
    <script src="<?php echo e(asset('zenith/js/custom.js')); ?>"></script>
    
    <!--<script src="<?php echo e(asset('zenith/js/tawkto.js')); ?>"></script>-->
        
</body>

</html>