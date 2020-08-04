<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel')</title>
</head>
<body>
    <ul>
        <li><a href="/">Welcome</a></li>
        <li><a href="/hello">Hello</a></li>
        <li><a href="/contact">Contact</a></li>
    </ul>
@yield('content')
</body>
</html>
