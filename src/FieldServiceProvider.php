<?php

namespace Duckzland\NovaLanguageSwitcher;

use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\ServiceProvider;

class FieldServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Nova::serving(function (ServingNova $event) {
            Nova::provideToScript([
                'languageSwitcher' => [
                    'locales' => config('app.locales', [ 'en_US' => 'English']), 
                    'currentLocale' => config('app.locale', 'en_US'),
                    'fallbackLocale' => config('app.fallback_locale', 'en_US')
                ],
            ]);
            Nova::script('language-switcher-nova', __DIR__ . '/../dist/js/field.js');
            Nova::style('language-switcher-nova', __DIR__ . '/../dist/css/field.css');
        });
    }
}
