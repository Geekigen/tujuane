<?php

namespace App\Http\Livewire;

use App\Models\preference;
use App\Models\tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SelectTags extends Component
{
    public $tags;
    public $selectedTags = [];

    public function mount()
    {
        $this->tags = Tag::all();
    }

    public function selectTag($tagId)
    {
        if (in_array($tagId, $this->selectedTags)) {
            $this->selectedTags = array_diff($this->selectedTags, [$tagId]);
        } else {
            $this->selectedTags[] = $tagId;
        }
    }

    public function save()
    {
        Preference::where('user_id', auth()->id())->delete();

        foreach ($this->selectedTags as $tagId) {
            Preference::create([
                'user_id' => auth()->id(),
                'tag_id' => $tagId,
            ]);
        }

        $this->reset();
        $this->emit('tagsSaved');
        return redirect('/images');
    }

    public function render()
    {
        return view('livewire.select-tags', [
            'tags' => $this->tags,
            'selectedTags' => $this->selectedTags,
        ]);
    }
}
