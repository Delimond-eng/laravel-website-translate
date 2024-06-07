@inject('translateService', 'App\Services\GoogleTranslateService')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $translateService->translate('Welcome to our website', app()->getLocale()) }}</title>
</head>
<body>
    <ul>
        <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
        <li><a href="{{ LaravelLocalization::getLocalizedURL('fr') }}">Français</a></li>
    </ul>
    <h1>{{ $translateService->translate('Hello, world!', app()->getLocale()) }}</h1>
    <p>{{ $translateService->translate('This is a bilingual website.', app()->getLocale()) }}</p>
    <p>{{ $translateService->translate('Je suis de la tournure que prend les choses !' , app()->getLocale()) }} </p>
</body>
</html>
