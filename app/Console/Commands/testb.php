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

    public function handle()
    {
        $users = User::factory(50)->create();


        $arr = [];
        $u = $this->userReader($users);

        foreach ($this->func(5) as $f) {
            for ($i = 0; $i < $f; $i++) {
                $c = $u->current();
                $arr[$f][$i] = $c->id;
                $u->next();
            }
        }

        var_dump($arr);

        return Command::SUCCESS;
    }
}
