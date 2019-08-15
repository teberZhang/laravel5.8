<!--广播通知-->
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>广播通知</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="content" id="app">
    广播通知
</div>
<script>
    @if(!empty(Auth::user()))
        window.id = "{{Auth::user()->id}}"
    @endif
</script>
<script src="{{ mix('js/app.js') }}"></script>
<script>
    /***
     *  监听通知
     *
     */
    Echo.private('App.Models.User.' + window.id)
    .notification((notification) => {
        console.log(new Date());
		if (notification.type === 'App\\Notifications\\NewsBroadcastNotification')
		{
			console.log(notification);
		}
    });

</script>
</body>
</html>