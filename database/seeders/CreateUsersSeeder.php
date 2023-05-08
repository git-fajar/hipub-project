<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'type' => 1,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Editor Default',
                'email' => 'editor@gmail.com',
                'type' => 2,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Vendor Teknologi',
                'email' => 'vendor_teknologi@gmail.com',
                'type' => 3,
                'bidang' => 'teknologi',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Vendor Kesehatan',
                'email' => 'vendor_kesehatan@gmail.com',
                'type' => 3,
                'bidang' => 'kesehatan',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Vendor Ekonomi',
                'email' => 'vendor_ekonomi@gmail.com',
                'type' => 3,
                'bidang' => 'ekonomi',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'Vendor Umum',
                'email' => 'vendor@gmail.com',
                'type' => 3,
                'bidang' => 'umum',
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User',
                'email' => 'user@gmail.com',
                'type' => 0,
                'password' => bcrypt('123456'),
            ],
            [
                'name' => 'User2',
                'email' => 'user2@gmail.com',
                'type' => 0,
                'password' => bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
