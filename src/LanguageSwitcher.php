<?php

namespace Duckzland\NovaLanguageSwitcher;


use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;


class LanguageSwitcher extends Field
{

    public $component = 'language-switcher-nova';


    public function __construct($name, $attribute = null, $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->setLangParameter('lang');
        $this->setAuthorizedToEdit(true);
        $this->setAuthorizedToView(true);
    }



    public function setAuthorizedToView($permission)
    {
        return $this->withMeta([ 'authorizedToView' => $permission ]);
    }



    public function setAuthorizedToEdit($permission)
    {
        return $this->withMeta([ 'authorizedToEdit' => $permission ]);
    }



    public function fill(NovaRequest $request, $model)
    {
        return;
    }



    protected function resolveAttribute($resource, $attribute)
    {
        return [
            'id' => $resource->id,
            'active' => app()->getLocale(),
        ];
    }



    public function setLangParameter(string $param)
    {
        return $this->withMeta([ 'param' => $param ]);
    }



    public function setPlaceholder(string $placeholder)
    {
        return $this->withMeta([ 'placeholder' => $placeholder ]);
    }

}
