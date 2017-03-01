<?php
namespace interactivesolutions\honeycombregions\database\seeds;

use DB;
use Illuminate\Database\Seeder;
use interactivesolutions\honeycombregions\app\models\regions\HCContinents;

class ContinentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = getRinvexCountryIDs();
        $continents = [];

        foreach ($ids as $id)
            $continents = array_merge($continents, country($id)->getGeodata()['continent']);

        $continents = array_unique($continents);

        DB::beginTransaction();

        try
        {
            foreach ($continents as $key => $value)
            {
                $record = HCContinents::find($key);

                if (!$record)
                    HCContinents::create(['id' => $key, 'translation_key' => 'HCRegions::regions_continents.continent.' . createTranslationKey($value)]);
            }
        } catch (\Exception $e)
        {
            DB::rollback();
            //TODO throw exception
        }

        DB::commit();
    }
}