<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div id="app">
        <menu-list :items="['test', 'test1', 'test2']">
            <template scope="props">
                <div>
                    <h3 v-text="props.item"></h3>
                </div>
            </template>
        </menu-list>

        <menu-list :items="['foo', 'foo1', 'foo2']"></menu-list>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>