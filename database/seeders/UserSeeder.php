<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::factory()->count(100)->create();
        $user = \App\Models\User::find(1);
        $user->name = 'xiao';
        $user->email = 'x876565510@163.com';
        $user->password =bcrypt('876565510');
        $user->is_admin = true;
        $user->save();
        $user = \App\Models\User::find(2);
        $user->name = '聆听zhe';
        $user->email = '2739257516@qq.com';
        $user->password =bcrypt('2739257516');
        $user->is_admin = true;
        $user->save();
        $user = \App\Models\User::find(3);
        $user->name = 'admin';
        $user->email = 'admin@qq.com';
        $user->password =bcrypt('admin666');
        $user->save();
    }
}
