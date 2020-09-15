@component('mail::message')

#Dear User,<br/>
Welcome to our platform.
Please activate your account to begin enjoying our services.

@component('mail::button', ['url' => 'https://www.google.com'])
Activate Account
@endcomponent

#Thanks,<br>
#{{ config('app.name') }}
@endcomponent
