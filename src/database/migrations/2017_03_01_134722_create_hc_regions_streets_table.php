<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcRegionsStreetsTable
 */
class CreateHcRegionsStreetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_regions_streets', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('city_id', 36)
                ->index('fk_hc_regions_streets_hc_regions_cities1_idx');
            $table->string('name');
            $table->string('translation_key')->nullable();
            $table->unique(['id', 'city_id'], 'region_street_id_city_id');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_regions_streets');
    }

}
