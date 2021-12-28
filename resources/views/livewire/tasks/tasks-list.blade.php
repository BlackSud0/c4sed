@foreach($tasks as $key => $task)
    <div x-data="{ open: false }">
        <div @click="open = true" class="box px-5 py-3 mb-3 flex items-center zoom-in">
            <div class="w-10 h-10 rounded-full btn border-0 text-orange-700 bg-orange-100 dark:text-white dark:bg-orange-600">{{++$key}}</div>
            <div class="ml-4 mr-auto">
                <div class="font-medium">{{ $task->description }}</div>
                <div class="text-gray-600 text-xs mt-0.5">17 June 2020</div>
            </div>
            <div class="text-xs text-gray-500 ml-auto">{{ date("M j\, Y", strtotime($task->created_at)) }}</div>
        </div>
        <span x-show.transition.in.duration.500ms="open" @click.away="open = false" x-cloak class="w-full block -mt-1 text-sm rounded px-2 py-1 border-2 border-dashed border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-400">
            {{ $task->description }}
        </span>
        <div class="mt-1 mb-3 flex" x-show.transition.in.duration.500ms="open" @click.away="open = false" x-cloak>
            <button wire:click="taskCompleted({{$task->id}})" @click="open = false" class="flex zoom-in ml-auto justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            </button>
            <button wire:click="editTask({{$task->id}})" @click="open = false" class="flex zoom-in justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg focus:outline-none focus:shadow-outline-gray">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
            </button>
            <button wire:click="deleteTask({{$task->id}})" @click="open = false" class="flex zoom-in justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
@endforeach

<style>
    [x-cloak] { display: none; }
</style>