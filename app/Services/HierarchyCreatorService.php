<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class HierarchyCreatorService
{
    private $result;

    public function __construct(
        private int $employeesCount,
        private int $hierarchyLevels
    )
    {}

    public function set(Collection $usersFromFactory)
    {
        $directors = [];
        $u = $this->userReader($usersFromFactory);

        foreach ($this->shaper($this->hierarchyLevels) as $f) {
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



        $executorsCount = $this->employeesCount - end($lastDirectorsLevel) + 1;
        $lastDirectorsLevelCount = count($lastDirectorsLevel);
        $a = $this->executorsGrouper($executorsCount, $lastDirectorsLevelCount, $u);
        array_push($directors, $a);
        $this->result = $directors;

    }

    private function shaper($levels)
    {
        for ($i = 0; $i < $levels; $i++) {
            yield pow(2, $i);
        }
    }

    private function userReader($users)
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

    public function result()
    {
        return $this->result;
    }
}
