<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkTableCarsTableBrands extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');
        });

        Schema::table('modelos', function (Blueprint $table) {
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->dropForeign('cars_modelo_id_foreign');
        });

        Schema::table('models', function (Blueprint $table) {
            $table->dropForeign('modelos_brand_id_foreign');
        });
    }
}
