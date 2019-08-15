<!--存在频道 PresenceChannel —— 广播-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>存在频道 PresenceChannel —— 广播</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="content" id="app">
    存在频道 PresenceChannel —— 广播
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    /***
     *  存在频道
     *
     */
    Echo.join('presenceChannel')
        .here((users) => {
            console.log(users);

        })
        .joining((user) => {
            console.log(user);
        })
        // .leaving((user) => {
        //     console.log(user);
        // })
        .listen('.presenceArticle', (e) => {
            console.log(e); // 收到消息进行的操作，参数 e 为所携带的数据

        });

</script>
</body>
</html>