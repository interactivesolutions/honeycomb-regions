<?php

declare(strict_types = 1);

namespace interactivesolutions\honeycombregions\database\seeds;

use Illuminate\Database\Seeder;
use interactivesolutions\honeycombregions\app\models\regions\HCMunicipalities;
use DB;

/**
 * Class MunicipalitiesSeeder
 * @package interactivesolutions\honeycombregions\database\seeds
 */
class MunicipalitiesSeeder extends Seeder
{
    /**
     * @throws \Exception
     * @throws \Rinvex\Country\CountryLoaderException
     */
    public function run(): void
    {
        $countryIDs = getRinvexCountryIDs();
        $municipalities = [];
        $translations = [];
        $enTranslation = [];

        foreach ($countryIDs as $id) {
            $divisions = country($id)->getDivisions();

            if ($divisions && sizeof($divisions) != 0) {
                foreach ($divisions as $key => $division) {
                    if ($division['name'] && $division['name'] != '') {
                        $municipalities[] = [
                            'id' => strtolower($id . '-' . $key),
                            'country_id' => $id,
                            'name' => $division['name'],
                            'translation_key' => 'HCRegions::municipalities_names.' .
                                createTranslationKey($id . '.' . $key),
                        ];
                    }
                    $translations[$id][strtolower($id . '.' . $key)] = $division['name'];
                }
            }
        }
        DB::beginTransaction();

        try {
            foreach ($municipalities as $municipality) {
                $existing = HCMunicipalities::find($municipality['id']);

                if ($existing) {
                    $existing->update($municipality);
                } else {
                    HCMunicipalities::create($municipality);
                }
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }

        DB::commit();
        foreach ($translations as $array) {
            foreach ($array as $key => $value) {
                $enTranslation[$key] = $value;
            }
        }

        if (!file_exists(__DIR__ . '/../../resources/lang/en')) {
            mkdir(__DIR__ . '/../../resources/lang/en');
        }

        $content = str_replace(
            ');',
            '];',
            "<?php \r\n return " .
            str_replace('array (', '[', var_export($enTranslation, true)) . ';'
        );
        file_put_contents(__DIR__ . '/../../resources/lang/en/municipalities_names.php', $content);
    }
}
