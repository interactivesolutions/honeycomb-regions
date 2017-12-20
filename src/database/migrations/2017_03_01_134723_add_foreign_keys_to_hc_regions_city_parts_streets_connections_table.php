<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcRegionsCityPartsStreetsConnectionsTable
 */
class AddForeignKeysToHcRegionsCityPartsStreetsConnectionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_regions_city_parts_streets_connections', function (Blueprint $table) {
            $table->foreign('city_part_id', 'fk_hc_regions_city_parts_streets_connections_hc_regions_city_1')
                ->references('id')
                ->on('hc_regions_city_parts')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('street_id', 'fk_hc_regions_city_parts_streets_connections_hc_regions_stree1')
                ->references('id')
                ->on('hc_regions_streets')
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
        Schema::table('hc_regions_city_parts_streets_connections', function (Blueprint $table) {
            $table->dropForeign('fk_hc_regions_city_parts_streets_connections_hc_regions_city_1');
            $table->dropForeign('fk_hc_regions_city_parts_streets_connections_hc_regions_stree1');
        });
    }

}
