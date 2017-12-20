<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcRegionsCitiesTable
 */
class CreateHcRegionsCitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_regions_cities', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('municipality_id', 36)->index('fk_hc_regions_cities_hc_regions_municipalities1_idx');
            $table->string('name');
            $table->string('translation_key')->nullable();
            $table->unique(['id', 'municipality_id'], 'region_city_id_municipality_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_regions_cities');
    }

}
