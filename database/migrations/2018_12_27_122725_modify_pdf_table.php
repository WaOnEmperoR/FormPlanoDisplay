<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyPdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_d_f_files', function(Blueprint $table) {
            $table->string('tps_num', 50)->change();
            $table->renameColumn('tps_num', 'tps_code');
            $table->integer('party_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_d_f_files', function(Blueprint $table) {
            $table->dropColumn('party_id');
            $table->integer('tps_code')->change();
            $table->renameColumn('tps_code', 'tps_num');
        });
    }
}
