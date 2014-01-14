<!DOCTYPE html>
<html lang="{{ Config::get('app.locale') }}">
<head>
    <meta charset="utf-8">
    <title>{{ Lang::get('example.Contact Form') }}</title>
</head>
<body>
    <h1>{{ Lang::get('example.Contact Form') }}</h1>
    <ul>
        <li>{{ link_to(URL::route('home'), Lang::get('example.Home')) }}</li>
        <li>{{ link_to(URL::route('news'), Lang::get('example.News')) }}</li>
        <li>{{ link_to(URL::route('contact'), Lang::get('example.Contact')) }}</li>
    </ul>
</body>
</html>