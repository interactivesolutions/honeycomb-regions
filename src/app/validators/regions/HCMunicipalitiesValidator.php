<?php namespace interactivesolutions\honeycombregions\app\validators\regions;


use InteractiveSolutions\HoneycombCore\Http\Controllers\HCCoreFormValidator;

class HCMunicipalitiesValidator extends HCCoreFormValidator
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'country_id' => 'required',
            'name' => 'required',

        ];
    }
}