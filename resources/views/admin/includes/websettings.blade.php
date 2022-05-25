<form method="post" action="{{action('Admin\SettingsController@updatepreference')}}" enctype="multipart/form-data">
    <div class="form-group">
        <h5 class="text-{{$text}}">Contact Email</h5>
        <input type="text" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" name="contact_email" value="{{$settings->contact_email}}" required>
    </div>

    <input name="s_currency" value="{{ $settings->s_currency }}" id="s_c" type="hidden">
    <div class="form-group">
        <h5 class="text-{{$text}}">Website Currency</h5>
		<select name="currency" id="select_c" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" onchange="s_f()">
            <option value="<?php echo htmlentities($settings->currency); ?>">{{ $settings->currency }}</option>
            @foreach($currencies as $key=>$currency)
            <option id="{{$key}}" value="<?php echo htmlentities($currency); ?>">{{$key .' ('.$currency.')'}}</option>
            @endforeach
		</select>
	</div>

    <script>
        function s_f(){
            var e = document.getElementById("select_c");
            var selected = e.options[e.selectedIndex].id;
            document.getElementById("s_c").value = selected;
        }
    </script>

    {{-- <div class="form-group">
        <h5 class="text-{{$text}}">Website Preference</h5>
        <select name="site_preference"  class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}">
            <option value="{{$settings->site_preference}}">Currently ({{$settings->site_preference}})</option>
            <option>Web dashboard only</option>
        </select>
    </div> --}}
    <input type="hidden" value="{{$settings->site_preference}}" name="site_preference">

    {{-- <div class="form-group">
       <h5 class="text-{{$text}}">FrontPage Website Colour</h5>
       <div class="d-inline">
           <label class="colorinput">
            <input name="color" type="radio" id="colour1" value="default" name="site_colour" class="colorinput-input">
            <span class="colorinput-color" style="background-color: purple"></span>
            </label>&nbsp; &nbsp;
            <label class="colorinput">
                <input name="color" type="radio" id="colour2" value="blue" name="site_colour" class="colorinput-input">
                <span class="colorinput-color bg-primary"></span>
            </label>
       </div>
    </div> --}}
    <div class="form-group">
        <div class="sign-u">
            <div class="sign-up1">
                <h5 class="text-{{$text}}">Turn on/off Annoucment: </h5>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="annouc" id="annouc" type="checkbox" value="on">
                <span class="slider round"></span>
            </label>
            </div>
        </div> 
    </div>
    <div class="form-group">
            <div class="sign-u">
            <div class="sign-up1">
                <h5 class="text-{{$text}}">Verify registration:</h5>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="enable_verification" id="enable_verification" type="checkbox" value="true">
                <span class="slider round"></span>
            </label>
            </div>
        </div>
    </div>

     <div class="form-group">
        <div class="sign-u">
            <div class="sign-up1">
                <h5 class="text-{{$text}}">Turn on/off trade: </h5>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="trade_mode" id="check" type="checkbox" value="on">
                <span class="slider round"></span>
            </label>
            </div>
        </div> 
    </div>
    
    <div class="form-group">
        <div class="sign-u">
            <div class="sign-up1">
                <h5 class="text-{{$text}}">Turn on/off 2FA:</h5>
            </div>
            <div class="sign-up2">
            <label class="switch">
                <input name="enable_2fa" id="2fa_check" type="checkbox" value="yes">
                <span class="slider round"></span>
            </label>
            </div>
        </div> 
    </div>
    
    <div class="form-group">
        <div class="sign-u">
        <div class="sign-up1">
            <h5 class="text-{{$text}}">Turn on/off KYC:</h5>
        </div>
        <div class="sign-up2">
            <label class="switch">
                <input name="enable_kyc" id="kyc_check" type="checkbox" value="yes">
                <span class="slider round"></span>
            </label>
        </div>
        </div>
    </div>

    @if($settings->enable_annoc=='on')
    <script>document.getElementById("annouc").checked= true;</script>
    @endif

    @if($settings->trade_mode=='on')
        <script>document.getElementById("check").checked= true;</script>
    @endif

    @if($settings->enable_2fa=='yes')
        <script>document.getElementById("2fa_check").checked= true;</script>
    @endif

    @if($settings->enable_kyc=='yes')
        <script>document.getElementById("kyc_check").checked= true;</script>
    @endif

    @if($settings->enable_verification=='true')
        <script>document.getElementById("enable_verification").checked= true;</script>
    @endif

    <?php
    if($settings->site_colour=="default"){
        echo'
        <script>document.getElementById("colour1").checked= true;</script>
        ';
        }
        if($settings->site_colour=="blue"){
            echo'
            <script>document.getElementById("colour2").checked= true;</script>
            ';
        }
        
        //for  bot actuvate checkbox
        if($settings->bot_activate=="true"){
            echo'
            <script>document.getElementById("bot_activate").checked= true;</script>
            ';
        }
    ?>
     <input type="submit" class="btn btn-primary px-5 btn-lg mb-2" value="Save">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
</form>