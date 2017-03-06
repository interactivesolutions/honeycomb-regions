<?php

namespace interactivesolutions\honeycombregions\app\forms\regions;

class HCCitiesForm
{
    // name of the form
    protected $formID = 'regions-municipalities';

    // is form multi language
    protected $multiLanguage = 0;

    /**
     * Creating form
     *
     * @param bool $edit
     * @return array
     */
    public function createForm (bool $edit = false)
    {
        $form = [
            'storageURL' => route ('admin.api.regions.municipalities'),
            'buttons'    => [
                [
                    "class" => "col-centered",
                    "label" => trans ('HCCoreUI::core.button.submit'),
                    "type"  => "submit",
                ],
            ],
            'structure'  => [
                [
                    "type"            => "dropDownList",
                    "fieldID"         => "country_id",
                    "label"           => trans ("HCRegions::regions_municipalities.country_id"),
                    "required"        => 1,
                    "requiredVisible" => 1,
                    "search"          => [
                        "maximumSelectionLength" => 1,
                        "minimumSelectionLength" => 1,
                        "url"                    => route ('admin.api.regions.municipalities.search')
                    ],
                ]
            ],
        ];

        if ($this->multiLanguage)
            $form['availableLanguages'] = []; //TOTO implement honeycomb-languages package

        if (!$edit)
            return $form;

        //Make changes to edit form if needed
        // $form['structure'][] = [];

        return $form;
    }
}