@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <countdown until="June 26 2020" expiredTxt="Your birthday has been done."></countdown>
                <countdown until="June 26 2019"></countdown>
            </div>
        </div>
    </div>
@endsection