@component('mail::message')
# You have been registered succesfuly

Have a good time with us mr.{{$user->name}}.

@component('mail::button', ['url' => ''])
Go to our site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
