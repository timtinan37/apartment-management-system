<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\{
	DB,
	Hash
};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
            	'id' => 1,
            	'name' => 'Super Admin',
            	'email' => 'superAdmin@example.com',
            	'email_verified_at' => now(),
            	'password' => Hash::make('password'),
            	'created_at' => now(),
            	'updated_at' => now(),
            ],
        ]);
        
        factory(App\Models\User::class, 10)->create();
    }
}
