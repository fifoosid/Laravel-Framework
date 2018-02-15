@component('mail::message')

Hello, {{$user->name}}

and welcome on board of Hotels.com.
We hope that you will enjoy your experience and find the best hotel for your needs

@component('mail::button', ['url' => 'http://127.0.0.1:8000/hotels/all'])
Start Browsing Hotels
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent