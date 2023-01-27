@component('mail::message')
# Service Booked

Hello {{ $name }},

We have received your order! If necessary, you will receive a response within 48-72 hours.

Your order code is: {{ $orderNumber }}. Please quote your order code if you wish to contact us about this order.

Thanks,<br>
{{ config('app.name') }}
@endcomponent