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
        $employeesCount = 50;
        $users = User::factory($employeesCount)->create();
        Position::factory(2)->create();

        //$levels = 5;

        function func($levels)
        {
            for ($i = 0; $i < $levels; $i++) {
                yield pow(2, $i);
            }
        }

        function userReader($users)
        {
            foreach ($users as $user) {
                yield $user;
            }
        }

        function userReaderBy2($users)
        {
            $arr = [];
            foreach ($users as $user) {
                $arr[] = $user;
                if (count($arr) == 2) {
                    yield $arr;
                    unset($arr);
                }
            }
        }

//        foreach (userReaderBy2($users) as $item){
//            var_dump($item);
//        }
//        exit;
        $arr = [];
        $u = userReader($users);

        foreach (func(5) as $f) {
            for ($i = 0; $i < $f; $i++) {
                $c = $u->current();
                $arr[$f][$i] = $c->id;
                $u->next();
            }
        }
        //var_dump($arr);

        function foo(array $arr, bool $none = false, bool $one = false)
        {
            if ($none === true) {
                yield [];
            }
            if ($one === true) {
                yield $arr;
            }
            if ($one === false && $none === false) {
                yield current($arr);
                next($arr);
                while (current($arr) !== end($arr)) {
                    $buf[] = current($arr);
                    next($arr);
                    $buf[] = current($arr);
                    yield $buf;
                    unset($buf);
                }
            }
        }


        function bar(array $arr)
        {
            //foreach ($arr as $key => $item) {
                var_dump(current($arr));
//                if ($key == 1) {
//                    //var_dump($item);
//                    $f = foo($item, none: true);
//                    $f->current();
//                    $f->next();
//                }
//                if ($key == 2) {
//                   // var_dump($item);
//                    $f = foo($item, one: true);
//                    $f->current();
//                    $f->next();
//                }
//                if ($key > 2) {
//                    var_dump($item);
//                    $f = foo($item);
//                    $f->current();
//                    $f->next();
//                }
                yield current($arr);            //}

            //if ($f->valid()) {

            //}


        }


        foreach ($users as $u) {
//            foreach ($u as $item) {
            $b = bar($arr);
            $e = $b->current();
            $e->next();
            //var_dump(current($b));
            Employee::factory(1)->create(['author_email' => $u->email,
                'subordinates' => serialize([$e])
            ]);

            //}
            //}

        }
    }
}
