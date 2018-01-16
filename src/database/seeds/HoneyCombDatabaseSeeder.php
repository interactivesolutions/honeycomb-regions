<?php
declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\database\seeds;

use Illuminate\Database\Seeder;

/**
 * Class HoneyCombDatabaseSeeder
 * @package interactivesolutions\honeycombregions\database\seeds
 */
class HoneyCombDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(ContinentsSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(MunicipalitiesSeeder::class);
    }
}
