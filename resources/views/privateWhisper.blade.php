<!--私有频道 PrivateChannel —— whisper事件的接收端 —— listenForWhisper —— 广播-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>listenForWhisper</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="content" id="app">
    私有频道 PrivateChannel —— whisper事件的接收端 —— listenForWhisper —— 广播
</div>
<script>
    @if(!empty(Auth::user()))
        window.id = "{{Auth::user()->id}}"
    @endif
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    // 收听端
    Echo.join('privatePush.' + window.id)
        .listenForWhisper('typing', (e) => {
            console.log(e.message);
        });

</script>
</body>
</html>