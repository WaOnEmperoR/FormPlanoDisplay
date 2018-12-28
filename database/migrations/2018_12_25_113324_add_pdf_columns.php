<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPdfColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('p_d_f_files', function($table) {
            $table->integer('tps_num');
            $table->integer('c1_plano_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('p_d_f_files', function($table) {
            $table->dropColumn('tps_num');
            $table->dropColumn('c1_plano_type');
        });
    }
}
