<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>News Room</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="content" id="app">
    News Room
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    <!--NewsEvent 和后台的名字一致-->
    Echo.channel('news')
        .listen('NewsEvent', (e) => {
            console.log(e.message);
        });
</script>
</body>
</html>