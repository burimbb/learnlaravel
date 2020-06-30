<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    </head>
    <body>
        <div id="app">
            <div class="container">
                <div class="card">
                  <div class="card-header">
                    My coupon
                  </div>
                
                  <div class="card-body">
                    <payment-form></payment-form>
                  </div>
                </div>
            </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
