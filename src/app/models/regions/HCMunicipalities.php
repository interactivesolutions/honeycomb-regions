<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;
use interactivesolutions\honeycombregions\app\models\traits\HCCountryTrait;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCMunicipalities
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $country_id
 * @property string $name
 * @property string|null $translation_key
 * @property-read HCCountries $country
 * @property-read string $translation
 * @method static Builder|HCMunicipalities whereCount($value)
 * @method static Builder|HCMunicipalities whereCountryId($value)
 * @method static Builder|HCMunicipalities whereCreatedAt($value)
 * @method static Builder|HCMunicipalities whereDeletedAt($value)
 * @method static Builder|HCMunicipalities whereId($value)
 * @method static Builder|HCMunicipalities whereName($value)
 * @method static Builder|HCMunicipalities whereTranslationKey($value)
 * @method static Builder|HCMunicipalities whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCMunicipalities extends HCUuidModel
{
    use HCCountryTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_municipalities';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'country_id',
        'name',
        'translation_key',
    ];

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
    public function getTranslationAttribute(): string
    {
        return trans($this->translation_key);
    }

}
