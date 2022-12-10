<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use function Database\Seeders\func;
use function Database\Seeders\userReader;

class testb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:b';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function func($levels)
    {
        for ($i = 0; $i < $levels; $i++) {
            yield pow(2, $i);
        }
    }

    public function userReader($users)
    {
        foreach ($users as $user) {
            yield $user;
        }
    }

    public function executorsGrouper(&$executorsCount, $groupsCount)
    {
        if($executorsCount % $groupsCount) {
            $executorsCountInGroup = intdiv($executorsCount, $groupsCount) + 1;
        } else {
            $executorsCountInGroup = intdiv($executorsCount, $groupsCount);
        }
        $i = 0;
        $executors = [];
        $groups = [];
        while ($executorsCount > 0) {
            $executors[] = $executorsCount--;
            $i++;
            if ($i == $executorsCountInGroup) {
                $i = 0;
                $groups[] = $executors;
                unset($executors);
            }
        }
        return $groups;
    }

    public function handle()
    {
        $employeesCount = 500;
        $users = User::factory($employeesCount)->create();


        $directors = [];
        $u = $this->userReader($users);

        foreach ($this->func(5) as $f) {
            for ($i = 0; $i < $f; $i++) {
                $c = $u->current();
                $directors[$f][$i] = $c->id;
                $u->next();
            }
        }

        $lastDirectorsLevelCount = end($directors);
        $executorsCount = $employeesCount - end($lastDirectorsLevelCount);
       //dd(key($directors));
        $a = $this->executorsGrouper($executorsCount, key($directors));
        var_dump($a);

        return Command::SUCCESS;
    }
}
