<div class="flex justify-center items-center">
  <style>
    img {
    object-cover: cover;
}

  </style>
    @if($currentMatch)
<div x-data="{ showMore: false }">
    @foreach ($currentMatch->image as $key => $image)
        @if($key === 0)
            <img src="{{ asset('storage/profileimages/'.$image->images) }}" alt="{{ $currentMatch->name }}" class="h-48 w-48 sm:h-64 sm:w-64">
        @livewire('likes', ['imageId' => $image->id])@else
            <img src="{{ asset('storage/profileimages/'.$image->images) }}" alt="{{ $currentMatch->name }}" class="h-48 w-48 sm:h-64 sm:w-64" x-show="showMore">
        @endif
        
        
    @endforeach

    <button x-on:click="showMore = !showMore" class="bg-blue-500 text-white p-2">
        Show More
    </button>
</div>


  @else
    No matches found.
  @endif
  
  
        <button wire:click="nextMatch" class="px-4 py-2 rounded-full bg-blue-500 text-white">Next</button>
   
</div>
