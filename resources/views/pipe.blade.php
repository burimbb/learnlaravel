<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        {{$count = 1}}
        <div class="flex-center position-ref full-height">
            <table>
                @foreach ($apples as $apple)
                    <tr>
                        <td>{{$apple->active}}</td>
                        <td>{{$apple->title}}</td>
                        <td></td>
                        <td></td>
                        <td>id: {{ $count++ }}</td>
                    </tr>
                @endforeach
            </table>
            {{$apples->appends(request()->input())->links()}}
        </div>
    </body>
</html>
