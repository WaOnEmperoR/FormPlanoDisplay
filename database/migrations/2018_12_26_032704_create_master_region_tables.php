<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterRegionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_provinces', function (Blueprint $table) {
            $table->string('province_code')->primary();
            $table->string('province_name');
            $table->timestamps();
        });

        Schema::create('master_cities', function (Blueprint $table) {
            $table->string('city_code')->primary();
            $table->string('province_code');
            $table->foreign('province_code')->references('province_code')->on('master_provinces');
            $table->string('city_name');
            $table->timestamps();
        });

        Schema::create('master_districts', function (Blueprint $table) {
            $table->string('district_code')->primary();
            $table->string('city_code');
            $table->foreign('city_code')->references('city_code')->on('master_cities');
            $table->string('district_name');
            $table->timestamps();
        });

        Schema::create('master_subdistricts', function (Blueprint $table) {
            $table->string('subdistrict_code')->primary();
            $table->string('district_code');
            $table->foreign('district_code')->references('district_code')->on('master_districts');
            $table->string('subdistrict_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_subdistricts');
        Schema::dropIfExists('master_districts');
        Schema::dropIfExists('master_cities');
        Schema::dropIfExists('master_provinces');
    }
}
