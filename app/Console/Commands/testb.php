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

    public function executorsGrouper(&$executorsCount, $groupsCount, $u)
    {
        if ($executorsCount % $groupsCount) {
            $executorsCountInGroup = intdiv($executorsCount, $groupsCount) + 1;
        } else {
            $executorsCountInGroup = intdiv($executorsCount, $groupsCount);
        }
        $i = 0;
        $executors = [];
        $groups = [];
        while ($u->valid()) {
            $c = $u->current();
            $executors[] = $c->id;
            $i++;
            if ($i == $executorsCountInGroup) {
                $i = 0;
                $groups[$groupsCount] = $executors;
                unset($executors);
                $groupsCount++;
            }
            $u->next();
        }
        return $groups;
    }

    public function handle()
    {
        $employeesCount = 140;
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
        $lastDirectorsLevel = end($directors);

        $buf = [];
        $count = 0;
        foreach ($directors as $director) {
            if (count($director) == 1) {
                $buf[$count] = $director;
            } elseif (count($director) == 2) {
                $buf[$count] = $director;
            } else {
                foreach (array_chunk($director, 2) as $item) {
                    $buf[$count] = $item;
                    $count++;
                }
                continue;
            }
            $count++;
        }
        $directors= $buf;
        unset($buf);



        $executorsCount = $employeesCount - end($lastDirectorsLevel) + 1;
        $lastDirectorsLevelCount = count($lastDirectorsLevel);
        $a = $this->executorsGrouper($executorsCount, $lastDirectorsLevelCount, $u);
        array_push($directors, $a);
        var_dump($directors);

        return Command::SUCCESS;
    }
}
