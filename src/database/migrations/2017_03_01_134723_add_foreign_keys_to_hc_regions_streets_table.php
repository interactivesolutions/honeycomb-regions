<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcRegionsStreetsTable
 */
class AddForeignKeysToHcRegionsStreetsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_regions_streets', function (Blueprint $table) {
            $table->foreign('city_id', 'fk_hc_regions_streets_hc_regions_cities1')
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
        Schema::table('hc_regions_streets', function (Blueprint $table) {
            $table->dropForeign('fk_hc_regions_streets_hc_regions_cities1');
        });
    }

}
