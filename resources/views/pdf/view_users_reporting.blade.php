@extends('layouts.app')

@section('content')
    <div class="container bg-white">
        <div class="row p-3">
            <div class="col-6">
                <h3>This is an Pdf view</h3>
            </div>
            <div class="col-6">
                <a class="btn btn-primary float-right" href="/download/daily_user_reports_pdf">Download PDF</a>
            </div>
        </div>

        @include('pdf.user_reporting_pdf')
    </div>
@endsection