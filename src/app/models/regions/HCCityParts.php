<?php

namespace interactivesolutions\honeycombregions\app\models\regions;


use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\traits\HCCityTrait;

class HCCityParts extends HCUuidModel
{
    use HCCityTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_city_parts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'city_id', 'name', 'translation_key'];

    /**
     * Appendable attributes
     *
     * @var array
     */
    protected $appends = ['municipality_id', 'country_id', 'city'];

    /**
     * Getting municipality id attribute
     *
     * @return mixed
     */
    public function getMunicipalityIdAttribute()
    {
        return $this->city()->getResults()->municipality_id;
    }

    /**
     * Getting country id attribute
     *
     * @return mixed
     */
    public function getCountryIdAttribute()
    {
        return $this->belongsTo(HCMunicipalities::class, 'municipality_id', 'id')->getResults()->country_id;
    }

    /**
     * Getting city attribute
     *
     * @return mixed
     */
    public function getCityAttribute()
    {
        return $this->city()->getResults()->name;
    }
}
