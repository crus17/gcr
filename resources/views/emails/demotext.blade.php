@component('mail::message')

# Welcome to {{ $demo->sender }}!
Your registration is successful and we are really excited to welcome you to {{ $demo->sender }} community! <br>

Click the button below to activate your account and start earning!
<div class="action">
    <a href="{{ $demo->acct_activate_link }}" target="_blank" class="button blue button-blue">Activate Now</a>
</div> <br>
<p style="font-size:12px">If the button doesn’t work, please copy and paste this link to your browser: <strong>{{ $demo->acct_activate_link }}</strong></p><br>

If you need any help, do not hesitate to reach out to us at <br> {{ $demo->contact_email }} <br><br>

Kind regards,<br>
{{ $demo->sender }}.
@endcomponent


