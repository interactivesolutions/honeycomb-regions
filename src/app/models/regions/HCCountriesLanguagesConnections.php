<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCCountriesLanguagesConnections
 *
 * @mixin \Eloquent
 */
class HCCountriesLanguagesConnections extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_countries_languages_connections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id',
        'language_id',
        'official',
    ];

}
