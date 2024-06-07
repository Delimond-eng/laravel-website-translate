<?php

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