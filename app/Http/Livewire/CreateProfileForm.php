<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateProfileForm extends Component
{
    public $userId;
    public $dob;
    public $gender;
    public $matchPreferences;

    public function mount()
    {
        $this->userId = Auth::id();
    }
  

    public function save()
    {
        $this->validate([
            'dob' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:male,female',
            'matchPreferences' => 'required|in:male,female,both',
        ]);

        // Create a new profile with the provided data
        $profile = Profile::create([
            'user_id' => $this->userId,
            'dob' => $this->dob,
            'gender' => $this->gender,
            'matchPreferences' => $this->matchPreferences,
        ]);

        // Redirect the user to their profile page or show a success message
        // session()->flash('message', 'Your profile has been created successfully!');
      $this->reset();
       return redirect('/dashboard');
        
    }

    public function render()
    {
        return view('livewire.create-profile-form');
    }
}
