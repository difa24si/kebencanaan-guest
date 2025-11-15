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


        $kejadianIDs = DB::table('kejadian_bencana')->pluck('kejadian_id')->toArray();

       
        if (empty($kejadianIDs)) {
            return;
        }

        for ($i = 1; $i <= 15; $i++) {
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
