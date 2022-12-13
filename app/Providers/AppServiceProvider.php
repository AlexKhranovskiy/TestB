<?php

namespace App\Providers;

use App\Services\HierarchyCreatorService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()    {

        $this->app->bind(HierarchyCreatorService::class, function(){
            return new HierarchyCreatorService(
                env('EMPLOYEES_COUNT'),
            env('HIERARCHY_LEVELS'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
