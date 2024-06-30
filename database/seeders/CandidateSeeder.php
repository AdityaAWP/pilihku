<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('candidates')->insert([
            [
                'voting_session_id' => 2, // Pastikan ID ini ada di tabel voting_sessions
                'name' => 'Aditya Herdiansyah Putra',
                'photo' => 'images/Adit.png',
                'bio' => 'Mewujudkan Himpunan Mahasiswa Teknik Informatika sebagai Himpunan yang berdedikasi tinggi terhadap instansi serta menciptakan wadah guna mempersiapkan Mahasiswa Teknik Informatika yang kritis, harmonis dan profesional.01 Menyediakan ruang untuk pengembangan keterampilan dan pengetahuan dalam lingkup Teknik Informatika 02 Memberikan wadah untuk pengembangan moral dan profesional dalam lingkup HMTI 03 Menjalin komunikasi yang efektif serta terbuka antara anggota dan pengurus, baik secara internal maupun eksternal.',
                'candidate_no' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'voting_session_id' => 2, // Pastikan ID ini ada di tabel voting_sessions
                'name' => 'Dwi Prakoso',
                'photo' => 'images/Dwi.png',
                'bio' => 'Mewujudkan HMTI sebagai tempat Berkembang dan Bertumbuh bagi anggotanya dengan rasa  kekeluargaan yang kuat tanpa mengesampingkan sikap profesionalisme dan bertanggung jawab serta memberikan peran dalam kemajuan Program Studi Teknik Informatika.',
                'candidate_no' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
