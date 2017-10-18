<?php

namespace interactivesolutions\honeycombregions\app\forms\regions;

use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class HCCitiesForm
{
    // name of the form
    protected $formID = 'regions-cities';

    // is form multi language
    protected $multiLanguage = 0;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm(bool $edit = false)
    {
        $country = request('country_id');

        $form = [
            'storageURL' => route('admin.api.regions.cities'),
            'buttons' => [
                [
                    "class" => "col-centered",
                    "label" => trans('HCTranslations::core.buttons.submit'),
                    "type" => "submit",
                ],
            ],
            'structure' => [
                [
                    "type" => "dropDownList",
                    "fieldID" => "country_id",
                    "label" => trans("HCRegions::regions_municipalities.country_id"),
                    "required" => 1,
                    "requiredVisible" => 1,
                    "options" => HCCountries::select('id', 'translation_key')->get(),
                    "search" => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ["translation"],
                    ],
                    "value" => $country,
                ],
                [
                    "type" => "dropDownList",
                    "fieldID" => "municipality_id",
                    "label" => trans("HCRegions::regions.municipality"),
                    "search" => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "showNodes" => ["translation"],
                    ],
                    "dependencies" => [
                        [
                            "field_id" => "country_id",
                            "options_url" => route('admin.api.regions.municipalities.list'),
                        ],
                    ],
                ],
                [
                    "type" => "singleLine",
                    "fieldID" => "name",
                    "label" => trans("HCRegions::regions_municipalities.name"),
                    "required" => 1,
                    "requiredVisible" => 1,
                    "dependencies" => [
                        [
                            "field_id" => "country_id",
                        ],
                    ],
                ],
            ],
        ];

        if ($this->multiLanguage) {
            $form['availableLanguages'] = [];
        } //TOTO implement honeycomb-languages package

        if (!$edit) {
            return $form;
        }

        //Make changes to edit form if needed
        // $form['structure'][] = [];

        return $form;
    }
}