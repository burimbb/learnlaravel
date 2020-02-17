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
        <form action="/pagepost" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name">
            </div>
        
            <button type="submit" class="btn btn-primary">Button</button>
        </form>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md bg-primary">One of three columns</div>
            <div class="col-md bg-secondary">One of three columns</div>
            <div class="col-md bg-primary">One of three columns</div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col bg-primary">One of three columns</div>
            <div class="col bg-secondary">One of three columns</div>
            <div class="col bg-primary">One of three columns</div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
          <div class="col bg-primary">Column</div>
          <div class="col bg-secondary">Column</div>
          <div class="w-100"></div>
          <div class="col bg-secondary">Column</div>
          <div class="col bg-primary">Column</div>
        </div>
      </div>
</body>
</html>