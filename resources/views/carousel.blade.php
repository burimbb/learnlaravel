<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carousel</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div id="app">
        <carousel :wraparound="true" :autoplay="true">
            <img src="https://placeimg.com/640/480/any?1">            
            <img src="https://placeimg.com/640/480/any?2">            
            <img src="https://placeimg.com/640/480/any?3">            
            <img src="https://placeimg.com/640/480/any?4">            
        </carousel>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>