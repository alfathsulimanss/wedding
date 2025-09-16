<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('catin_1');
            $table->string('catin_2');
            $table->string('bio_catin_1');
            $table->string('bio_catin_2');
            $table->string('ayah_catin1');
            $table->string('ibu_catin1');
            $table->string('ayah_catin2');
            $table->string('ibu_catin2');
            $table->dateTime('reception');
            $table->string('reception_address');
            $table->dateTime('ceremony');
            $table->string('ceremony_address');
            $table->dateTime('party');
            $table->string('party_address');
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
        Schema::dropIfExists('wedding');
    }
}
