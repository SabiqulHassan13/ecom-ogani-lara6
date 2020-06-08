<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Illuminate\Support\Str;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Admin::create([
            'name'              =>  "Site Admin",
            'email'             =>  'admin@admin.com',
            'email_verified_at' =>  now(),
            'password'          =>  bcrypt('password'),
            'remember_token'    =>  Str::random(10),

        ]);

    }
}
