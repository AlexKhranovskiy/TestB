<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $users = User::factory(50)->create();
        Position::factory(2)->create();

        foreach ($users as $user){
            Employee::factory(1)->create(['author_email' => $user->email]);
        }
//        $users->each(function (User $user) {
//            Employee::factory(1)->create(['author_email' => $user->email]);
//        });
    }
}
