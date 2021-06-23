<?php

namespace App\Http\Controllers;

use App\Http\Contracts\ElasticSearchContract;
use App\Jobs\TestJob;
use App\Models\Todo;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Log;
use Weegy\Todos\App\Contracts\TodoContract;

class HomeController extends Controller
{

    /**
     * @var TodoContract $_todoContainer
     */
    private $_todoContainer;

    private $_elasticContainer;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TodoContract $todoContainer, ElasticSearchContract $elasticContainer)
    {
        $this->_todoContainer = $todoContainer;
        $this->_elasticContainer = $elasticContainer;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_todo_items = $this->_todoContainer->getAllTodos();

        foreach ($all_todo_items as $todo) {
            $this->_elasticContainer->indexContent($todo);
        }

        return view('home', ['todos' => $all_todo_items]);
    }
}
