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

        $levels = 5;

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
            foreach ($users as $user) {
                $arr[] = $user;
                if(count($arr) == 2) {
                    yield $arr;
                }
            }
        }

//        foreach (userReaderBy2($users) as $item){
//            var_dump($item);
//        }
//        exit;
        $arr = [];
        $u = userReader($users);

        foreach (func($levels) as $f) {
            for ($i = 0; $i < $f; $i++) {
                $c = $u->current();
                $arr[$f][$i] = $c->id;
                $u->next();
            }
        }
        //var_dump($arr);


        //$r = userReadBy2($users);

//        $u = userReader($users);
//        foreach ($arr as $item) {
//            if(count($item) < 2) {
//                $u->current()->employee()->subordinate = serialize([0]);
//            }
//            //var_dump($item);
//        }
//        exit;
        //var_dump(func(5)->current());
//        foreach (userReader($users) as $item ){
//            var_dump($item->email);
//        }

//        var_dump(current($arr));
//        next($arr);
//        var_dump(current($arr));
//        exit;
        array_unshift($arr,[]);
        $u = userReader($users);
        $c = $u->current();

        Employee::factory(1)->create([
            'author_email' => $c->email,
            'subordinates' => serialize(current($arr)),
        ]);
        next($arr);
        $u->next();

        //$users = $users->shift();
        $u = userReaderBy2($users);
        while($u->current()){
            $c = $u->current();
            //var_dump($c); exit;
            foreach ($c as $item){
                Employee::factory(1)->create([
                    'author_email' => $item->email,
                    'subordinates' => serialize(current($arr)),
                ]);
            }
            next($arr);
            $u->next();
        }

    }
}
