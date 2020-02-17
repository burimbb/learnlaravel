<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="col-md-6 offset-3">
        <h3>HellO World</h3>
        <form action="/pagepost" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name">
            </div>
        
            <button type="submit" class="btn btn-primary">Button</button>
        </form>
    </div>
</body>
</html>