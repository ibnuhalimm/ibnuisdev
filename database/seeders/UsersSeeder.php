<?php

namespace Database\Seeders;

use App\Models\User;
use DB;
use Illuminate\Database\Seeder;

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
