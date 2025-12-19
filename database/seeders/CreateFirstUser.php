<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateFirstUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'difa',
            'email'    => 'difa24si@mahasiswa.pcr.ac.id',
            'role'     => 'admin',
            'password' => Hash::make('difafarel'),
        ]);
    }
}
