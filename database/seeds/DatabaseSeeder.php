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
        // $this->call(UserSeeder::class);
        // Empty data
        DB::table('users')->truncate();
        DB::table('articles')->truncate();

        factory('App\User')->create([
            'name' => 'Sumardi Shukor',
            'email' => 'me@sumardi.net'
            // default: password
        ]);
        factory('App\User')->times(10)->create();
        factory('App\Article')->times(100)->create();
    }
}
