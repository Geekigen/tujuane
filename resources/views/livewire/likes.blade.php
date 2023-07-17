<div>
    <button class="bg-blue-500 text-white p-2" wire:click="toggleLike">
        @if($isLiked)
            Unlike
        @else
            Like
        @endif
    </button>
    
</div>
