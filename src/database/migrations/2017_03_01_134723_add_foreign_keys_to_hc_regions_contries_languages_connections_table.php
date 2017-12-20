<?php

declare(strict_types = 1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class AddForeignKeysToHcRegionsContriesLanguagesConnectionsTable
 */
class AddForeignKeysToHcRegionsContriesLanguagesConnectionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('hc_regions_contries_languages_connections', function (Blueprint $table) {
            $table->foreign('language_id', 'fk_hc_regions_contries_languages_connections_hc_languages1')
                ->references('id')
                ->on('hc_languages')
                ->onUpdate('NO ACTION')
                ->onDelete('NO ACTION');
            $table->foreign('country_id', 'fk_hc_regions_contries_languages_connections_hc_regions_count1')
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
        Schema::table('hc_regions_contries_languages_connections', function (Blueprint $table) {
            $table->dropForeign('fk_hc_regions_contries_languages_connections_hc_languages1');
            $table->dropForeign('fk_hc_regions_contries_languages_connections_hc_regions_count1');
        });
    }

}
