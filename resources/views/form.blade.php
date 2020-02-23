@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('form.post') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name">
            </div>

            <div class="form-group">
                <label for="lastname">lastname:</label>
                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="lastname">
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection