
	@include('home/assetss')

<body class="auth-page" >
	
    <!-- Wrapper Starts -->
    <div class="limiter">
        <div class="container-form user-auth">
				
				
				@if(Session::has('message'))
		        <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-warning"></i> {{ Session::get('message') }}
                        </div>
                    </div>
                </div>
                @endif
				
				<div class="section-form-box">
					<div>
                        <div>
                            <a href="{{url('/')}}">
                              <span style="color:#04b9f4;font-size:30px;" class="w3-hide-large"><img src="{{ asset ('home/images/logo-dark.png')}}" width="320"></span>
                            </a>
                        </div>
						<!-- Section Title Starts -->
					    <h3 class="mb-3 mt-2">Password reset</h3>
					
						<!-- Section Title Ends -->
						<!-- Form Starts -->
						 @if (session('status'))
						 
        				<div class="alert-success">
                            <div class="alert">
                                {{ session('status') }}
                            </div>
                        </div>
                        @endif

                    <form method="POST" action="{{ route('password.email') }}" class="form">
                        {{ csrf_field() }}
                         <div class="form__group">
                             @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <input  class="form__input" name="email" id="email" placeholder="Enter your email" name="email" type="email" value="{{ old('email') }}" required>
                            <label for="email" class="form__label">enter email</label>
                           
                        </div>

                        <div class="form__group text-center">
                            <button type="submit" class="btn btn__login mb-4">
                                Send Password Reset Link
                            </button>
                        </div>
                        
                        <div class="text-center mb-3">
                                <small class=" text-center mb-2"> <a href="{{route('login')}}">Repeat Login.</a> </small>
                            </div>
                    </form>
						<!-- Form Ends -->
                    </div>
                    <div class="form__footer text-center">
                        <p class="mt-2">  &copy; Copyright  {{date('Y')}} &nbsp; {{$settings->site_name}} &nbsp; All Rights Reserved.</p>
                    </div>
				</div>
				
		</div>
    </div>
    <!-- Wrapper Ends -->
</body>

</html>

