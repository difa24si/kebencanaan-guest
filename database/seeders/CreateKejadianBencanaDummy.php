<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreateKejadianBencanaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $jenisBencana = [
            'Banjir',
            'Kebakaran',
            'Tanah Longsor',
            'Angin Puting Beliung',
            'Gempa Bumi',
            'Kekeringan',
            'Abrasi',
            'Gelombang Tinggi',
        ];

        $status = ['Ringan', 'Sedang', 'Berat', 'Selesai'];

        for ($i = 1; $i <= 10; $i++) {
            DB::table('kejadian_bencana')->insert([
                'jenis_bencana'   => $faker->randomElement($jenisBencana),
                'tanggal'         => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d'),
                'lokasi_text'     => $faker->streetName . ', ' . $faker->city,
                'rt'              => $faker->numberBetween(1, 10),
                'rw'              => $faker->numberBetween(1, 10),
                'dampak'          => $faker->sentence(10),
                'status_kejadian' => $faker->randomElement($status),
                'keterangan'      => $faker->paragraph(2),
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }
}
