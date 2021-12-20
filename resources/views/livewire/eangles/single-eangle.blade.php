<form class="form form-horizontal" wire:submit.prevent="CreateSingleEangle">
<div class="font-medium text-center text-base text-gray-800 dark:text-gray-200">Single Eangle</div>
<img class="px-4" src="{{ asset('assets/img/Beam/Simply-supported.svg') }}" >
<div class="text-center -mt-8 relative">
    <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="D">D :</label>
    <input type="text" wire:model.defer="state.D" class="w-20 h-7 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Bolt hole">
    <label class="text-sm text-gray-600 dark:text-gray-500" for="DL">mm</label>
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
    <select wire:model.defer="state.grade" class="w-24 text-xs text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
        <option value="43">43</option>
        <option value="50">50</option>
        <option value="55">55</option>
    </select>
</div>

<div class="text-center mx-auto mt-2">
    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
    <input type="radio" wire:model.defer="state.connection_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="connection_type" value="bolted">
    <span class="ml-1">Bolted splices</span>
    </label>
    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
    <input type="radio" wire:model.defer="state.connection_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="connection_type" value="welded">
    <span class="ml-1">Welded splices</span>
    </label>
</div>

<div class="relative mt-8 text-gray-500 focus-within:text-purple-600">
    <select wire:model.defer="state.designation_id" class="block w-3/4 pr-20 mt-1 text-sm text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
        <option>Select section</option>
        @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->designation }} EA</option>
        @endforeach
    </select>
    <button type="submit" class="btn w-1/4 absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
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