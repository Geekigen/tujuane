<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Matchmaker extends Component
{
    public $gender;
    public $matches = [];
    public $currentIndex = 0;

    public function render()
    {
        $user = auth()->user();
        $profile = $user->profiles->first();

        if ($profile) {
            $user = User::with('profiles')->find(auth()->id());
$profiles = $user->profiles;

foreach ($profiles as $profile) {
    $matchPreference = $profile->matchPreferences;
 }

            $this->matches = User::whereHas('profiles', function ($query) use ($matchPreference) {
                $query->where('gender', $matchPreference);
                
            })
            ->whereHas('preferences', function ($query) use ($user) {
                $query->whereIn('tag_id', $user->preferences->pluck('tag_id'));
            })
            ->get();
        }

        $currentMatch = $this->matches[$this->currentIndex] ?? null;
        return view('livewire.matchmaker', [
            'currentMatch' => $currentMatch,
        ]);
    }

    public function nextMatch()
    {
        $this->currentIndex++;
    }
}
