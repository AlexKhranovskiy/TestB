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
//        \App\Models\User::factory()->create([
//            'email' => 'alex@example.com',
//            'email_verified_at' => now(),
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'remember_token' => Str::random(10),
//            'role' => 1 //Admin
//        ]);

        $users = User::factory(5)->create();
        Position::factory(2)->create();

        $users->each(function (User $user) {
            Employee::factory(1)->create(['author_email' => $user->email]);
        });
        //$users->employee()->save();

//        $employees->each(function(Employee $employee){
//           $employee->user()->associate($employee->author_email);
//            //$employee->save();
//        });
//        $position = Position::factory()->count(5)->make();
    }
}
