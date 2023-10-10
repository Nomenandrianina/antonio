<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Supprimez les enregistrements existants dans la table users
        DB::table('users')->truncate();
        //Inserer les users 
        DB::table('users')->insert([
            [
                'name' => 'Test 1',
                'email' => 'test1@example.com',
                'password' => '123456',
                'role' => 'admin',
            ],
            [
                'name' => 'Test 2',
                'email' => 'test2@example.com',
                'password' => '123456',
                'role' => 'user',
            ],
            [
                'name' => 'Test 3',
                'email' => 'test3@example.com',
                'password' => '123456',
                'role' => 'admin',
            ],
        ]);
    }
}
