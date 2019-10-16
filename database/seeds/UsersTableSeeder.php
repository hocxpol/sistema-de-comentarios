<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Sistema\Users;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('test'),
            'type' => '0',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'avatar' => 'default.jpg',
        ]);
        factory(Sistema\User::class, 6)->create()->each(function ($u) {
          $u->save();
      });
    }
}
