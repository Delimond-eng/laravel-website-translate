<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\GoogleTranslateService;

class Translate extends Component
{
    public $text;
    protected $translateService;
    public $locale;

    public function __construct(GoogleTranslateService $translateService, $text, $locale = null)
    {
        $this->translateService = $translateService;
        $this->text = $text;
        $this->locale = $locale ?: app()->getLocale();
    }

    public function render()
    {
        $translatedText = $this->translateService->translate($this->text, $this->locale);

        return view('components.translate', ['text' => $translatedText]);
    }
}