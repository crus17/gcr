<?php
if (Auth::check() && Auth::user()->dashboard_style == "light") {
	$text = "dark";
	$bg = "light";
} else {
	$text = "light";
	$bg = "dark";
}
?>

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$settings->site_name}} | {{$title}}</title>
    <link rel="icon" href="{{ asset ('home/images/favicon.png')}}" type="image/png" sizes="32x32">

	<!-- Fonts and icons -->
	<script src="{{asset('dash/js/plugin/webfont/webfont.min.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{ asset('dash/js/plugin/sweetalert/sweetalert.min.js')}} "></script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="{{asset('dash/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('dash/css/fonts.min.css')}}">
	<link rel="stylesheet" href="{{asset('dash/css/atlantis.min.css')}}">
	<link rel="stylesheet" href="{{asset('dash/css/customs.css')}}">
	<link rel="stylesheet" href="{{asset('dash/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('dash/css/simple-notify.min.css')}}">

	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
</head>
<body data-background-color="dark">
    <div id="app">
         <!--PayPal-->
        <script>
        
            // Add your client ID and secret
            var PAYPAL_CLIENT = '{{$settings->pp_ci}}';
            var PAYPAL_SECRET = '{{$settings->pp_cs}}';
            
            // Point your server to the PayPal API
            var PAYPAL_ORDER_API = 'https://api.paypal.com/v2/checkout/orders/';
        
            </script>
            
            <script
            src="https://www.paypal.com/sdk/js?client-id={{$settings->pp_ci}}">
        </script>
        
        <!--/PayPal-->
            
        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
        // {{!! $settings->tawk_to !!}}
        
        </script>
        <!--End of Tawk.to Script-->
        <div class="wrapper">
			
				<script type="text/javascript">
					function googleTranslateElementInit() {
						new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
						// new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
					}
				</script>
				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

            @yield('content')
		<footer class="footer bg-{{$bg}} text-{{$text}}">
                    <div class="container-fluid">
                        <div class="row copyright text-center text-align-center">
                            <p>All Rights Reserved &copy; {{$settings->site_name}} <?php echo date("Y")?></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
	<script src="{{ asset('dash/js/core/jquery.3.2.1.min.js')}} "></script>
	<script src="{{ asset('dash/js/core/popper.min.js')}}"></script>
	<script src="{{ asset('dash/js/core/bootstrap.min.js')}} "></script>
	<script src="{{ asset('dash/js/customs.js')}}"></script>
	
	<!-- jQuery UI -->
	<script src="{{ asset('dash/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{ asset('dash/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('dash/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}} "></script>

	<!-- jQuery Sparkline -->
	<script src="{{ asset('dash/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}} "></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('dash/js/plugin/sweetalert/sweetalert.min.js')}} "></script>
	<!-- Bootstrap Notify -->
	<script src="{{ asset('dash/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}} "></script>
	
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('dash/js/atlantis.min.js')}}"></script>
	<script src="{{asset('dash/js/atlantis.js')}}"></script>

	<script src="{{asset('dash/js/simple-notify.min.js')}}"></script>

	<script type="text/javascript">
		var badWords = [ 
			'<!--Start of Tawk.to Script-->',
			'<script type="text/javascript">', 
			'<!--End of Tawk.to Script-->'
					];
		$(':input').on('blur', function(){
			var value = $(this).val();
			$.each(badWords, function(idx, word){
			value = value.replace(word, '');
			});
			$(this).val( value);
		});
	</script>
	 <script>
		$(document).ready( function () {
			$('#ShipTable').DataTable({
				order: [ [0, 'desc'] ],
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'print', 'excel','pdf'
        	]
			});

			
			$(".dataTables_length select").addClass("bg-{{$bg}} text-{{$text}}");
			$(".dataTables_filter input").addClass("bg-{{$bg}} text-{{$text}}");
		} );
	</script>
	<script>
		$(document).ready( function () {
			$('.UserTable').DataTable({
				order: [ [0, 'desc'] ]
			});
			$(".dataTables_length select").addClass("bg-{{$bg}} text-{{$text}}");
			$(".dataTables_filter input").addClass("bg-{{$bg}} text-{{$text}}");
		} );
	</script>
    
	
	 
</body>
</html>

