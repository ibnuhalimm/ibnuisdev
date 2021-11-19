<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        User::create([
            'name' => 'Ibnu Halim Mustofa',
            'username' => 'ibnu',
            'email' => 'ibnuhalimm@gmail.com',
            'password' => bcrypt('1234'),
        ]);
    }
}
