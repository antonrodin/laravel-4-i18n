<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>{{ Lang::get('example.World news') }}</title>
</head>
<body>
    <h1>{{ Lang::get('example.World news') }}</h1>
    <ul>
        <li>{{ link_to(URL::route('home'), Lang::get('example.Home')) }}</li>
        <li>{{ link_to(URL::route('news'), Lang::get('example.News')) }}</li>
        <li>{{ link_to(URL::route('contact'), Lang::get('example.Contact')) }}</li>
    </ul>
</body>
</html>