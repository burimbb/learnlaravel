<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Hello
            </div>

            <div class="card-body">
                Helo world
            </div>

            <div class="card-footer">
                <button class="btn btn-primary" onclick="call()">Fetch Data</button>
            </div>
        </div>

        <h3>Fetching from javascript</h3>
        <div id="support-data">

        </div>
        
        <hr>
        
        <h3>Fetching from github package</h3>

        {{-- //another fetch with package --}}
        <div id="github-fragment">
            @if ($cachedPartials)
                {!! $cachedPartials !!}
            @else
                <include-fragment src="/support/partials">
                    <p>Loading tip…</p>
                </include-fragment>
            @endif

        </div>

    </div>

    <script>
        function call(){
            fetch('/support/partials')
                .then(response => {
                    return response.text();
                })
                .then(html => {
                    document.querySelector('#support-data').innerHTML = html;
                });
        }
    </script>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="https://www.unpkg.com/@github/include-fragment-element"></script>
</body>
</html>
