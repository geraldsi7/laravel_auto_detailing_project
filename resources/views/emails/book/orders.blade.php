@component('mail::message')
# New Service Booked

<b>Order Code:</b>
{{ $orderNumber }}

<b>Name:</b>
{{ $name }}

<b>Email:</b>
{{ $email }}

<b>Phone:</b>
{{ $phone }}

<b>Date and Time:</b>
{{ $ordered_at }}

<b>Vehicle Info:</b>
{{ $vehicle }}

<b>Description</b>
{{ $description }}

@endcomponent