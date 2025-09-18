<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationAndBankFieldsToWeddingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wedding', function (Blueprint $table) {
            $table->string('google_maps_url')->nullable()->after('party_address');
            $table->string('waze_url')->nullable()->after('google_maps_url');
            $table->string('bank_account')->nullable()->after('waze_url');
            $table->string('bank_name')->nullable()->after('bank_account');
            $table->string('account_holder')->nullable()->after('bank_name');
            $table->string('present_counter')->nullable()->after('account_holder');
            $table->string('not_present_counter')->nullable()->after('present_counter');
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
            $table->dropColumn([
                'email',
                'google_maps_url',
                'waze_url',
                'bank_account',
                'bank_name',
                'account_holder'
            ]);
        });
    }
}