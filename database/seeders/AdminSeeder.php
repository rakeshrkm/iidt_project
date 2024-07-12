<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name="Admin";
        $user->email="rakeshkrmaurya12@gmail.com";
        $user->password=Hash::make('Admin#24');
        $user->save();
    }
}
