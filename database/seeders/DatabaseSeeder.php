<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use App\Services\HierarchyCreatorService;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(HierarchyCreatorService $hierarchyCreatorService)
    {
        $users = User::factory(env('EMPLOYEES_COUNT'))->create();
        $hierarchyCreatorService->set($users);

        Position::factory(2)->create();

        foreach ($users as $u) {
            Employee::factory(1)->create(['author_email' => $u->email,
                    'director' => serialize($hierarchyCreatorService->getDirectorByExecutorId($u->id))
                ]);
        }
    }
}
