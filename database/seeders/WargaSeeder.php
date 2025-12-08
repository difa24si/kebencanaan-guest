<?php

namespace Database\Seeders;

use App\Models\Warga;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Faker Indonesia

        // Jumlah data acak antara 30 - 100
        $jumlahData = rand(30, 100);

        for ($i = 1; $i <= $jumlahData; $i++) {

            Warga::create([
                'no_ktp' => $faker->unique()->numerify('################'), // 16 digit random
                'nama'   => $faker->name,
                'gender' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'agama'  => $faker->randomElement([
                    'Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'
                ]),
                'pekerjaan' => $faker->randomElement([
                    'Petani', 'Karyawan Swasta', 'Wirausaha', 'PNS',
                    'Guru', 'Mahasiswa', 'Tidak Bekerja'
                ]),
                'phone'  => $faker->phoneNumber,
                'email'  => $faker->unique()->safeEmail(),
            ]);
        }
    }
}
