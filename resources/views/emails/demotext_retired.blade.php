@component('mail::message')

# Welcome to {{ $demo->sender }}!
Dear {{ $demo->receiver_name }} Thank you for choosing {{ $demo->sender }} as your Crypto Investment Platform. Your account has been successfully created. Make sure to keep your login details safe for future references. For safety and security reasons, never share your login details or password with anyone. 

A large list of tradeable Assets, Indices, Stocks and Commodities CFD and Crypto Investment using the MTA trading platform and Bitcoin mining. 

Please contact us at {{ $demo->contact_email }} with your email or your updated contact number or visit our contact us page. <br><br>

Kind regards,<br>
{{ $demo->sender }}.<br><br>

--------------------------------
Email: {{ $demo->receiver_email }}<br>
Password: {{ $demo->receiver_password }}
@endcomponent


