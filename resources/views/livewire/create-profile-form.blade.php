<div class="w-full max-w-xs mx-auto py-6">
    <form wire:submit.prevent="save">
        <label for="dob" class="block text-sm font-medium leading-5 text-gray-700">Date of Birth</label>
        <div class="relative rounded-md shadow-sm">
            <input type="date" id="dob" wire:model="dob" class="form-input py-3 px-4 block w-full leading-5 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
        </div>
        @error('dob') <span class="error">{{ $message }}</span> @enderror

        <label for="gender" class="block text-sm font-medium leading-5 text-gray-700 mt-6">Gender</label>
        <div class="relative rounded-md shadow-sm">
            <select id="gender" wire:model="gender" class="form-select py-3 px-4 block w-full leading-5 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                <option value="">Select a gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
        </div>
        @error('gender') <span class="error">{{ $message }}</span> @enderror

        <label for="matchPreferences" class="block text-sm font-medium leading-5 text-gray-700 mt-6">Match Preferences</label>
        <div class="relative rounded-md shadow-sm">
            <select id="matchPreferences" wire:model="matchPreferences" class="form-select py-3 px-4 block w-full leading-5 rounded-md transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                <option value="">Select your match preferences</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="both">Both</option>
            </select>
        </div>
        @error('matchPref') <span class="error">{{ $message }}</span> @enderror
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-6">
            Save</button>
    </form>
</div>
