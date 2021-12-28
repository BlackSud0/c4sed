<div class="p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 mb-3">
    <form class="form" wire:submit.prevent="submit">
        <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-4 sm:space-y-0 space-y-4 sm:px-0 items-end">
            <div class="relative flex-grow w-full mr-2">
                <label for="task-name" class="leading-7 text-sm text-gray-600 dark:text-gray-400">Task Name</label>
                <input type="text" id="task-name" wire:model="name"  placeholder="Equal Angle design..." class="w-full text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
            </div>
            <div class="relative flex-grow w-full mr-2">
                <label for="description" class="leading-7 text-sm text-gray-600 dark:text-gray-400">Description</label>
                <input type="text" wire:model="description" id="description" placeholder="Build a Todo lits for..." class="w-full text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
            </div>
            <button class="btn text-white bg-blue-500 border-0 py-2 px-4 focus:outline-none rounded text-sm active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-5 -ml-1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                AddTask
            </button>
        </div>
        @error('description') <span class="text-theme-24 text-sm">- {{ $message }}</span> @enderror
    </form>
</div>