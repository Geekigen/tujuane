<div class="flex justify-between items-center  py-2">
    <div>
        @foreach ($tags as $tag)
            <button
                class="px-4 py-2 rounded-full {{ in_array($tag->id, $selectedTags) ? 'bg-blue-500 text-black' : 'bg-gray-200' }}"
                wire:click="selectTag({{ $tag->id }})"
            >
                {{ $tag->tag }}
            </button>
        @endforeach
    
        </button>
    </div>
    
  

<div class="flex items-center justify-center h-screen">
   

    <button
    class="rounded-full px-4 py-2 bg-white text-black hover:bg-gray-300 focus:outline-none focus:shadow-outline"
        wire:click="save"
    >
        Save
    </button>
</div>


  