@component('mail::message')
# Order Invoice <br>
<p>Hello There, {{$EmailData->first_name}}, Please find the attached invoice file for your order from Broadshop.</p><br>
<br>
<p><b>Order Serial Number:</b> {{$EmailData->serial_number}}</p>
<p><b>Order Total: </b> {{$EmailData->total.getCurrency()['symbole']}}</p>
<p><b>Payment Method: </b> {{$EmailData->PaymentMethodText}}</p><br>

Thanks<br>
Broadshop
@endcomponent
