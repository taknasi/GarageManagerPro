<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrateur',
            'user_name'  =>  'superAdmin',
            'profil'  =>  'superAdmin',
            'password' =>  bcrypt('0160')
        ]);
        $user = User::create([
            'name' => 'Mr Tawfik',
            'user_name'  =>  'admin',
            'profil'  =>  'Admin',
            'password' =>  bcrypt('123')
        ]);
    }
}
