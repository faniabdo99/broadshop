@component('mail::message')
# Your Order Receipt From Broadshop
<p>Thank you for your order at UK Fashion Shop, Please find the order information below</p><br>
<p><b>Order Serial Number:</b> {{$EmailData->serial_number}}</p>
<p><b>Order Total: </b> {{$EmailData->total.getCurrency()['symbole']}}</p>
<p><b>Payment Method: </b> {{$EmailData->PaymentMethodText}}</p><br>
<p>if you already have an account, you can view your orders from your account page at Broadshop.</p>
@component('mail::button', ['url' => 'https://broadshop.be'])
    Broadshop.be
@endcomponent

Thank You,<br>
Broadshop
@endcomponent
