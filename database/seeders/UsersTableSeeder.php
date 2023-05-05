<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;
use DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*
        DB::table('users')->insert([
            'name' => 'Franco',
            'email' => 'franco_33.33@hotmail.com',
            'password' => 'secret',
        ]);

        for ($i=0; $i < 10; $i++) { 
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10) . '@isft38.edu.ar',
                'password' => bcrypt('secret'),
            ]);
        }
        */
        User::factory()->count(5)->create();
    }
}
