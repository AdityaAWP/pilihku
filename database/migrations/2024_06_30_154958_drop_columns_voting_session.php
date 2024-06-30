<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('voting_sessions', function (Blueprint $table) {
            if (Schema::hasColumn('voting_sessions', 'campaign_start')) {
                $table->dropColumn('campaign_start');
            }

            if (Schema::hasColumn('voting_sessions', 'year')) {
                $table->dropColumn('year');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
