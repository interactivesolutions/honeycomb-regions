<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcRegionsMunicipalitiesTable
 */
class AddForeignKeysToHcRegionsMunicipalitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_regions_municipalities', function (Blueprint $table) {
            $table->foreign('country_id', 'fk_hc_regions_municipalities_hc_regions_countries1')
                ->references('id')
                ->on('hc_regions_countries')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('hc_regions_municipalities', function (Blueprint $table) {
            $table->dropForeign('fk_hc_regions_municipalities_hc_regions_countries1');
        });
    }

}
