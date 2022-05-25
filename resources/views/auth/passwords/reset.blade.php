@include('home.assetss')

<body class="auth-page">
    <!-- ======= Reset Password ======= -->
    <div class="limiter">
        <div class="container-form user-auth">
            <div class="text-center">
                @if(Session::has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                @endif
    
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                @endif   
            </div>
                 
            <div class="section-form-box">
                <div>
					<h2 class="text-center mt-3">Create New Password</h2>
					
					<!-- Section Title Ends -->
					<!-- Form Starts -->
					 @if (session('status'))
					 <div class="alert-success">
                        <div class="alert">
                            {{ session('status') }}
                        </div>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('password.request') }}" class="form">
                        {{csrf_field()}} 
                        
                        <div class="form__group {{ $errors->has('email') ? ' has-error' : '' }} ">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label for="email" class="form__label">Email address</label>
                            <input type="hidden" name="token" value="{{ $token }}" class="form__input">
                            <input id="email" type="email" class="form__input {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="{{ $email or old('email') }}" style="background-color:#fff; color:#222;" placeholder="Enter your e-mail" required autofocus>
                        </div>
                        <div class="form__group {{ $errors->has('password') ? ' has-error' : '' }}">
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                            <label for="password" class="form__label">Password</label>
                            <input style="background-color:#fff; color:#222;"  class="form__input" id="password" name="password" id="password" placeholder="Enter Password" type="password" required>
                        </div>
        
                        <div class="form_group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                            <label for="password-confirm" class="form__label">Password Confirmation</label>
                            <input style="background-color:#fff; color:#222;"  class="form__input" name="password_confirmation" id="password_confirmation" placeholder="Enter Password" type="password" required>
                            
                        </div>
                        
                        <div class="form__group text-center">
                            <button type="submit" class="btn btn__login">Reset Password</button>
                        </div>
        
                        <div class="text-center">
                            <hr>
                            <small class=" text-center">&copy; Copyright  {{date('Y')}} &nbsp; {{$settings->site_name}} &nbsp; All Rights Reserved.</small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
