@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            @foreach ($users as $user)
                <tr>
                    <td class="table-cell">{{$user->name}}</td>
                    <td class="table-cell">{{$user->email}}</td>
                    <td class="table-cell">{{$user->created_at}}</td>
                    <td class="table-cell">
                        <strong>Last Comment Posted: {{ $user->last_comment }}</strong>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection