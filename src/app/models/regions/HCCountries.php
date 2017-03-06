<?php

namespace interactivesolutions\honeycombregions\app\models\regions;

use interactivesolutions\honeycombcore\models\HCModel;

class HCCountries extends HCModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'region_id', 'common_name', 'official_name', 'translation_key', 'iso_3166_1_alpha2', 'iso_3166_1_alpha3', 'flag_id', 'geo_data'];

    /**
     * The attributes that are hidden
     *
     * @var array
     */
    protected $hidden = ['translation_key'];

    /**
     * The attributes which will be added automatically
     *
     * @var array
     */
    protected $appends = ['translation'];

    /**
     * Getting real translation
     *
     * @return string
     */
    public function getTranslationAttribute()
    {
        return trans($this->translation_key);
    }

}
