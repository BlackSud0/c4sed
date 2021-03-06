<form class="form form-horizontal" wire:submit.prevent="CreateHSection">
<div class="font-medium text-center text-base text-gray-800 dark:text-gray-200">Rolled H-Section</div>
<img class="px-4 w-2/3 mx-auto" src="{{ asset('assets/img/Column/H-Section.svg') }}" >
<div class="text-center relative">
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="L">L<span class="text-xs" style="left:1pt;position:relative;top:4pt;">E</span> :</label>
    <input type="text" wire:model.defer="state.L" class="w-17 h-7 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Length">
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
    <input type="text" wire:model.defer="state.WL" class="w-24 mr-2 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wind Load">
    
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="Grade">Grade :</label>
    <select wire:model.defer="state.grade" class="w-24 text-xs text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select rounded">
        <option value="43">43</option>
        <option value="50">50</option>
        <option value="55">55</option>
    </select>
</div>
<div class="text-center mx-auto mt-2">
    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
    <input type="radio" wire:model.defer="state.element_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="element_type" value="outstand">
    <span class="ml-1">Outstand element</span>
    </label>
    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
    <input type="radio" wire:model.defer="state.element_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="element_type" value="internal">
    <span class="ml-1">Internal element</span>
    </label>
</div>
<div class="relative mt-2 text-gray-500 focus-within:text-purple-600">
    <select wire:model.defer="state.designation_id" class="block w-3/4 pr-20 mt-1 text-sm text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select rounded-l">
        <option>Select section</option>
        @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->designation }} UC</option>
        @endforeach
    </select>
    <button type="submit" class="analyze w-1/4 absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
    Analyze
    </button>
</div>
@if ($errors->any())
    <div>
        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>

        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</form>