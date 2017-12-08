<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\traits\HCCityTrait;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCCityParts
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
 * @property-read mixed $country_id
 * @property-read mixed $municipality_id
 * @method static Builder|HCCityParts whereCityId($value)
 * @method static Builder|HCCityParts whereCount($value)
 * @method static Builder|HCCityParts whereCreatedAt($value)
 * @method static Builder|HCCityParts whereDeletedAt($value)
 * @method static Builder|HCCityParts whereId($value)
 * @method static Builder|HCCityParts whereName($value)
 * @method static Builder|HCCityParts whereTranslationKey($value)
 * @method static Builder|HCCityParts whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
