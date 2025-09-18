<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsvpResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rsvp_responses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wedding_id');
            $table->unsignedBigInteger('invited_id');
            $table->enum('attendance', ['yes', 'no']);
            $table->integer('guest_count')->nullable();
            $table->string('attending_event')->nullable();
            $table->timestamps();
            
            $table->foreign('wedding_id')->references('id')->on('wedding')->onDelete('cascade');
            $table->foreign('invited_id')->references('id')->on('invitation_list')->onDelete('cascade');
            $table->unique(['wedding_id', 'invited_id']); // Prevent duplicate responses
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rsvp_responses');
    }
}
