<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <ul>
        <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
        <li><a href="{{ LaravelLocalization::getLocalizedURL('fr') }}">Français</a></li>
    </ul>
    <h1><x-translate text="Bienvenue !" /></h1>
    <p><x-translate text="This is a bilingual website." /></p>
    <p><x-translate text="We hope you enjoy your stay." /></p>
</body>
</html>
