<?php

namespace App\Http\Livewire;

use App\Models\tag;
use Livewire\Component;

class Tags extends Component
{

    public $tag;

    public function submit()
    {
        $this->validate([
            'tag' => 'required|unique:Tags'
        ]);

        Tag::create([
            'tag' => $this->tag
        ]);

        $this->reset();

        $this->emit('tagCreated');
    }
    public function render()
    {
        return view('livewire.tags');
    }
}
