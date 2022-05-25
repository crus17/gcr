<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($settings->site_name); ?> | <?php echo e($settings->site_title); ?></title>
    <link rel="icon" href="<?php echo e(asset ('home/images/favicon.png')); ?>" type="image/png" sizes="32x32">



   <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="<?php echo e(asset ('home/lib/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Libraries CSS Files -->
        <link href="<?php echo e(asset ('home/lib/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/animate/animate.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/ionicons/css/ionicons.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/owl.carousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/icofont/icofont.min.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/jquery/magnific-popup.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/aos/aos.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/venobox/venobox.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset ('home/lib/icofont/icofont.min.css')); ?>" rel="stylesheet"> 

        <link href="<?php echo e(asset('home/css/frontend_style_blue.css')); ?>" rel="stylesheet">
        
        <!-- JavaScript Libraries -->
        
        <script src="<?php echo e(asset('home/lib/jquery/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/jquery.easing/jquery.easing.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/php-email-form/validate.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/waypoints/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/counterup/counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/isotope-layout/isotope.pkgd.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/venobox/venobox.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/owl.carousel/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('home/lib/aos/aos.js')); ?>"></script>

        <!-- Template Main Javascript File -->
        <script src="<?php echo e(asset('home/js/main.js')); ?>"></script>
        
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            {<?php echo $settings->tawk_to; ?>}
        </script>

</head>