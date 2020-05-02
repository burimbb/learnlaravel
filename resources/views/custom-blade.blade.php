@extends('layouts.app')

@section('content')
    <div class="container">
        @hellomember
            <h2>Hello member</h2>
        @else
            <h3>hello member false</h3>
        @endhellomember
    </div>
@endsection