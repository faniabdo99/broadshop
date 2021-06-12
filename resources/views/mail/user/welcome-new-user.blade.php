@component('mail::message')
# Welcome to Broadshop!
Welcome to Broadshop.be {{$EmailData->name}}!<br>
You have successfully signedup to broadshop, you'r #1 source of all home needs! since we are celebrating your arrival we offer you a 20€ coupon code!<br>
You can use the code <b>WELCOME_NEW_USER</b> at the checkout page! please be sure to login first before you make an order to use the coupon.

Thanks,<br>
Broadshop.be
@endcomponent
