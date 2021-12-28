@foreach($tasks as $key => $task)
    <div x-data="{ open: false }">
        <div class="relative flex items-center mb-1">
            <div class="report-timeline__image">
                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                    <span class="w-10 h-10 font-medium rounded-full btn border-0 text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </span>
                </div>
            </div>
            <div @click="open = true" class="box px-5 py-3 ml-4 flex-1 zoom-in">
                <div class="flex items-center">
                    <div class="font-medium truncate">Johnny Depp</div>
                    <div class="text-xs text-gray-500 ml-auto">{{ date("M j\, Y", strtotime($task->created_at)) }}</div>
                </div>
                <div class="text-gray-600 mt-1">{{ $task->description }}</div>
            </div>
        </div>
        <span x-show.transition.in.duration.500ms="open" @click.away="open = false" x-cloak class="w-5/6 ml-auto block mt-1 text-sm rounded px-2 py-1 border-2 border-dashed border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-400">
            {{ $task->description }}
        </span>
        <div class="mt-1 flex items-center text-sm" x-show.transition.in.duration.500ms="open" @click.away="open = false" x-cloak>
            <button wire:click="returnTask({{$task->id}})" @click="open = false" class="flex zoom-in ml-auto justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><polyline points="1 4 1 10 7 10"></polyline><polyline points="23 20 23 14 17 14"></polyline><path d="M20.49 9A9 9 0 0 0 5.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 0 1 3.51 15"></path></svg>
            </button>
            <button wire:click="deleteTask({{$task->id}})" @click="open = false" class="flex zoom-in justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="text-gray-500 text-xs text-center mb-4">(Finished at: {{$task->completed_at}})</div>
@endforeach

<style>
    [x-cloak] { display: none; }
</style>