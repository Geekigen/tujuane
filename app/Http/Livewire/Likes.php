<?php

namespace App\Http\Livewire;

use App\Models\Like;
use Livewire\Component;

class Likes extends Component
{
  
    public $imageId;
    public $isLiked;

    public function mount($imageId)
    {
        $this->imageId = $imageId;
        $this->isLiked = Like::where([
            ['image_id', $this->imageId],
            ['user_id', auth()->id()],
        ])->exists();
    }

    public function toggleLike()
    {
        if ($this->isLiked) {
            $like = Like::where([
                ['image_id', $this->imageId],
                ['user_id', auth()->id()],
            ])->first();
            $like->delete();
            $this->isLiked = false;
        } else {
            $like = new Like();
            $like->image_id = $this->imageId;
            $like->user_id = auth()->id();
            $like->save();
            $this->isLiked = true;
        }
    }
    public function render()
    {
        return view('livewire.likes');
    }
}
