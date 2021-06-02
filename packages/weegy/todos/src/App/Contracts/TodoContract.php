<?php

namespace Weegy\Todos\App\Contracts;

interface TodoContract {
    public function getAllTodos();
    public function getTodoById($id);
    public function storeTodo($todo);
}
