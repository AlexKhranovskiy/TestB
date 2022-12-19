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

        $positions = Position::factory(4)->create();

        foreach ($users as $user) {
            $director = $hierarchyCreatorService->getDirectorByExecutorId($user->id);
            Employee::factory(1)->create([
                'author_email' => $user->email,
                'director' => serialize($director),
                'is_director' => $hierarchyCreatorService->isNode($user->id) ? 1 : 0,
                'position_id' => rand(1, count($positions))
            ]);
        }
    }
}
