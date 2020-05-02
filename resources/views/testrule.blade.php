@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div class="card">
                <div class="card-header">
                    <h4>Hello</h4>
                </div>
            
                <div class="card-body">
                    <form action="/testrule" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">name:</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="name">
                        </div>

                        @if (count($errors))
                            <ul class="alert">
                                <li class="alert-danger">
                                    @foreach ($errors->all() as $error)
                                        <span class="alert-danger">{{$error}}</span>
                                    @endforeach
                                </li>
                            </ul>
                        @endif
                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection