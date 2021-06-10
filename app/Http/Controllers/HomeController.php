<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Weegy\Todos\App\Contracts\TodoContract;

class HomeController extends Controller
{

    /**
     * @var TodoContract $_todoContainer
     */
    private $_todoContainer;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TodoContract $todoContainer)
    {
        $this->_todoContainer = $todoContainer;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allTodoItems = $this->_todoContainer->getAllTodos();
        return view('home', ['todos' => $allTodoItems]);
    }
}
