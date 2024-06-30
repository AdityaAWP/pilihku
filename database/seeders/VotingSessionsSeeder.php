<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotingSessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('voting_sessions')->insert([
            [
                'organization_id' => 3, // Sesuaikan dengan ID yang ada di tabel organizations
                'title' => 'Session 1',
                'description' => 'This is the first voting session',
                'year' => '2024',
                'campaign_start' => now(),
                'voting_start' => now()->addDays(7),
                'voting_end' => now()->addDays(14),
                'is_enabled' => true,
                'is_finished' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
