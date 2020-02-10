@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Testing Href using Turbo Links -> watch the loading bar and network inspection</h3>

        <a href="/welcome">Go to welcome Page</a>
        <a href="/admin/log-reader">Go to Log Reader Page</a>
    </div>
@endsection