<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcRegionsCityPartsStreetsConnectionsTable
 */
class CreateHcRegionsCityPartsStreetsConnectionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_regions_city_parts_streets_connections', function (Blueprint $table) {
            $table->integer('count', true);
            $table->timestamps();
            $table->string('street_id', 36)
                ->index('fk_hc_regions_city_parts_streets_connections_hc_regions_stree1');
            $table->string('city_part_id', 36)
                ->index('fk_hc_regions_city_parts_streets_connections_hc_regions_cit_idx');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_regions_city_parts_streets_connections');
    }

}
