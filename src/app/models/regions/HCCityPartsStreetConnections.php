<?php

namespace interactivesolutions\honeycombregions\app\models\regions;


use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

class HCCityPartsStreetConnections extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_city_parts_streets_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['street_id', 'city_part_id'];

}
