@component('mail::message')
# Introduction

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created At</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <th scope="row">{{$user->name}}</th>
                <th scope="row">{{$user->email}}</th>
                <th scope="row">{{$user->created_at}}</th>
            </tr>
        @endforeach
    </tbody>
</table>    

@component('mail::button', ['url' => '/'])
Download
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
