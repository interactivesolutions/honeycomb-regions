<?php

namespace interactivesolutions\honeycombregions\app\models\regions;

use interactivesolutions\honeycombcore\models\HCUuidModel;

class HCCities extends HCUuidModel
{
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
