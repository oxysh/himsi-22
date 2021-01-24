<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'bpi';
        $admin->email = 'bpi';
        $admin->password = Hash::make('password');
        $admin->role = 'bpi';
        $admin->save();

        $admin = new User();
        $admin->name = 'ristek';
        $admin->email = 'ristek';
        $admin->password = Hash::make('password');
        $admin->role = 'ristek';
        $admin->save();
    }
}
