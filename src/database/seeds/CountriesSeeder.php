<?php
namespace interactivesolutions\honeycombregions\database\seeds;

use DB;
use Illuminate\Database\Seeder;
use interactivesolutions\honeycomblanguages\app\models\HCLanguages;
use interactivesolutions\honeycombregions\app\models\regions\HCCountries;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        $countryIDs = getRinvexCountryIDs();
        $translations = [];

        foreach ($countryIDs as $id) {
            $country = country($id);

            foreach (country($id)->getTranslations() as $key => $value) {
                $languageCode = HCLanguages::where('iso_639_2', $key)->first()['iso_639_1'];
                if (!$languageCode)
                    continue;

                if (!isset($translations[$languageCode]))
                    $translations[$languageCode] = [];

                $translations[$languageCode][$id] = $value['common'];
            }

            $countries[] =
                [
                    'id'                => $id,
                    'region_id'         => strtolower(array_keys($country->get('geo.continent'))[0]),
                    'common_name'       => $country->getName(),
                    'official_name'     => $country->getOfficialName(),
                    'translation_key'   => 'HCRegions::country_names.' . createTranslationKey($id), //TODO update key
                    'iso_3166_1_alpha2' => strtolower($country->getIsoAlpha2()),
                    'iso_3166_1_alpha3' => strtolower($country->getIsoAlpha3()),
                    'flag_id'           => null, //TODO upload file to HCResource pacakge
                    'geo_data'          => '', //TODO file with geo data
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s')
                ];
        }

        DB::beginTransaction();

        try {
            $countries = collect($countries);
            $chunks = $countries->chunk(100);

            foreach ($chunks as $chunk)
                HCCountries::insert($chunk->toArray());

        } catch (\Exception $e) {

            DB::rollback();
            throw new \Exception($e);
        }

        DB::commit();

        foreach ($translations as $key => $value) {
            if (!file_exists(__DIR__ . './../../resources/lang/' . $key))
                mkdir(__DIR__ . './../../resources/lang/' . $key);

            $content = str_replace(');', '];', "<?php \r\n return " . str_replace('array (', '[', var_export($value, true)) . ';');
            file_put_contents(__DIR__ . './../../resources/lang/' . $key . '/country_names.php', $content);
        }
    }
}