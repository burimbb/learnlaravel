@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <countdown until="June 26 2021" expiredTxt="Your birthday has been done."></countdown>
                <countdown until="August 30 2020 17:36:00"></countdown>
            </div>
        </div>
    </div>
@endsection