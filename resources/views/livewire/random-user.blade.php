<div>
    <h2>{{ $currentUserName }}</h2>
    <img src="{{ $currentUserImage }}" alt="{{ $currentUserName }}" />
</div>

<button wire:click="getRandomUser">Next</button>

