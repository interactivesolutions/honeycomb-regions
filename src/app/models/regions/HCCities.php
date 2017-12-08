<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\traits\HCCountryTrait;
use interactivesolutions\honeycombregions\app\models\traits\HCMunicipalityTrait;

/**
 * Class HCCities
 *
 * @package interactivesolutions\honeycombregions\app\models\regions
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $municipality_id
 * @property string $name
 * @property string|null $translation_key
 * @property string $country_id
 * @property-read HCCountries $country
 * @property-read HCMunicipalities $municipality
 * @method static Builder|HCCities whereCount($value)
 * @method static Builder|HCCities whereCountryId($value)
 * @method static Builder|HCCities whereCreatedAt($value)
 * @method static Builder|HCCities whereDeletedAt($value)
 * @method static Builder|HCCities whereId($value)
 * @method static Builder|HCCities whereMunicipalityId($value)
 * @method static Builder|HCCities whereName($value)
 * @method static Builder|HCCities whereTranslationKey($value)
 * @method static Builder|HCCities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
    protected $fillable = [
        'id',
        'country_id',
        'municipality_id',
        'name',
        'translation_key',
    ];
}
