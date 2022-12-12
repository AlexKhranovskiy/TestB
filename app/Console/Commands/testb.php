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
    public function t($arr): array
    {
        $buf = [];
        $count = 0;
        foreach ($arr as $key => $value) {
            if (count($value) == 1) {
                $buf[$count] = $value;
            } elseif (count($value) == 2) {
                $buf[$count] = $value;
            } else {
                $buff = array_chunk($value, log($key, 2));
                foreach ($buff as $item) {
                    var_dump('value=',$value);
                    var_dump('item=',$item);
                    //var_dump($item);
                    $buf[$count] = $item;
                    $count++;
                }
                continue;
            }
            $count++;
        } exit;
        return $buf;
    }

    public function func($levels)
    {
        //yield 0;
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
        $employeesCount = 60;
        $users = User::factory($employeesCount)->create();


        $directors = [];
        $u = $this->userReader($users);
        $c = null;
        $k = $this->func(5);
        //$l = $k;
        while ($k->valid()) {
            $l = $k->current();
            for ($i = 0; $i < $l; $i++) {
                $c = $u->current();
                $directors[$l][$i] = $c->id;
                $u->next();
            }
            $k->next();
        }
//        foreach ($this->func(5) as $f) {
//            for ($i = 0; $i < $f; $i++) {
//                var_dump($f);
//                $c = $u->current();
//                $directors[$f][$i] = $c->id;
//                $u->next();
//            }
//        }
        //exit;
        $lastDirectorsLevel = end($directors);
        $executorsCount = $employeesCount - end($lastDirectorsLevel) + 1;
        $lastDirectorsLevelCount = count($lastDirectorsLevel);
        $a = $this->executorsGrouper($executorsCount, $lastDirectorsLevelCount, $u);
        var_dump($this->t($directors));

        return Command::SUCCESS;
    }
}
