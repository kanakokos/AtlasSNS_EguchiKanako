<?php

namespace database\Seeds;

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
        Users::create([
            'username' => '名前',
            'mail' => 'メール',
            'password' => 'パスワード'
        ]);
    }
}
