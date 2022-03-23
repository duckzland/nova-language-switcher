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
                'locales' => config('app.locales', [ 'en_US' => 'English']), 
                'locale' => config('app.locale', 'en_US'),
                'fallback_locale' => config('app.fallback_locale', 'en_US')
            ]);
            Nova::script('language-switcher-nova', __DIR__ . '/../dist/js/field.js');
            Nova::style('language-switcher-nova', __DIR__ . '/../dist/css/field.css');
        });
    }
}
