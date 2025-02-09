<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Thanh vien 01',
                    'email' => 'thanhvien01@gmail.com',
                    'password' => Hash::make('123456'),
                    'level' => 2,
                ],
                [
                    'name' => 'Thanh vien 02',
                    'email' => 'thanhvien01@gmail.com',
                    'password' => Hash::make('123456'),
                    'level' => 2,
                ],
                [
                    'name' => 'Quan tri vien',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('123456'),
                    'level' => 2,
                ],
            ]
        );
    }
}
