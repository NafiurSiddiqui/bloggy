<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestPendingUsers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        //create two users factory with role => author, password => asdf1234, status => pending
        User::factory()->count(2)->create([
            'role' => 'author',
            'password' => bcrypt('asdf1234'),
            'status' => 'pending',
        ]);
    }
}
