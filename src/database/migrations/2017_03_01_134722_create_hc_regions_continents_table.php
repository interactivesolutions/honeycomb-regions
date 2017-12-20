<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateHcRegionsContinentsTable
 */
class CreateHcRegionsContinentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('hc_regions_continents', function (Blueprint $table) {
            $table->integer('count', true);
            $table->string('id', 36)->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->string('translation_key');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('hc_regions_continents');
    }

}
