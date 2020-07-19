@extends('layouts.app')

@section('styles')
    <style>
        .generic-content p{
            margin-bottom: 20px; 
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="w-75 mx-auto generic-content">
            <div class="text-center mb-4">
                <h1 class="font-bold text-3xl">FAQ</h1>
                
                <p>Lets do it.</p>
            </div>
            
            @foreach ($questions as $question)
                <laracast-question :question="{{ json_encode($question) }}"></laracast-question>
            @endforeach
        </div>
    </div>
@endsection