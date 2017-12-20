<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcRegionsCityPartsTable
 */
class AddForeignKeysToHcRegionsCityPartsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_regions_city_parts', function (Blueprint $table) {
            $table->foreign('city_id', 'fk_hc_regions_city_parts_hc_regions_cities1')
                ->references('id')
                ->on('hc_regions_cities')
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
        Schema::table('hc_regions_city_parts', function (Blueprint $table) {
            $table->dropForeign('fk_hc_regions_city_parts_hc_regions_cities1');
        });
    }

}
