<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('admins')->insert([
            'name' => Str::random(10),
            'email' => 'joão@admin.com',
            'password' =>  \Hash::make('123456'),
        ]);
    }
}
