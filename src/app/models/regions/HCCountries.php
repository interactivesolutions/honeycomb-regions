<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use InteractiveSolutions\HoneycombCore\Models\HCModel;
use interactivesolutions\honeycomblanguages\app\models\HCLanguages;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCCountries
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property string $region_id
 * @property string|null $common_name
 * @property string|null $official_name
 * @property string $translation_key
 * @property string $iso_3166_1_alpha2
 * @property string $iso_3166_1_alpha3
 * @property string|null $flag_id
 * @property mixed|null $geo_data
 * @property-read string $translation
 * @property-read Collection|HCLanguages[] $languages
 * @method static Builder|HCCountries whereCommonName($value)
 * @method static Builder|HCCountries whereCount($value)
 * @method static Builder|HCCountries whereCreatedAt($value)
 * @method static Builder|HCCountries whereDeletedAt($value)
 * @method static Builder|HCCountries whereFlagId($value)
 * @method static Builder|HCCountries whereGeoData($value)
 * @method static Builder|HCCountries whereId($value)
 * @method static Builder|HCCountries whereIso31661Alpha2($value)
 * @method static Builder|HCCountries whereIso31661Alpha3($value)
 * @method static Builder|HCCountries whereOfficialName($value)
 * @method static Builder|HCCountries whereRegionId($value)
 * @method static Builder|HCCountries whereTranslationKey($value)
 * @method static Builder|HCCountries whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
    protected $fillable = [
        'id',
        'region_id',
        'common_name',
        'official_name',
        'translation_key',
        'iso_3166_1_alpha2',
        'iso_3166_1_alpha3',
        'flag_id',
        'geo_data',
    ];
    /**
     * The attributes that are hidden
     *
     * @var array
     */
    protected $hidden = ['translation_key', 'geo_data'];
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

    /**
     * List of languages assigned to the country
     *
     * @return BelongsToMany
     */
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(
            HCLanguages::class,
            HCCountriesLanguagesConnections::getTableName(),
            'country_id',
            'language_id'
        )->select('id');
    }
}
