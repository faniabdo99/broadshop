@component('mail::message')
# @lang('mails/orders.order_invoice')
@lang('mails/mails.hello'), {{$EmailData->first_name}}, @lang('mails/orders.order_invoice_first_paragraph')<br>
<br>
<b>@lang('mails/orders.order_invoice_order_id'):</b> {{$EmailData->serial_number}}<br>
<b>@lang('mails/orders.order_invoice_total'):</b> {{$EmailData->total}}€<br>
<h3>Your Order:</h3>
<table>
    <thead>
        <th>Product</th>
        <th>Quanitity</th>
        <th>Price</th>
        <th>Total</th>
    </thead>
    <tbody>
        @forelse($EmailData->Items() as $Item)
        @empty
        <tr>
            <td>{{$Item->Product->title}}</td>
            <td>{{$Item->qty}}</td>
            <td>{{$Item->Product->price}}</td>
            <td>{{($Item->Product->price * $Item->qty)}}</td>
        </tr>
        @endforelse
    </tbody>
</table>
Thanks<br>
Broadshop
@endcomponent
