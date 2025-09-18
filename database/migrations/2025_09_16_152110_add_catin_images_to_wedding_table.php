<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCatinImagesToWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wedding', function (Blueprint $table) {
            $table->string('image_catin_1')->nullable()->after('bio_catin_2');
            $table->string('image_catin_2')->nullable()->after('image_catin_1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wedding', function (Blueprint $table) {
            //
        });
    }
}
