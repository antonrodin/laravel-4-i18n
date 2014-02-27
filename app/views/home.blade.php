<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>{{ Lang::get('example.Hello World') }}</title>
</head>
<body>
    <h1>{{ Lang::get('example.Hello World') }}</h1>
    <ul>
        <li>{{ link_to(URL::route('home'), Lang::get('example.Home')) }}</li>
        <li>{{ link_to(URL::route('news'), Lang::get('example.News')) }}</li>
        <li>{{ link_to(URL::route('contact'), Lang::get('example.Contact')) }}</li>
    </ul>
    <h2>{{ Lang::get('example.Switch locale') }}</h2>
    <ul>
        <li><a href="{{ URL::to('/change_locale/es') }}">Español</a></li>
        <li><a href="{{ URL::to('/change_locale/en') }}">English</a></li>
        <li><a href="{{ URL::to('/change_locale/ru') }}">Pусский</a></li>
    </ul>
</body>
</html>