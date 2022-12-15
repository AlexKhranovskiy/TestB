<?php

namespace App\Console\Commands;

use App\Models\Employee;
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




    public function handle()
    {
        $employees = Employee::find(2);
        var_dump($employees->position->name);
        return Command::SUCCESS;
    }
}
