<?php

namespace App\Providers;

use App\Http\Containers\ElasticSearchContainer;
use App\Http\Contracts\ElasticSearchContract;
use App\Observers\TodoObserver;
use Illuminate\Support\ServiceProvider;
use Weegy\Todos\App\Models\Todo;

class AppServiceProvider extends ServiceProvider
{

    public $bindings = [
        ElasticSearchContract::class => ElasticSearchContainer::class,
    ];
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Todo::observe(TodoObserver::class);
    }
}
