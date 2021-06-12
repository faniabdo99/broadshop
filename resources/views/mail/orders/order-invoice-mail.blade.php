@component('mail::message')
# @lang('mails/orders.order_invoice')
@lang('mails/mails.hello'), {{$EmailData->first_name}}, @lang('mails/orders.order_invoice_first_paragraph')<br>
<br>
<b>@lang('mails/orders.order_invoice_order_id'):</b> {{$EmailData->serial_number}}<br>
<b>@lang('mails/orders.order_invoice_total'):</b> {{$EmailData->total}}€<br>
<h3>Your Order:</h3>
| Product | Quanitity | Price | Total |
|----------|:-------------:|------:||
@forelse($EmailData->Items() as $Item)
@empty
| {{$Item->Product->title}} |  {{$Item->qty}} | {{$Item->Product->price}} | {{($Item->Product->price * $Item->qty)}} |
@endforelse
@lang('mails/mails.thanks'),<br>
{{ config('app.name') }}
@endcomponent
