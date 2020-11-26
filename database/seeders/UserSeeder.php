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
        $user->email = 'xiao1234@qq.com';
        $user->password =bcrypt('xiao666');
        $user->save();
    }
}
