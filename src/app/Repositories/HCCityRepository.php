<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\app\Repositories;

use InteractiveSolutions\HoneycombCore\Repositories\Repository;
use interactivesolutions\honeycombregions\app\models\regions\HCCities;

/**
 * Class HCCityRepository
 * @package interactivesolutions\honeycombregions\app\Repositories
 */
class HCCityRepository extends Repository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return HCCities::class;
    }
}
