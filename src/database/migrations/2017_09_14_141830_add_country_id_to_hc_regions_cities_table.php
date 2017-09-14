<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCountryIdToHcRegionsCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hc_regions_cities', function (Blueprint $table) {
            $table->string('country_id', 36)->index('fk_hc_regions_cities_hc_regions_countries1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hc_regions_cities', function (Blueprint $table) {
            $table->dropColumn('country_id');
        });
    }
}
