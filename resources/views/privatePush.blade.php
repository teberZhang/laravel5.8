<!--私有频道 PrivateChannel —— 广播-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>privatePush</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="content" id="app">
    PrivateChannel
</div>
<script>
    @if(!empty(Auth::user()))
        window.id = "{{Auth::user()->id}}"
    @endif
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    <!--如果Event中用了broadcastAs,listen的时候前面要加.-->
    Echo.private('privatePush.' + window.id)
        .listen('.privateMessage', (e) => {
            console.log(e.message);
        });
</script>
</body>
</html>