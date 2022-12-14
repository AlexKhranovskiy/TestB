<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Collection;

class HierarchyCreatorService
{
    private array $hierarchy;

    public function __construct(
        private int $employeesCount,
        private int $hierarchyLevels
    )
    {
    }

    public function set(Collection $usersFromFactory)
    {
        $hierarchy = [];
        $u = $this->userReader($usersFromFactory);

        foreach ($this->shaper($this->hierarchyLevels) as $f) {
            for ($i = 0; $i < $f; $i++) {
                $c = $u->current();
                $hierarchy[$f][$i] = $c->id;
                $u->next();
            }
        }
        $lastDirectorsLevel = end($hierarchy);

        $buf = [];
        $count = 0;
        foreach ($hierarchy as $item) {
            if (count($item) == 1) {
                $user = $usersFromFactory->find($count);
                $buf[$count] = $item;
            } elseif (count($item) == 2) {
                $buf[$count] = $item;
            } else {
                foreach (array_chunk($item, 2) as $value) {
                    $buf[$count] = $value;
                    $count++;
                }
                continue;
            }
            $count++;
        }
        $hierarchy = $buf;
        unset($buf);

        $executorsCount = $this->employeesCount - end($lastDirectorsLevel) + 1;
        $lastDirectorsLevelCount = count($lastDirectorsLevel);
        if ($executorsCount % $lastDirectorsLevelCount) {
            $executorsCountInGroup = intdiv($executorsCount, $lastDirectorsLevelCount) + 1;
        } else {
            $executorsCountInGroup = intdiv($executorsCount, $lastDirectorsLevelCount);
        }
        $i = 0;
        $executors = [];
        while ($u->valid()) {
            $c = $u->current();
            $executors[] = $c->id;
            $i++;
            if ($i == $executorsCountInGroup) {
                $i = 0;
                array_push($hierarchy, $executors);
                unset($executors);
            }
            $u->next();
        }
        $this->hierarchy = $hierarchy;
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

    public function hierarchy()
    {
        return $this->hierarchy;
    }

    public function getDirectorByExecutorId(int $id)
    {
        foreach ($this->hierarchy as $key => $item){
            if(in_array($id, $item)){
                return $key;
            }
        }
    }
}
