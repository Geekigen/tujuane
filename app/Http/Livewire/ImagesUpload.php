<?php

namespace App\Http\Livewire;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Component;
use Livewire\WithFileUploads;
use Termwind\Components\Dd;

class ImagesUpload extends Component
{
    use WithFileUploads;
 
    public $photos = [];
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }
    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }
 
    public function save()
    {
        Image::where('user_id', auth()->id())->delete();
        $this->validate([
            'photos.*' => 'image|max:1024', // 1MB Max
        ]);
    
        if (count($this->photos) > 4) {
            session()->flash('error', 'You can only upload a maximum of 4 images.');
            return;
        }
    
        foreach ($this->photos as $image) { 
            $imageModel = new Image;
            $imageName = uniqid('image_') . '.' . $image->extension();
    
            // store the image in the public/profile directory
            $image->storeAs('public/profileimages', $imageName);
            $imageModel->images =$imageName ;
            $imageModel->user_id = auth()->id();
            $imageModel->save();
        }
        $this->reset(); 
        return redirect('/profiles');
    }
    



    public function render()
    {
        return view('livewire.images-upload');
    }
}
