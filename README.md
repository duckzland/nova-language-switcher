# Simple Language Switcher for Laravel Nova

This package is developed for my specific use case only. It might fit or not with your needs.


# Define the available locales
At you config/app.php add this variables:

```
    // Available locales to switch
    'locales' => [
        'en_US' => 'English',
        'en_CA => 'Canadian English',
        'de' => 'Germans',

        ... and other locales
    ],

    // Default current locale
    'locale' => 'en_US',

    // Fallback locale
    'fallback_locale' => 'en_US,
```


# Add the field to nova

```
    LanguageSwitcher::make(__('Switch Language'), 'language')
        ->hideFromIndex()
        ->setLangParameter('lang')
        ->setPlaceholder( __('Change Language'))
        ->setAuthorizedToView($this->authorizedToView($request))
        ->setAuthorizedToEdit($this->authorizedToUpdateForSerialization(request))
        ->withMeta(['class' => 'field-language']);
```
