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
                        @if ($user->comments->isNotEmpty())
                            <strong>Last: {{ $user->comments->sortByDesc('created_at')
                                                ->first()->created_at }}</strong>
                        @endif
                    </td>
                    <td class="table-cell">
                        @foreach ($user->comments as $comment)
                            <p>{{$comment->created_at.' - '.$comment->body}}</p>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection