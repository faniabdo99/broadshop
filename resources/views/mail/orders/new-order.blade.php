@component('mail::message')
# New Order
Hello admin, You have bew order on Broadshop <br><br>
<p><b>Order Details:</b></p>
<ul>
    <li>From: {{$EmailData->first_name . ' ' . $EmailData->last_name}}</li>
    <li>Total: {{$EmailData->total}}</li>
    <li>Is Paid: {{$EmailData->is_paid}}</li>
    <li>Payment Method: {{$EmailData->payment_method}}</li>
</ul>
<br><br>
Thanks,<br>
Broadshop
@endcomponent
