<!DOCTYPE html>

<html>

<head>

    <title>{{env('APP_NAME')}}</title>

</head>

<body>

    <h1>{{__('site.subject')}}</h1>

    <a href="{{route('profiles.home', $token)}}">{{__('site.continue')}}</a>

    <p>{{__('site.thank_you')}}</p>

</body>

</html>