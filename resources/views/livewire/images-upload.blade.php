<div class="flex justify-center">
  <form wire:submit.prevent="save" class="w-full max-w-lg">
      <div class="flex flex-wrap -mx-3 mb-6">
          <div class="w-full px-3">
              <input type="file" wire:model="photos" multiple class="form-input" />
              @error('photos.*')
                  <p class="text-red-500 text-xs italic mt-4">{{ $message }}</p>
              @enderror
          </div>
      </div>

      <div class="flex flex-wrap -mx-3 mb-6">
          @foreach ($photos as $photo)
              <img src="{{ $photo->temporaryUrl() }}" class="w-32 h-32 rounded-full mx-2" />
          @endforeach
      </div>

      <div class="flex items-center justify-between">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full focus:outline-none focus:shadow-outline" type="submit">
              Save
          </button>
      </div>
  </form>
</div>
