@component('mail::message')

Order Shipped <br>
Name: {{$user->name}} <br>
Email: {{$user->email}} <br>

You have received your order.

@component('mail::button', ['url' => 'http://learnlaravel.test/'])
View your order
@endcomponent

Thanks,<br>
{{ config('app.name') }}

@endcomponent