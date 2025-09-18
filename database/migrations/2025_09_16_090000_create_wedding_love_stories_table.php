<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wedding_love_stories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_id');
            $table->string('title');
            $table->date('date');
            $table->text('description');
            $table->string('image_path')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            
            $table->foreign('wedding_id')->references('id')->on('wedding')->onDelete('cascade');
            $table->index(['wedding_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wedding_love_stories');
    }
};