<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="/pagepost" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name">
            </div>
        
            <button type="submit" class="btn btn-primary">Button</button>
        </form>
    </div>
</body>
</html>