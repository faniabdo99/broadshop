@component('mail::message')
# Reset Your Password
Hello there, <b>{{$EmailData->name}}</b>
<br>
You have requested to reset your password, please click the link below to do so.
@component('mail::button', ['url' => route('user.getChoosePassword' ,[$EmailData->email , md5($EmailData->code)])])
    Click Here to Reset Your Password
@endcomponent
If it wasn't you who asked for this please just ignore this email.
Thanks,<br>
{{ config('app.name') }}
@endcomponent
