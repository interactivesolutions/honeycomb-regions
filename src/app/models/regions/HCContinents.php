<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\models\regions;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use InteractiveSolutions\HoneycombCore\Models\HCUuidModel;

/**
 * interactivesolutions\honeycombregions\app\models\regions\HCContinents
 *
 * @property int $count
 * @property string $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $translation_key
 * @property-read string $name
 * @method static Builder|HCContinents whereCount($value)
 * @method static Builder|HCContinents whereCreatedAt($value)
 * @method static Builder|HCContinents whereDeletedAt($value)
 * @method static Builder|HCContinents whereId($value)
 * @method static Builder|HCContinents whereTranslationKey($value)
 * @method static Builder|HCContinents whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class HCContinents extends HCUuidModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'hc_regions_continents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
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
    protected $appends = ['name'];

    /**
     * Getting real translation
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return trans($this->translation_key);
    }
}
