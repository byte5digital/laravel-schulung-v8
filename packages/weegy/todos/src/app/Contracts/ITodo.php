<?php

namespace Weegy\Todos\App\Contracts;

interface ITodo {
    public function getAllTodos();
    public function getTodoById($id);
    public function storeTodo($todo);
}
