<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcRegionsMunicipalitiesTable
 */
class CreateHcRegionsMunicipalitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_regions_municipalities', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('country_id', 36)
                ->index('fk_hc_regions_municipalities_hc_regions_countries1_idx');
            $table->string('name');
            $table->string('translation_key')->nullable();
            $table->unique(['id', 'country_id'], 'region_municipality_id_country_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_regions_municipalities');
    }

}
