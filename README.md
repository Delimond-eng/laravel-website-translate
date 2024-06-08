## add Dependecy

composer require google/cloud-translate
composer require mcamara/laravel-localization


## Publish localization package

php artisan vendor:publish --provider="Mcamara\LaravelLocalization\LaravelLocalizationServiceProvider"

## Add Middlewaire to App/Http/Kernel

```
protected $routeMiddleware = [
        ...
        'localize'                => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRoutes::class,
        'localizationRedirect'    => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationRedirectFilter::class,
        'localeSessionRedirect'   => \Mcamara\LaravelLocalization\Middleware\LocaleSessionRedirect::class,
        'localeCookieRedirect'    => \Mcamara\LaravelLocalization\Middleware\LocaleCookieRedirect::class,
        'localeViewPath'          => \Mcamara\LaravelLocalization\Middleware\LaravelLocalizationViewPath::class
    ];
```

## Create this code 

<pre>
namespace App\Services;

use Google\Cloud\Translate\V2\TranslateClient;

class GoogleTranslateService
{
    protected $translate;

    public function __construct()
    {
        $this->translate = new TranslateClient([
            'key' => env('GOOGLE_TRANSLATE_API_KEY')
        ]);
    }

    public function translate($text, $targetLanguage)
    {
        $result = $this->translate->translate($text, [
            'target' => $targetLanguage,
        ]);

        return $result['text'];
    }
}
</pre>

## Integrate service on blade view



```
@inject('translateService', 'App\Services\GoogleTranslateService')
<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $translateService->translate('Welcome to our website', app()->getLocale()) }}</title>
    </head>
    <body>
        <h1>{{ $translateService->translate('Hello, world!', app()->getLocale()) }}</h1>
        <p>{{ $translateService->translate('This is a bilingual website.', app()->getLocale()) }}</p>
    </body>
</html>
```

## Manage Language Selection

```
<ul>
    <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a></li>
    <li><a href="{{ LaravelLocalization::getLocalizedURL('fr') }}">Français</a></li>
</ul>
```

## HERE WE GO
