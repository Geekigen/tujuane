<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RandomUser extends Component
{
    public $currentUserId;
    public $currentUserPreference;
    public $currentUserImage;
    public $currentUserName;

    public function mount()
    {


        $this->currentUserId = Auth::user()->id;
        $this->currentUserPreference = Auth::user()->preferences;
    }

    public function getRandomUser()
    {
        // Retrieve a random user with matching preference from the database
        $randomUser = User::where('preference', $this->currentUserPreference)
            ->where('id', '!=', $this->currentUserId)
            ->inRandomOrder()
            ->first();
dd($randomUser);
        if ($randomUser) {
            $this->currentUserName = $randomUser->name;
            $this->currentUserImage = $randomUser->image;
        } else {
            // If no matching user is found, display a message instead
            $this->currentUserName = 'No matching users found';
            $this->currentUserImage = null;
        }
    }

    public function render()
    {
        return view('livewire.random-user');
    }
}
