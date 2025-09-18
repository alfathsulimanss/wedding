<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('congratulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wedding_id')->constrained('wedding')->onDelete('cascade');
            $table->foreignId('invited_id')->constrained('invitation_list')->onDelete('cascade');
            $table->string('name');
            $table->text('message');
            $table->timestamps();
            
            $table->unique(['wedding_id', 'invited_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('congratulations');
    }
};