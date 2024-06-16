<?php

namespace Labomatik\NovaSettings;

use Laravel\Nova\Fields\Field;

class NovaSettings extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-settings';

    public function options(array $options)
    {
        return $this->withMeta($options);
    }



    /**
     * Fill the model's attribute with data.
     *
     * @param  \Illuminate\Database\Eloquent\Model|\Laravel\Nova\Support\Fluent  $model
     * @param  mixed  $value
     * @param  string  $attribute
     * @return void
     */
    public function fillModelWithData(mixed $model, mixed $value, string $attribute)
    {
        // Save the value
        if($this->meta['type'] == 'boolean')
        {
            if($value == 'true' || $value == '1' || $value == 1 || $value == true)
            {
                $value = true;
            }
            else
            {
                $value = false;
            }
        }

        $model->settings()->set($this->meta['setting_name'], $value);

    }





    public function resolveForDisplay($resource, $attribute = null)
    {
        $metas = $this->meta;

        if($metas['type'] == 'boolean')
        {
            // Return Oui/Non based on the true or false
            $this->value = $resource->settings()->get($metas['setting_name'], $metas['default'] ?? null) ? true : false;
        }


        //$this->value = $resource->settings()->get($metas['name'], $metas['default'] ?? null);
    }

    public function resolve($resource, $attribute = null)
    {
        $metas = $this->meta;

        if($metas['type'] == 'boolean')
        {
            // Return Oui/Non based on the true or false
            $this->value = $resource->settings()->get($metas['setting_name'], $metas['default'] ?? null) ? true : false;
        }

        //$this->value = $resource->settings()->get($metas['name'], $metas['default'] ?? null);
    }

}
