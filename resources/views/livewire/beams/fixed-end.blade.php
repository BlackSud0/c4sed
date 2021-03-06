<form class="form form-horizontal" wire:submit.prevent="CreateFixedEndBeam">
<div class="font-medium text-center text-base text-gray-800 dark:text-gray-200">Fixed at both End</div>
<img class="px-4 -mt-1" src="{{ asset('assets/img/Beam/Fixed-End.svg') }}" >
<div class="text-center -mt-8 relative">
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="L">L :</label>
    <input type="text" wire:model.defer="state.L" class="w-17 h-7 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Span">
</div>
<div class="text-gray-600 p-2 text-sm text-center mx-auto text-gray-600 dark:text-gray-500">All calculations based on Metric units KN/m</div>
<div class="px-4 relative text-center mx-auto">
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">D.L :</label>
    <input type="text" wire:model.defer="state.DL" class="w-24 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Dead Load">
    
    <label class="font-medium ml-2 text-sm text-gray-600 dark:text-gray-300" for="LL">L.L :</label>
    <input type="text" wire:model.defer="state.LL" class="w-24 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Live Load">
</div>

<div class="px-4 relative mt-2 text-center mx-auto">
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="WL">W.L :</label>
    <input type="text" wire:model.defer="state.WL" class="w-24 mr-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wind Load">
    
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="Grade">Grade :</label>
    <select wire:model.defer="state.grade" class="w-24 text-xs text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select rounded">
        <option value="43">43</option>
        <option value="50">50</option>
        <option value="55">55</option>
    </select>
</div>

<div class="px-4 text-sm mt-2 items-center">
    <label class="flex items-center text-gray-600 dark:text-gray-400 justify-center" @if($state['buckling']) wire:click="$set('state.buckling', false)" @else wire:click="$set('state.buckling', true)" @endif>
        <input type="checkbox" @if($state['buckling']) checked @endif class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
        <span class="ml-2 text-xs">
        Laterally unrestrained beam (buckling check)
        </span>
    </label>
</div>

<div class="relative mt-2 text-gray-500 focus-within:text-purple-600">
    <select wire:model.defer="state.designation_id" class="block w-3/4 pr-20 mt-1 text-sm text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select rounded-l">
        <option value="0">Select section</option>
        @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->designation }} UB</option>
        @endforeach
    </select>
    <button type="submit" class="analyze w-1/4 absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
    Analyze
    </button>
</div>
</form>