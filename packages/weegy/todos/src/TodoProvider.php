<?php

namespace Weegy\Todos;

use Illuminate\Support\ServiceProvider;
use Weegy\Todos\App\Container\TodoContractContainer;
use Weegy\Todos\App\Contracts\TodoContract;

class TodoProvider extends ServiceProvider {

    public $bindings = [
        TodoContract::class => TodoContractContainer::class,
    ];

    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'todos');
    }
}
