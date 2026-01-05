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
            'email'    => 'difamardiani48@gmail.com',
            'role'     => 'admin',
            'password' => Hash::make('difafarel'),
        ]);
    }
}
