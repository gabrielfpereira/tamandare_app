<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name'=> 'Gabriel',
            'username'=> 'Gabriel',
            'email'=> 'gabriel@gpsistema.com',
            'password'=> bcrypt('soamar'),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'name'=> 'Divino',
            'username'=> 'Divino',
            'email'=> 'divino@gpsistema.com',
            'password'=> bcrypt('soamar'),
            'email_verified_at'=> now(),
        ]);

        DB::table('users')->insert([
            'name'=> 'André',
            'username'=> 'Andre',
            'email'=> 'andre@gpsistema.com',
            'password'=> bcrypt('soamar'),
            'email_verified_at'=> now(),
        ]);

    }
}
