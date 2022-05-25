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
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/notify/simple-notify.min.css')); ?>">
    
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
        		<img src="<?php echo e(asset ('zenith/images/loader.gif')); ?>" alt="loder">
        	</div>
        </div>

    <!--<a href="http://free-website-translation.com/" id="ftwtranslation_button" hreflang="en" title="" style="border:0;"><img src="http://free-website-translation.com/img/fwt_button_en.gif" id="ftwtranslation_image" alt="FWT Homepage Translator" style="border:0;"/></a> -->
    <!--<script type="text/javascript" src="http://free-website-translation.com/scripts/fwt.js" /></script>-->
    
        <header class="transparent">
            <div class="topbar">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="topbar-left">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="fa fa-envelope-o text-blue"></i>
                                        <?php echo e($settings->contact_email); ?>

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
                                <a href="#"><img id="logo_img" id="logo_img" class="img-fluid" src="<?php echo e(asset ('zenith/images/logo-white.png')); ?>" alt="logo"></a>
                            </div>
                            <nav> <a id="resp-menu" class="responsive-menu" href="javascript:void(0)"><i class="fa fa-reorder"></i> Menu</a>
                                <ul class="menu text-right">
                                    <li><a class="active" href="#">HOME</a></li>
                                        <li><a href="insight">Insight</a></li>
                                        <li><a href="timeline">Timeline</a></li>
                                        <li><a href="pricing">Packages</a></li>
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
    
    
        <div class="iq-bg banner-stars">
            <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="coinexfly" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <div id="rev_slider_2_1" class="rev_slider fullwidthabanner tp-overflow-hidden" style="display:none;" data-version="5.4.6.3">
                    <ul>
                        <li data-index="rs-5" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default" data-thumb="<?php echo e(asset('zenith/revslider/assets/100x50_b78ec-04.jpg')); ?>" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    
                            <img src="<?php echo e(asset ('zenith/revslider/assets/b78ec-04.jpg')); ?>" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    
                            <div class="tp-caption   tp-resizeme rs-parallaxlevel-3" id="slide-5-layer-3" data-x="right" data-hoffset="106" data-y="bottom" data-voffset="196" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":500,"speed":1000,"frame":"0","from":"x:[100%];y:bottom;opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="<?php echo e(asset ('zenith/revslider/assets/04c8d-05.png')); ?>" alt="" data-ww="206px" data-hh="370px" data-no-retina> </div>
                    
                            <div class="tp-caption   tp-resizeme rs-parallaxlevel-10" id="slide-5-layer-2" data-x="370" data-y="40" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":2500,"speed":1000,"frame":"0","from":"x:[175%];y:top;z:{-20,20};opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;"><img src="<?php echo e(asset('zenith/revslider/assets/0dd17-06.png')); ?>" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                    
                            <div class="tp-caption   tp-resizeme rs-parallaxlevel-5" id="slide-5-layer-9" data-x="-77" data-y="389" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":2810,"speed":1000,"frame":"0","from":"x:[175%];y:[-175%];opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7;"><img src="<?php echo e(asset('zenith/revslider/assets/0dd17-06.png')); ?>" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                    
                            <div class="tp-caption   tp-resizeme rs-parallaxlevel-8" id="slide-5-layer-10" data-x="right" data-hoffset="-100" data-y="center" data-voffset="105" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":3160,"speed":1000,"frame":"0","from":"x:[175%];y:[-175%];opacity:{0,1};","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8;"><img src="<?php echo e(asset('zenith/revslider/assets/0dd17-06.png')); ?>" alt="" data-ww="auto" data-hh="auto" data-no-retina> </div>
                    
                            <div class="tp-caption   tp-resizeme" id="slide-5-layer-4" data-x="30" data-y="272" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; white-space: nowrap; font-size: 58px; line-height: 58px; font-weight: 400; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;">Go next Level with </div>
                    
                            <div class="tp-caption   tp-resizeme" id="slide-5-layer-5" data-x="30" data-y="343" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 10; white-space: nowrap; font-size: 68px; line-height: 80px; font-weight: 600; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;"><span class="iq-font-yellow"><?php echo e($settings->site_name); ?>.</span></div>
                    
                            <div class="tp-caption   tp-resizeme" id="slide-5-layer-6" data-x="30" data-y="432" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 11; white-space: nowrap; font-size: 14px; line-height: 26px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Raleway;">
                                <?php echo e($settings->site_name); ?> bot is a trading platform that pays his investors 100% daily for 30days.&nbsp;<br>There are different investment options for our investors which carry different bonus offers after one investment circle.<br>We are here to help you trade and lead you to financial freedom.
                            </div>
                    
                            <a href="login/" class="tp-caption rev-btn button" id="slide-5-layer-7" data-x="30" data-y="540" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":""}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[1,1,1,1]" data-paddingright="[30,30,30,30]" data-paddingbottom="[1,1,1,1]" data-paddingleft="[30,30,30,30]" style="">Start Investing</a>
                        </li>
                    
                        <li data-index="rs-8" data-transition="random-static,random-premium,random" data-slotamount="default,default,default,default" data-hideafterloop="0" data-hideslideonmobile="off" data-randomtransition="on" data-easein="default,default,default,default" data-easeout="default,default,default,default" data-masterspeed="600,default,default,default" data-thumb="" data-rotate="0,0,0,0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    
                    <img src="<?php echo e(asset('zenith/revslider/assets/transparent.png')); ?>" data-bgcolor='#000000' style='background:#000000' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="off" class="rev-slidebg" data-no-retina>
                    
                    
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-11" data-x="30" data-y="340" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":660,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="<?php echo e(asset('zenith/revslider/assets/607ef-12.png')); ?>" alt="" data-ww="146px" data-hh="180px" data-no-retina> </div>
                    
                        <div class="tp-caption   tp-resizeme rs-parallaxlevel-2" id="slide-8-layer-12" data-x="-170" data-y="180" data-voffset="" data-width="['none','none','none','none']" data-height="['none','none','none','none']" data-type="image" data-responsive_offset="on" data-frames='[{"delay":1170,"speed":1000,"frame":"0","from":"z:0;rX:0;rY:0;rZ:0;sX:0.8;sY:0.8;skX:0;skY:0;opacity:0;","to":"o:1;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6;">
                            <div class="rs-looped rs-rotate" data-easing="Linear.easeNone" data-startdeg="90" data-enddeg="-90" data-speed="50" data-origin="50% 50%"><img src="<?php echo e(asset('zenith/revslider/assets/57b4d-13.png')); ?>" alt="" data-ww="525px" data-hh="504px" data-no-retina> </div>
                        </div>
                    
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-4" data-x="right" data-hoffset="28" data-y="center" data-voffset="-80" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 58px; line-height: 58px; font-weight: 400; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;">your Best Platform! </div>
                    
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-5" data-x="right" data-hoffset="28" data-y="center" data-voffset="-10" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 8; white-space: nowrap; font-size: 65px; line-height: 70px; font-weight: 700; color: #ffffff; letter-spacing: 0px; font-family: 'Ubuntu', sans-serif; text-transform:uppercase;"><span class="iq-font-yellow">Easy and secure.</span></div>
                    
                        <div class="tp-caption   tp-resizeme" id="slide-8-layer-6" data-x="right" data-hoffset="30" data-y="center" data-voffset="60" data-width="['auto']" data-height="['auto']" data-type="text" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"}]' data-textAlign="['right','right','right','right']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 9; white-space: nowrap; font-size: 14px; line-height: 26px; font-weight: 400; color: #ffffff; letter-spacing: 0px;font-family:Raleway;">If you have been looking for a trusted platform to invest and make good returns, <?php echo e($settings->site_name); ?> is here.
                        <br> We are here to help you trade and lead you to financial freedom. </div>
                    
                        <a href="login/" class="tp-caption rev-btn button" id="slide-8-layer-7" data-x="right" data-hoffset="30" data-y="center" data-voffset="135" data-width="['auto']" data-height="['auto']" data-type="button" data-responsive_offset="on" data-frames='[{"delay":1500,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power4.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":""}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[1,1,1,1]" data-paddingright="[35,35,35,35]" data-paddingbottom="[1,1,1,1]" data-paddingleft="[35,35,35,35]" style="">Start Investing</a>
                        </li>
                    </ul>
                    <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
                </div>
            </div>
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
        </div>
    
    
        <div class="topbar-chart iq-chart">
            <div class="container-fluid">
                <div class="row">
                <script data-cfasync="false" src="<?php echo e(asset('zenith/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')); ?>"></script><script data-cfasync="false" src="<?php echo e(asset('zenith/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')); ?>"></script> 
                    <script>
                        baseUrl = "https://widgets.cryptocompare.com/";
                        var scripts = document.getElementsByTagName("script");
                        var embedder = scripts[scripts.length - 1];
                        var cccTheme = { "General": { "enableMarquee": true } };
                        (function() {
                            var appName = encodeURIComponent(window.location.hostname);
                            if (appName == "") { appName = "local"; }
                            var s = document.createElement("script");
                            s.type = "text/javascript";
                            s.async = true;
                            var theUrl = baseUrl + 'serve/v3/coin/header?fsyms=BTC,ETH,XMR,LTC,DASH&tsyms=BTC,USD,CNY,EUR';
                            s.src = theUrl + (theUrl.indexOf("?") >= 0 ? "&" : "?") + "app=" + appName;
                            embedder.parentNode.appendChild(s);
                        })();
                    </script>
                </div>
            </div>
        </div>
    
    
        <div class="main-content">
        
            <section class="overview-block-ptb easy-step">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="heading-title">
                                <h3 class="title iq-tw-5 iq-mb-25">3 Easy Steps to Get Started</h3>
                                <p>Here are 3 Easy Steps to start Investing. We have design a very user friendly bot to get you investing and making some good returns for yourself. Read through the lines below. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 iq-mt-20">
                            <div class="iq-features1">
                                <div class="iq-bg" style="background-image: url(<?php echo e(asset('zenith/images/feature/01.jpg')); ?>);"></div>
                                <div class="iq-blog">
                                    <div class="step">1</div>
                                    <div class="icon"><i aria-hidden="true" class="ion-ios-compose-outline"></i></div>
                                    <h4 class="iq-tw-5 iq-mt-20"><a href="javascript:void(0)">Fill Up Your Form</a></h4>
                                    <p><br>The first step is to signup and create a quick account within minutes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 iq-mt-20">
                            <div class="iq-features1">
                                <div class="iq-bg" style="background-image: url(<?php echo e(asset('zenith/images/feature/01.jpg')); ?>);"></div>
                                <div class="iq-blog">
                                    <div class="step">2</div>
                                    <div class="icon"><i aria-hidden="true" class="ion-ios-paper-outline"></i></div>
                                    <h4 class="iq-tw-5 iq-mt-20"><a href="javascript:void(0)">Create Investment</a></h4>
                                    <p>Once you have created an account, simple initiate an investment to continue. This is a quick process.</p>
                                
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 iq-mt-20">
                            <div class="iq-features1">
                                <div class="iq-bg" style="background-image: url(<?php echo e(asset('zenith/images/feature/01.jpg')); ?>);"></div>
                                <div class="iq-blog">
                                    <div class="step">3</div>
                                    <div class="icon"><i aria-hidden="true" class="ion-ios-briefcase-outline"></i></div>
                                    <h4 class="iq-tw-5 iq-mt-20"><a href="javascript:void(0)">Make Profits</a></h4>
                                    <p>As soon as you register and create your investment account and fund it. Login and watch  your investments grow.</p>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="overview-block-ptb iq-bg iq-over-black-80 jarallax iq-about-us" style="background-image: url( <?php echo e(asset('zenith/images/bg/bg-13.jpg')); ?> ); background-position: left center;">
                <div class="container">
                    <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h2 class="iq-font-white iq-tw-6">Everything <br>
                            <span class="iq-font-yellow">You Need To Know!</span>
                        </h2>
                        <p class="iq-font-white iq-mt-20"><?php echo e($settings->site_name); ?> is a trading platform that pays it's Investors 100% roi daily.&nbsp;<br>
                            We are here to help you trade and lead you to financial freedom. The bot has been built with the latest artificial intelligence technology in the industry. Our servers are also hosted in a highly secured environment.
                        </p>
                        <p class="iq-font-white iq-mt-20">There are different investment options for our investors which carry different bonus offers after one investment circle.</p>
                        <p></p>
                        <p></p>
                        <p></p>
                    
                    </div>
                        <div class="col-lg-4 col-md-12 iq-about1">
                            <div class="calculator white-bg iq-pall-30">
                                <h3 class="iq-tw-5 iq-font-yellow">Currency</h3>
                                <h5 class="iq-tw-5">Calculator</h5>
                                <p>We provide you a free cryptocurrency converter to help you easily estimate your earnings.</p>
                                <script src="https://www.cryptonator.com/ui/js/widget/calc_widget.js"></script>
                                <a href="login/" class="button dark iq-mt-10">Start Investing</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        
            <section class="overview-block-ptb iq-feature-aria">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="heading-title">
                                <h3 class="title iq-tw-5 iq-mb-25"><?php echo e($settings->site_name); ?> Features</h3>
                                <p>Our platform has been designed with our investors in mind. Check out some of the features that are designed with you in mind</p>
                            </div>
                        </div>
                    </div>
                    <div class="row pos-r h-100">
                        <div class="col-lg-4 col-md-12 text-right">
                            <div class="iq-feature2 iq-mtb-20 first-l">
                            <h4 class="iq-font-yellow iq-tw-5"><a href="services-details.html"> Fast Transaction</a><span class="iq-icon iq-ml-10"><img class="img-fluid" src="<?php echo e(asset('zenith/images/services/icon/01.png')); ?>" alt=""></span>
                            </h4>
                            <p>Our Bot run on a very fast server and all transactions are processed as fast as you can imagine</p>
                            </div>
                            <div class="iq-feature2 iq-mtb-20 second-l">
                                <h4 class="iq-font-yellow iq-tw-5"><a href="services-details.html">Secure and Stable
                                </a> <span class="iq-icon iq-ml-10"><img class="img-fluid" src="<?php echo e(asset('zenith/images/services/icon/02.png')); ?>" alt=""></span>
                                </h4>
                                <p>Our system run on top servers with word class security. This way, all transactions are secured</p>
                                </div>
                            <div class="iq-feature2 iq-mtb-20 first-l">
                                <h4 class="iq-font-yellow iq-tw-5"><a href="services-details.html">Coin Exchange</a> <span class="iq-icon iq-ml-10"><img class="img-fluid" src="<?php echo e(asset('zenith/images/services/icon/03.png')); ?>" alt=""></span>
                                </h4>
                                <p>Let your coin work for you by being part of our platform. The end result is wealth, even more wealth.</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 align-self-center text-center">
                            <img class="img-fluid" src="<?php echo e(asset('zenith/images/feature/features-img1.png')); ?>" alt="">
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="iq-feature2 iq-mtb-20 first-r">
                                <h4 class="iq-font-yellow iq-tw-5"><span class="iq-icon iq-mr-10"><img class="img-fluid" src="<?php echo e(asset('zenith/images/services/icon/04.png')); ?>" alt=""></span><a href="services-details.html">Cross Platform</a>
                                </h4>
                                <p>You do not need to have complex computer to be part of our bot. Once you have an internet enabled device, you are good <a href="javascript:void(0)" class="iq-font-green">[ ... ]</a></p>
                            </div>
                            <div class="iq-feature2 iq-mtb-20 second-r">
                                <h4 class="iq-font-yellow iq-tw-5"><span class="iq-icon iq-mr-10"><img class="img-fluid" src="<?php echo e(asset('zenith/images/services/icon/05.png')); ?>" alt=""></span><a href="services-details.html">24/7 Trading</a>
                                </h4>
                                <p>Our bot is on and running all round the clock. Our mission is to create wealth. </p>
                            </div>
                            <div class="iq-feature2 iq-mtb-20 first-r">
                                <h4 class="iq-font-yellow iq-tw-5"><span class="iq-icon iq-mr-10"><img class="img-fluid" src="<?php echo e(asset('zenith/images/services/icon/06.png')); ?>" alt=""></span><a href="services-details.html">Free Consulting</a>
                                </h4>
                                <p>We have a customer care unit that will be there for you at all time.</p>
                            </div>
                        </div>
                        <div class="particles text-center"><img class="img-fluid" src="<?php echo e(asset('zenith/images/particles.png')); ?>" alt=""></div>
                    </div>
                </div>
            </section>
        
        
            <section class="overview-block-ptb dark-bg coinex-charts">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-12">
                            <div class="heading-left">
                                <h3 class="title iq-font-yellow iq-tw-5 iq-mb-10">Recent Market</h3>
                            </div>
                            <p>Bitcoin is one of the most important inventions in all of human history. For the first time ever, anyone can send or receive any amount of money with anyone else, anywhere on the planet, conveniently and without restriction. It's the dawn of a better, more free world. — Roger Ver</p>
                            <p>What Happened to Bitcoin?</p><p>The Bitcoin Core (BTC) network is in trouble due to high fees and slow transaction times. Bitcoin Cash (BCH) is the upgrade that solves these problems.</p>
                        
                        </div>
                        <div class="col-lg-6 col-md-12 chart-img">
                            <div id="text-4" class="widget widget_text">			
                                    <div class="btcwdgt-chart" bw-theme="light">
                                    	<script>
                        					 (function(b,i,t,C,O,I,N) {
                        						  window.addEventListener('load',function() {
                        						  if(b.getElementById(C))return;
                        						  I=b.createElement(i),N=b.getElementsByTagName(i)[0];
                        						  I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
                        						},false)
                        					  })(document,'script',"<?php echo e(asset('zenith/js/widget.js')); ?>",'btcwdgt');
                        				</script>
                                    </div>
                        		</div>
                        </div>
                    </div>
                </div>
            </section>
        
        
            <section class="overview-block-pt iq-why-us">
                <div class="container">
                    <div class="row flex-row-reverse">
                        <div class="col-lg-6 col-md-12 ">
                            <div class="heading-left">
                                <h3 class="title iq-tw-5">Why Choose Us</h3>
                                <p>Within the cryptocurrency trading ecosystem, our duty is to make you a player. We achieve this in several ways as listed below.</p>
                            </div>
                            <div class="iq-feature3 iq-mt-60">
                                <div class="iq-icon yellow-bg">
                                <i aria-hidden="true" class="ion-android-globe"></i>
                                </div>
                                <div class="fancy-content">
                                    <h5 class="iq-tw-5">Automated trading bots in the cloud</h5>
                                    <p>No software installation required. Bots run on our servers..</p>
                                </div>
                            </div>
                            <div class="iq-feature3 iq-mtb-40">
                                <div class="iq-icon yellow-bg">
                                    <i aria-hidden="true" class="ion-social-buffer-outline"></i>
                                </div>
                                <div class="fancy-content">
                                    <h5 class="iq-tw-5">Support for all major Bitcoin exchanges</h5>
                                    <p>All major crypto-currency exchanges are supported for both backtesting and live trading.</p>
                                </div>
                            </div>
                            <div class="iq-feature3 iq-mb-80">
                                <div class="iq-icon yellow-bg">
                                    <i aria-hidden="true" class="ion-android-share-alt"></i>
                                </div>
                                <div class="fancy-content">
                                    <h5 class="iq-tw-5">Instant Email alerts & SMS notifications</h5>
                                    <p>We keep you informed on all the activities running on your account through SMS and EMail notifications.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 iq-bg">
                            <img src="<?php echo e(asset('zenith/images/about-us/about-img2.png')); ?>" class="img-fluid" alt="#">
                            <div class="iq-coin scrollme">
                                <span class="coin-01 animateme" data-when="span" data-from="0.9" data-to="0.1" data-translatex="0" data-translatey="-200" data-rotatez="180">
                                    <img src="<?php echo e(asset('zenith/images/coin/01.png')); ?>" class="img-fluid" alt="#">
                                </span>
                                <span class="coin-02 animateme" data-when="span" data-from="0.9" data-to="0.1" data-translatex="0" data-translatey="-250" data-rotatey="180">
                                    <img src="<?php echo e(asset('zenith/images/coin/02.png')); ?>" class="img-fluid" alt="#">
                                </span>
                                <span class="coin-03 animateme" data-when="span" data-from="0.9" data-to="0.1" data-translatex="50" data-translatey="-100">
                                    <img src="<?php echo e(asset('zenith/images/coin/03.png')); ?>" class="img-fluid" alt="#">
                                </span>
                                <span class="coin-04 animateme" data-when="span" data-from="0.9" data-to="0.1" data-translatex="0" data-translatey="-300" data-rotatez="180">
                                    <img src="<?php echo e(asset('zenith/images/coin/04.png')); ?>" class="img-fluid" alt="#">
                                </span>
                                <span class="coin-05 animateme" data-when="span" data-from="0.9" data-to="0.1" data-translatex="0" data-translatey="-100" data-rotatez="180">
                                    <img src="<?php echo e(asset('zenith/images/coin/05.png')); ?>" class="img-fluid" alt="#">
                                </span>
                                <span class="coin-06 animateme" data-when="span" data-from="0.9" data-to="0.1" data-translatex="0" data-translatey="-100" data-rotatez="180">
                                    <img src="<?php echo e(asset('zenith/images/coin/06.png')); ?>" class="img-fluid" alt="#">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        
        
            <section class="overview-block-ptb8 iq-bg iq-over-black-80 jarallax" style="background-image: url(<?php echo e(asset('zenith/images/bg/bg-7.jpg')); ?>); background-position: center center;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-8 text-center iq-need-help">
                            <img src="<?php echo e(asset('zenith/images/need-help.png')); ?>" alt="">
                            <h3 class="iq-font-yellow iq-tw-5 iq-mt-20">Any Query? Contact Us</h3>
                            <ul class="list-inline iq-mt-40">
                                <li class="list-inline-item iq-font-yellow">
                                    <?php echo e($settings->contact_email); ?>

                                </li>
                            </ul>
                            <div class="iq-font-white iq-mt-10">For your questions and data verification and confirmation of transactions do not hesitate to contact our support team.</div>
                        </div>
                    </div>
                </div>
            </section>
        
        
            <div class="iq-news overview-block-ptb">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="heading-title">
                                <h3 class="title iq-tw-5 iq-mb-25">What You Get</h3>
                                <p>We tend to put our investors first, to this, we have developed strategies to ensure you have maximum returns. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <div class="iq-news-box">
                                <div class="iq-news-image clearfix">
                                    <img class="img-fluid" src="<?php echo e(asset('zenith/images/blog/img1.jpg')); ?>" alt="#">
                                    <div class="news-date">Profit</div>
                                </div>
                                <div class="iq-news-detail iq-pall-20 dark-bg">
                                    <div class="news-title"> <a href="javascript:void(0)"><h5 class="iq-tw-5">Maximum profit Assured</h5> </a> </div>
                                    <div class="news-content">
                                        <p>At an interest rate of 100% daily for 30days, you are guaranteed to go home with the maximum possible profit.</p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="iq-news-box">
                                <div class="iq-news-image clearfix">
                                    <img class="img-fluid" src="<?php echo e(asset('zenith/images/blog/img2.jpg')); ?>" alt="#">
                                    <div class="news-date">Coin</div>
                                </div>
                                <div class="iq-news-detail iq-pall-20 dark-bg">
                                <div class="news-title"> <a href="javascript:void(0)"><h5 class="iq-tw-5">Single Coin Options</h5> </a> </div>
                                    <div class="news-content">
                                        <p>We provide a platform that provides you the flexibility of investing on the coin of your choice.</p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="iq-news-box">
                                <div class="iq-news-image clearfix">
                                    <img class="img-fluid" src="<?php echo e(asset('zenith/images/blog/img3.jpg')); ?>" alt="#">
                                    <div class="news-date">Withdrawal</div>
                                </div>
                                <div class="iq-news-detail iq-pall-20 dark-bg">
                                    <div class="news-title"> <a href="javascript:void(0)"><h5 class="iq-tw-5">Steady Withdrawal</h5> </a> </div>
                                    <div class="news-content">
                                        <p>Trade confidently, withdraw and make deposits at any time. Withdrawals are never delayed</p>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
            <section class="overview-block-ptb iq-bg iq-over-black-80 jarallax iq-we-happy" style="background-image: url(<?php echo e(asset('zenith/images/bg/bg-5.jpg')); ?>); background-position: center center;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <h2 class="iq-font-white iq-tw-5">Check out  <span class="iq-font-yellow">Our</span> Referral System:</h2>
                            <ul class="listing-hand iq-mt-30 iq-tw-5 iq-font-white">
                                <li class="iq-mt-20">You get 10% from any deposit made by your direct referral.</li>
                                <li class="iq-mt-20">You get 5% from any deposit made by your second level referrals.</li>
                                <li class="iq-mt-20">You get 2% from any deposit made by your third level referrals</li>
                                <li class="iq-mt-20">You get 1% from any deposit made by your fourth level referrals</li>
                                <li class="iq-mt-20">You can withdraw your referral bonus as soon as it gets to the minimum</li>
                            </ul>
                        </div>
                        <div class="col-lg-6 col-md-12 counter-blog">
                            <div class="heading-left iq-font-white">
                                <h3 class="title iq-tw-5 iq-mb-25 iq-font-white">We're Fulfilled</h3>
                                <p>Here at <?php echo e($settings->site_name); ?> we are committed to becoming the biggest player in the industry. This we have achieved in so many ways.</p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                    <div class="counter"><i class="ion-ios-monitor-outline iq-font-yellow" aria-hidden="true"></i>
                                        <div class="right text-left">
                                            <span class="timer iq-font-white" data-to="5" data-speed="1000">5</span>
                                            <label class="iq-font-white">Servers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                    <div class="counter"> <i class="ion-ios-paper-outline iq-font-yellow" aria-hidden="true"></i>
                                        <div class="right text-left">
                                            <span class="timer iq-font-white" data-to="25" data-speed="1000">25</span>
                                            <label class="iq-font-white">AWARDS</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
                                    <div class="counter"> <i class="ion-ios-person-outline iq-font-yellow" aria-hidden="true"></i>
                                        <div class="right text-left">
                                            <span class="timer iq-font-white" data-to="3120" data-speed="10000">3120</span>
                                            <label class="iq-font-white">CLIENTS</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-3 col-6 iq-mt-50">
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
                </div>
            </section>

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
                }
                
                .table-responsive:hover{border-color:red;}

                table{width:100%;}
                td{padding:24px; background:#eee;}
    				
                @media    only screen and (max-width: 600px) {
                        
                    .table-style{
                            margin-top: 54px;
                            margin-left: 14px;
                            margin-right: 24px;
                            margin-block: 55px;
                            border-block: 1px solid #000;
                            overflow-y: auto;
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
    			
            <section>
                <div class="section-full  p-t80 p-b80 bg-gray">
                    <div class="container">

                        <div class="section-head text-center">
                            <span class="wt-title-subline font-16 text-gray-dark m-b15"></span>
                            <p></p>
                            <h2 class="text-uppercase">Latest Withdrawals</h2>
                            <div class="wt-separator-outer">
                            <div class="wt-separator bg-primary"></div>
                            </div>
                        </div>
                    
                        <div class="table-style" style="overflow-x:auto;">
                            
                            <marquee direction="down" behavior="scroll" style="height:400px; width:99%;  ">
                                <table class="table"  >
                                    <tbody>
                                        <tr>
                                            <td class="text-center">Status</td>
                                            <td class="text-center">Amount(USD)</td>
                                            <td class="text-center">Wallet</td>
                                        </tr>
                                        <?php $__currentLoopData = $dumb_transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <?php if($transaction->status == 'Confirmed'): ?>
                                            <td class="text-center"><button class="btn btn-info btn-sm button1"><span class="btn-label"><i class="fa fa-check"></i></span><?php echo e($transaction->status); ?></button></td>
                                            <?php else: ?>
                                            <td class="text-center"><button class="btn btn-info btn-sm button2"><span class="btn-label"><i class="fa fa-warning"></i></span><?php echo e($transaction->status); ?></button></td>
                                            <?php endif; ?>
                                            <td class="text-center">$<?php echo e($transaction->amount); ?></td>
                                            <td class="text-center"> <?php echo e($transaction->btc_address); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </marquee>
                        </div>
                    </div>
                </div>
            </section>
        
        
        <div class="iq-our-clients particles-bg white-bg iq-ptb-40">
            <canvas id="canvas"></canvas>
                <div class="container ">
                    <div class="row ">
                        <div class="col-lg-12 col-md-12 ">
                            <div class="owl-carousel" data-autoplay="true" data-loop="true" data-nav="false" data-dots="false" data-items="5" data-items-laptop="4" data-items-tab="3" data-items-mobile="2" data-items-mobile-sm="1" data-margin="30">
                                <div class="item"> <a href="#"><img class="img-fluid" src="<?php echo e(asset('zenith/images/clients/white/logo2.png')); ?>" alt="#"></a></div>
                                <div class="item"> <a href="#"><img class="img-fluid" src="<?php echo e(asset('zenith/images/clients/white/logo3.png')); ?>" alt="#"></a></div>
                                <div class="item"> <a href="#"><img class="img-fluid" src="<?php echo e(asset('zenith/images/clients/white/logo6.jpg')); ?>" alt="#"></a></div>
                                <div class="item"> <a href="#"><img class="img-fluid" src="<?php echo e(asset('zenith/images/clients/white/logo2.png')); ?>" alt="#"></a></div>
                                <div class="item"> <a href="#"><img class="img-fluid" src="<?php echo e(asset('zenith/images/clients/white/logo3.png')); ?>" alt="#"></a></div>
                                <div class="item"> <a href="#"><img class="img-fluid" src="<?php echo e(asset('zenith/images/clients/white/logo6.jpg')); ?>" alt="#"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
    
    
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
                                    <li><a href="#">Home</a></li>
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
                                    <div class="iq-tw-6 title ">Phone</div><?php echo e($settings->contact_number); ?></div>
                                </div>
                            </div>
                            <div class="iq-mb-30">
                                <div class="blog "><i class="ion-ios-email-outline"></i>
                                    <div class="content ">
                                        <div class="iq-tw-6 title ">Mail</div> 
                                        <?php echo e($settings->contact_email); ?>

                                        <!--<a href="<?php echo e(asset('zenith/cdn-cgi/l/email-protection')); ?>" class="__cf_email__" data-cfemail="9efffaf3f7f0defcf7eafdf1f7f0fbe6eefbeceaf2eafab0fdf1f3">[email&#160;protected]</a>-->
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
        
        <script src="<?php echo e(asset('zenith/revslider/js/jquery.themepunch.tools.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/jquery.themepunch.revolution.min.js')); ?>"></script>
        
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.actions.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.kenburn.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.layeranimation.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.migration.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.navigation.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.parallax.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.slideanims.min.js')); ?>"></script>
        <script src="<?php echo e(asset('zenith/revslider/js/extensions/revolution.extension.video.min.js')); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset ('zenith/notify/simple-notify.min.js')); ?>">
        
    
        <script src="<?php echo e(asset('zenith/js/custom.js')); ?>"></script>
        <script>
            var revapi2,
                tpj = jQuery;
            tpj(document).ready(function() {
                if (tpj("#rev_slider_2_1").revolution == undefined) {
                    revslider_showDoubleJqueryError("#rev_slider_2_1");
                } else {
                    revapi2 = tpj("#rev_slider_2_1").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "//localhost/revslider-standalone/revslider/public/assets/js/",
                        sliderLayout: "fullwidth",
                        dottedOverlay: "none",
                        delay: 9000,
                        navigation: {
                            keyboardNavigation: "off",
                            keyboard_direction: "horizontal",
                            mouseScrollNavigation: "off",
                            mouseScrollReverse: "default",
                            onHoverStop: "off",
                            arrows: {
                                style: "persephone",
                                enable: true,
                                hide_onmobile: false,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                                    h_align: "left",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                },
                                right: {
                                    h_align: "right",
                                    v_align: "center",
                                    h_offset: 20,
                                    v_offset: 0
                                }
                            }
                        },
                        visibilityLevels: [1240, 1024, 778, 480],
                        gridwidth: 1170,
                        gridheight: 790,
                        lazyType: "none",
                        parallax: {
                            type: "mouse",
                            origo: "enterpoint",
                            speed: 400,
                            speedbg: 0,
                            speedls: 0,
                            levels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 47, 48, 49, 50, 51, 55],
                        },
                        shadow: 0,
                        spinner: "spinner0",
                        stopLoop: "off",
                        stopAfterLoops: -1,
                        stopAtSlide: -1,
                        shuffle: "off",
                        autoHeight: "off",
                        disableProgressBar: "on",
                        hideThumbsOnMobile: "off",
                        hideSliderAtLimit: 0,
                        hideCaptionAtLimit: 0,
                        hideAllCaptionAtLilmit: 0,
                        debugMode: false,
                        fallbacks: {
                            simplifyAll: "off",
                            nextSlideOnWindowFocus: "off",
                            disableFocusListener: false,
                        }
                    });
                }
            }); /*ready*/
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
</div>
    
        
    </body>

    <div id="capitol-callback">
        <div class="cpt-circle"></div>
        <div class="cpt-circle-fill"></div>
        <a href="https://api.whatsapp.com/send?phone=+12064269848&text=<?php echo e($settings->site_name); ?>" id="WhatsAppBtnDesktop" target="_blank" class="main-button" lang="en">
            <img src="https://nhtagent.com/nht-upload/assets/javascripts/WhatsApp/WhatsApp.png" width="100%">
        </a>
    </div>
    <script src="//code.tidio.co/ktekcgr1gatrbal5adto7szp8andzct4.js" async></script>
    

</html>