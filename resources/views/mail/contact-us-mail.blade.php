@component('mail::message')
# New Contact Request
Hello there, admin you have new contact request.<br>
<p><b>Name:</b> {{$EmailData['name']}}</p>
<p><b>Email:</b> {{$EmailData['email']}}</p>
<p><b>Phone:</b> {{$EmailData['phone']}}</p>
<p><b>Message:</b><br>
    ========= START MESSAGE =========<br>
    {{$EmailData['message']}}<br>
    ========= END MESSAGE =========
</p>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
