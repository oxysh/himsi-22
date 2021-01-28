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

        $admin = new User();
        $admin->name = 'psdm';
        $admin->email = 'psdm';
        $admin->password = Hash::make('password');
        $admin->role = 'psdm';
        $admin->save();

        $admin = new User();
        $admin->name = 'sera';
        $admin->email = 'sera';
        $admin->password = Hash::make('password');
        $admin->role = 'sera';
        $admin->save();

        $admin = new User();
        $admin->name = 'hublu';
        $admin->email = 'hublu';
        $admin->password = Hash::make('password');
        $admin->role = 'hublu';
        $admin->save();

        $admin = new User();
        $admin->name = 'media';
        $admin->email = 'media';
        $admin->password = Hash::make('password');
        $admin->role = 'media';
        $admin->save();

        $admin = new User();
        $admin->name = 'akademik';
        $admin->email = 'akademik';
        $admin->password = Hash::make('password');
        $admin->role = 'akademik';
        $admin->save();

        $admin = new User();
        $admin->name = 'kestari';
        $admin->email = 'kestari';
        $admin->password = Hash::make('password');
        $admin->role = 'kestari';
        $admin->save();
    }
}
