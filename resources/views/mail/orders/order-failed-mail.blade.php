@component('mail::message')
#@lang('mails/orders.order_failed')<br>
@lang('mails/orders.order_failed_first_paragraph')<br>
@lang('mails/orders.order_failed_second_paragraph')
@lang('mails/mails.thanks'),<br>
{{ config('app.name') }}
@endcomponent
