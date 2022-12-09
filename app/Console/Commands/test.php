<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:a';

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

    function foo(&$countOfEmployees)
    {
        $arr = [];
        $count = 1;
        while ($countOfEmployees > 0) {
            for ($i = 1; $i <= $countOfEmployees; $i++) {
                $arr[$count][] = --$countOfEmployees;
                if ($count == 5) {
                    $count = 1;
                    yield $arr;
                    unset($arr);
                    break;
                }
                $count++;
            }
        }
    }


    public function handle()
    {
        function bar(array $arr, $empl)
        {
            next($arr);
            while (current($arr)) {
                for ($i = 0; $i <= count($arr) - 1; $i++){
                    $buf[current($arr)][] = $empl--;
                }
                next($arr);
            }
            return $buf;
        }

        $e = 5000;

        $q = bar([1, 2, 3, 4, 5], $e);
//        $arr = [];
//        foreach ($this->foo($e) as $f){
//            $arr[] = $f;
//        }
//
//        foreach ($arr as $item){
//
//        }
        var_dump($q);

        return Command::SUCCESS;
    }
}
