<?php

namespace interactivesolutions\honeycombregions\app\models\regions;


use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\traits\HCCountryTrait;
use interactivesolutions\honeycombregions\app\models\traits\HCMunicipalityTrait;

class HCCities extends HCUuidModel
{
    use HCCountryTrait, HCMunicipalityTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_cities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'country_id', 'municipality_id', 'name', 'translation_key'];
}
