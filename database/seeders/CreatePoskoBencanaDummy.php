<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CreatePoskoBencanaDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // Ambil semua kejadian_id dari tabel kejadian_bencana
        $kejadianIDs = DB::table('kejadian_bencana')->pluck('kejadian_id')->toArray();

        // Kalau kosong, hentikan
        if (empty($kejadianIDs)) {
            return;
        }

        // Jumlah data acak antara 30 - 100
        $jumlahData = rand(30, 100);

        for ($i = 1; $i <= $jumlahData; $i++) {
            DB::table('posko_bencana')->insert([
                'kejadian_id'       => $faker->randomElement($kejadianIDs),
                'nama'              => 'Posko ' . $faker->citySuffix,
                'alamat'            => $faker->address,
                'kontak'            => $faker->phoneNumber,
                'penanggung_jawab'  => $faker->name,
                'foto'              => 'foto_posko/dummy_' . $i . '.jpg', // dummy file name
                'created_at'        => now(),
                'updated_at'        => now(),
            ]);
        }
    }
}
