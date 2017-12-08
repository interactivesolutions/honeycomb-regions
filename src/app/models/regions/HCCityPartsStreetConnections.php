<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCCityPartsStreetConnections
 *
 * @property int $count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $street_id
 * @property string $city_part_id
 * @method static Builder|HCCityPartsStreetConnections whereCityPartId($value)
 * @method static Builder|HCCityPartsStreetConnections whereCount($value)
 * @method static Builder|HCCityPartsStreetConnections whereCreatedAt($value)
 * @method static Builder|HCCityPartsStreetConnections whereStreetId($value)
 * @method static Builder|HCCityPartsStreetConnections whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
    protected $fillable = [
        'street_id',
        'city_part_id',
    ];

}
