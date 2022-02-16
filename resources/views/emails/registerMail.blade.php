<!DOCTYPE html>
<html>
<head>
    <title>new.b2b-sklad.com</title>
</head>
<body>
    <h1>{{__('l.register_to_service')}}</h1>

    <p>{{__('l.dear')}} {{ $details['name'] }},</p>
    <p>{{__('l.we_invite_you_to_join_our_B2B_Service')}}.</p>
    <p>{{__('l.site')}}: <a href="{{Request::getHost()}}">{{Request::getHost()}}</a></p>
    <p>{{__('l.login')}}: {{ $details['login'] }}</p>
    <p>{{__('l.password')}}: {{ $details['pass'] }}</p>


</body>
</html>
