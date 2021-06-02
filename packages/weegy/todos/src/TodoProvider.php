<?php

namespace Weegy\Todos;

use Illuminate\Support\ServiceProvider;

class TodoProvider extends ServiceProvider {

    public function boot(){
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/');
    }
}
