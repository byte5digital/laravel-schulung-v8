<?php

namespace App\Http\Livewire;

use App\Http\Containers\ElasticSearchContainer;
use App\Http\Contracts\ElasticSearchContract;
use Livewire\Component;
use Str;
use Weegy\Todos\App\Contracts\TodoContract;

class TestDi extends Component
{

    /**
     * @var TodoContract $diContainer
     */
    protected $diContainer;
    public $content;
    public $guid;

    public function mount()
    {
        $this->guid = Str::uuid()->toString();
    }

    public function render()
    {
        return view('livewire.test-di');
    }

    public function showValue()
    {
        dd($this->content);
    }

}
