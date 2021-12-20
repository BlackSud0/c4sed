@if ($eangles->isNotEmpty())
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
    <table class="w-full overflow-x-auto whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Angle</th>
            <th class="px-4 py-3">Connection</th>
            <th class="px-4 py-3">Dead load</th>
            <th class="px-4 py-3">Live load</th>
            <th class="px-4 py-3">Wind load</th>
            <th class="px-4 py-3">Grade</th>
            <th class="px-4 py-3">Status</th>
            <th class="px-4 py-3">Date</th>
            <th class="px-4 py-3">Actions</th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
        @foreach ($eangles as $eangle)
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-2 py-3">
            <div class="flex items-center text-sm">
                <!-- Avatar with inset shadow -->
                <div class="relative hidden zoom-in w-14 h-12 mr-2 rounded-md md:block">
                    @if($eangle->eangle_type === 'Single')
                    <img class="w-full h-full rounded-md" src="{{ asset('assets/img/Beam/Simply-supported.svg') }}" alt="" loading="single"/>
                    @elseif($eangle->eangle_type === 'Double')
                    <img class="w-full h-full rounded-md" src="{{ asset('assets/img/Beam/Cantilever.svg') }}" alt="" loading="double"/>
                    @endif
                    
                    <div class="absolute inset-0" aria-hidden="true"></div>
                    </div>
                <div>
                <p class="font-semibold">{{$eangle->eangle_type}}</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                {{$eangle->designation->designation ?? 'Not Selected'}}
                </p>
                </div>
            </div>
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$eangle->connection_type}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$eangle->DL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$eangle->LL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$eangle->WL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$eangle->grade}}
            </td>
            <td class="px-2 py-3 text-xs text-center">
            @if($eangle->status === null)
            <span class="px-2 py-2 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                Pending
            </span>
            @elseif($eangle->status === 'succeeded')
            <span class="px-2 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                Succeeded
            </span>
            @elseif($eangle->status === 'failed')
            <span class="px-2 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                Failed
            </span>
            @endif
            </td>
            <td class="px-3 py-3 text-sm">
            {{ date("M j\, Y", strtotime($eangle->created_at)) }}
            </td>
            <td class="px-4 py-3">
            <div class="flex items-center space-x-2 text-sm">
                @if($eangle->status === 'succeeded')  
                    <a href="{{route('eangles.reports', $eangle->slug)}}" data-tippy-content="Veiw report" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="View">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </a>
                @else
                    <a href="#" data-tippy-content="You can't view this report" class="flex disabled zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="View">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </a>
                @endif
                <button wire:click="confirmEangleUpdate('{{ $eangle->id }}')" data-tippy-content="Edit" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-500 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit" >
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </button>
                <button wire:click="confirmEangleRemoval('{{ $eangle->id }}')" data-tippy-content="Delete" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div
    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
    >
    <span class="flex items-center col-span-3">
        Showing 21-30 of 100
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
    {{ $eangles->links() }}
    </span>
    </div>

<!-- Update Eangle informations Modal -->
<x-dialog-modal wire:model="confirmingEangleUpdate">
    <x-slot name="title">
        <div class="text-right">
            <x-secondary-button class="btn-outline-hard" for="fa fa-window-close" wire:click="$toggle('confirmingEangleUpdate')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
        </div>
    </x-slot>

    <x-slot name="content">
        <form class="form form-horizontal" wire:submit.prevent="updateEangle">
            @if(isset($updateEangleForm['eangle_type']))
                @if($updateEangleForm['eangle_type'] === 'Single')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Single Angle</div>
                <div class="item-center">
                    <img class="w-4/5 mx-auto " src="{{ asset('assets/img/Beam/Simply-supported.svg') }}" alt="single">
                </div>
                @elseif($updateEangleForm['eangle_type'] === 'Double')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Double Angles</div>
                <div class="item-center">
                    <img class="w-4/5 mx-auto " src="{{ asset('assets/img/Beam/Cantilever.svg') }}" alt="double">
                </div>
                @endif
            @endif
            <div class="text-center -mt-8 relative">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="D">D :</label>
                <input type="text" wire:model.defer="updateEangleForm.D" class="w-20 h-7 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Bolt hole">
                <label class="text-sm text-gray-600 dark:text-gray-500" for="D">mm</label>
            </div>
            <div class="text-gray-600 p-2 text-sm text-center mx-auto text-gray-600 dark:text-gray-500">All calculations based on Metric units KN/m</div>
            <div class="px-4 text-center relative">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">D.L :</label>
                <input type="text" wire:model.defer="updateEangleForm.DL" class="w-24 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Dead Load">
                
                <label class="font-medium ml-2 text-sm text-gray-600 dark:text-gray-300" for="LL">L.L :</label>
                <input type="text" wire:model.defer="updateEangleForm.LL" class="w-24 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Live Load">
            </div>

            <div class="px-4 text-center relative mt-2">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="WL">W.L :</label>
                <input type="text" wire:model.defer="updateEangleForm.WL" class="w-24 mr-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wind Load">
                
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="Grade">Grade :</label>
                <select wire:model.defer="updateEangleForm.grade" class="w-24 text-xs text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                    <option value="43">43</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
            </div>
            <div class="text-center mx-auto mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                <input type="radio" wire:model.defer="updateEangleForm.connection_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="connection_type" value="bolted">
                <span class="ml-1">Bolted splices</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input type="radio" wire:model.defer="updateEangleForm.connection_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="connection_type" value="welded">
                <span class="ml-1">Welded splices</span>
                </label>
            </div>
            @if($updateEangleForm['eangle_type'] === 'Double' && isset($updateEangleForm['connected_to_both_sides']))
            <div class="px-4 text-sm mt-2 item-center">
                <label class="flex items-center text-gray-600 dark:text-gray-400 justify-center" @if($updateEangleForm['connected_to_both_sides']) wire:click="$set('updateEangleForm.connected_to_both_sides', false)" @else wire:click="$set('updateEangleForm.connected_to_both_sides', true)" @endif>
                    <input type="checkbox" @if($updateEangleForm['connected_to_both_sides']) checked @endif class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2 text-sm">
                        Double angles connected to both sides of a gusset
                    </span>
                </label>
            </div>
            @endif

            <div class="flex text-sm mt-2">
                <input type="text" wire:model.defer="updateEangleForm.project_name" placeholder="Project Name" class="w-1/2 h-17 mr-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <input type="text" wire:model.defer="updateEangleForm.customer_name" placeholder="Customer Name" class="w-1/2 h-17 ml-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
            </div>
            @if($sections)
            <div class="relative mt-2 text-gray-500 focus-within:text-purple-600">
                <select wire:model.defer="updateEangleForm.designation_id" class="block w-3/4 pr-20 mt-1 text-sm text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                    <option value="0">Select section</option>
                    @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->designation }} EA</option>
                    @endforeach
                </select>
                <button type="submit" class="btn absolute inset-y-0 right-0 w-1/4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
                Reanalyze
                </button>
            </div>
            @endif

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
    </x-slot>
</x-dialog-modal>

<!-- Remove Eangle Confirmation Modal -->
<x-confirmation-modal wire:model="confirmingEangleRemoval">
    <x-slot name="title">
        {{ __('Remove Analyzed Angle') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to remove this angle from the analyzed angles?') }}
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button class="btn-outline-hard" for="fa fa-window-close" wire:click="$toggle('confirmingEangleRemoval')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button for="fa fa-user-slash" class="ml-2" wire:click="removeEangle" wire:loading.attr="disabled">
            {{ __('Remove') }}
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>

</div>
@else
<span class="w-full block mb-5 text-lg text-center rounded-md px-4 py-2 border-2 border-dashed border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-400">
Whoops!, it's look like you don't have any analyzed angles :)
</span>
@endif