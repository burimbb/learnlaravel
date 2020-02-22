<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="{{asset('js/app.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <script src="{{ asset('js/pace.js') }}"></script>
    <link href="../vendor/pace/themes/pace-theme-barber-shop.css" rel="stylesheet" />

    <style>
.pace {
  -webkit-pointer-events: none;
  pointer-events: none;

  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.pace .pace-activity {
  display: block;
  position: fixed;
  z-index: 2000;
  top: 0;
  right: 0;
  width: 300px;
  height: 300px;
  background: #29d;
  -webkit-transition: -webkit-transform 0.3s;
  transition: transform 0.3s;
  -webkit-transform: translateX(100%) translateY(-100%) rotate(45deg);
  transform: translateX(100%) translateY(-100%) rotate(45deg);
  pointer-events: none;
}

.pace.pace-active .pace-activity {
  -webkit-transform: translateX(50%) translateY(-50%) rotate(45deg);
  transform: translateX(50%) translateY(-50%) rotate(45deg);
}

.pace .pace-activity::before,
.pace .pace-activity::after {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    position: absolute;
    bottom: 30px;
    left: 50%;
    display: block;
    border: 5px solid #fff;
    border-radius: 50%;
    content: '';
}

.pace .pace-activity::before {
    margin-left: -40px;
    width: 80px;
    height: 80px;
    border-right-color: rgba(0, 0, 0, .2);
    border-left-color: rgba(0, 0, 0, .2);
    -webkit-animation: pace-theme-corner-indicator-spin 3s linear infinite;
    animation: pace-theme-corner-indicator-spin 3s linear infinite;
}

.pace .pace-activity::after {
    bottom: 50px;
    margin-left: -20px;
    width: 40px;
    height: 40px;
    border-top-color: rgba(0, 0, 0, .2);
    border-bottom-color: rgba(0, 0, 0, .2);
    -webkit-animation: pace-theme-corner-indicator-spin 1s linear infinite;
    animation: pace-theme-corner-indicator-spin 1s linear infinite;
}

@-webkit-keyframes pace-theme-corner-indicator-spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(359deg); }
}
@keyframes pace-theme-corner-indicator-spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(359deg); }
}

    </style>
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

    <div>
        @for ($i = 0; $i < 500; $i++)
            <p>{{$i}}</p>
        @endfor
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col bg-primary">Test</div>
            <div class="col-6 bg-secondary">Wider</div>
            <div class="col bg-primary">Test</div>
        </div>
    </div>
    <script>
        $(document).ajaxStart(function() { Pace.restart(); });
    </script>
</body>
</html>