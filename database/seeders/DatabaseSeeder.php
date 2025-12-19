<?php
namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name'     => 'admin',
            'email'    => 'dipa@gmail.com',
            'password' => Hash::make('dipafarel'),
            'role'     => 'admin',
        ]);

        $this->call([
            WargaSeeder::class,
            UserSeeder::class,
            PoskoBencanaSeeder::class,
            KejadianBencanaSeeder::class,
            CreatePoskoBencana::class,
            CreateKejadianBencanaSeeder::class,
            CreateFirstUser::class,
        ]);
    }
}
