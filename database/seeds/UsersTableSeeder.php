<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'username' => '名前',
            'mail' => 'メール',
            'password' => bcrypt('パスワード')
        ]);
    }
}
