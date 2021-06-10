<?php

namespace Weegy\Todos\App\Container;

use Weegy\Todos\App\Contracts\TodoContract;
use Weegy\Todos\App\Models\Todo;

class TodoContractContainer implements TodoContract
{

    /**
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public function getAllTodos(): \Illuminate\Database\Eloquent\Collection|array
    {
        return Todo::all();
    }

    public function getTodoById($id)
    {
        // TODO: Implement getTodoById() method.
    }

    public function storeTodo($todo)
    {
        // TODO: Implement storeTodo() method.
    }
}
