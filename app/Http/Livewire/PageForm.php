<?php

namespace App\Http\Livewire;

use App\Models\Site\Websitepage;
use Livewire\Component;

class PageForm extends Component
{
    public $page;

    protected $rules = [
        'page.name' => 'required|string|min:6'
    ];

    public function mount(Websitepage $page)
    {
        $this->page = $page;
    }

    public function save() 
    {
        sleep(3);
        $this->validate();
    }

    public function render()
    {
        return view('livewire.page-form');
    }
}
