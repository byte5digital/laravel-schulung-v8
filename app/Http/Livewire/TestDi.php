<?php

namespace App\Http\Livewire;

use App\Http\Containers\ElasticSearchContainer;
use App\Http\Contracts\ElasticSearchContract;
use Livewire\Component;
use Weegy\Todos\App\Contracts\TodoContract;

class TestDi extends Component
{

    /**
     * @var TodoContract $diContainer
     */
    protected $diContainer;
    public $todos;
    public $query;

    public function render()
    {
        return view('livewire.test-di');
    }

    public function test()
    {
        $this->diContainer = resolve(ElasticSearchContract::class);
        $this->todos = $this->diContainer->searchContent($this->query);
    }

}
