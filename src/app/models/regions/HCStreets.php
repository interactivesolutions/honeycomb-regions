<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\traits\HCCityTrait;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCStreets
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $city_id
 * @property string $name
 * @property string|null $translation_key
 * @property-read mixed $city
 * @property-read Collection|HCCityParts[] $city_parts
 * @property-read mixed $country_id
 * @property-read mixed $municipality_id
 * @method static Builder|HCStreets whereCityId($value)
 * @method static Builder|HCStreets whereCount($value)
 * @method static Builder|HCStreets whereCreatedAt($value)
 * @method static Builder|HCStreets whereDeletedAt($value)
 * @method static Builder|HCStreets whereId($value)
 * @method static Builder|HCStreets whereName($value)
 * @method static Builder|HCStreets whereTranslationKey($value)
 * @method static Builder|HCStreets whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCStreets extends HCUuidModel
{
    use HCCityTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_streets';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'city_id',
        'name',
        'translation_key',
    ];

    /**
     * Appendable attributes
     *
     * @var array
     */
    protected $appends = [
        'municipality_id',
        'country_id',
        'city',
    ];

    /**
     * Getting manucipality id attribute
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

    /**
     * List of city parts assigned to the streets
     *
     * @return mixed
     */
    public function city_parts()
    {
        return $this->belongsToMany(HCCityParts::class, HCCityPartsStreetConnections::getTableName(), 'street_id',
            'city_part_id');
    }
}
