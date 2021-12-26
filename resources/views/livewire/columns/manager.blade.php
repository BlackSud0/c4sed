@if ($columns->isNotEmpty())
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
    <table class="w-full overflow-x-auto whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Column</th>
            <th class="px-4 py-3">length</th>
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
        @foreach ($columns as $column)
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-2 py-3">
            <div class="flex items-center text-sm">
                <!-- Avatar with inset shadow -->
                <div class="relative hidden zoom-in w-14 h-12 mr-2 rounded-md md:block">
                    @if($column->column_type === 'HSection')
                    <img class="w-full h-full" src="{{ asset('assets/img/Column/H-Section.svg') }}" alt="" loading="simply"/>
                    @elseif($column->column_type === 'ISection')
                    <img class="w-full h-full" src="{{ asset('assets/img/Column/I-Section.svg') }}" alt="" loading="cantilever"/>
                    @endif

                    <div class="absolute inset-0" aria-hidden="true"></div>
                    </div>
                <div>
                <p class="font-semibold">{{$column->column_type}}</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                {{$column->column_type === 'HSection' ? $column->HSection->designation.' UC' : $column->ISection->designation.' UB'}}
                </p>
                </div>
            </div>
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$column->L}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$column->DL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$column->LL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$column->WL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$column->grade}}
            </td>
            <td class="px-2 py-3 text-xs text-center">
            @if($column->status === null)
            <span class="px-2 py-2 font-semibold leading-tight text-orange-700 bg-orange-100 rounded dark:text-white dark:bg-orange-600">
                Pending
            </span>
            @elseif($column->status === 'succeeded')
            <span class="px-2 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded dark:bg-green-700 dark:text-green-100">
                Succeeded
            </span>
            @elseif($column->status === 'failed')
            <span class="px-2 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded dark:text-red-100 dark:bg-red-700">
                Failed
            </span>
            @endif
            </td>
            <td class="px-3 py-3 text-sm">
            {{ date("M j\, Y", strtotime($column->created_at)) }}
            </td>
            <td class="px-4 py-3">
            <div class="flex items-center space-x-2 text-sm">
                @if($column->status === 'succeeded')  
                    <a href="{{route('columns.reports', $column->slug)}}" data-tippy-content="Veiw report" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="View">
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
                <button wire:click="confirmColumnUpdate('{{ $column->id }}')" data-tippy-content="Edit" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-500 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit" >
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </button>
                <button wire:click="confirmColumnRemoval('{{ $column->id }}')" data-tippy-content="Delete" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
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
        Showing {{$columns->count()}} of {{Auth::user()->CalculatedColumn->count()}}
    </span>
    <span class="col-span-2"></span>
    <!-- Pagination -->
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
    {{ $columns->links() }}
    </span>
    </div>

<!-- Update Column informations Modal -->
<x-dialog-modal wire:model="confirmingColumnUpdate">
    <x-slot name="title">
        <div class="text-right">
            <x-secondary-button class="text-center" wire:click="$toggle('confirmingColumnUpdate')" wire:loading.attr="disabled">
                <svg class="w-5 h-4 pr-1 item-center" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </x-secondary-button>
        </div>
    </x-slot>

    <x-slot name="content">
        <form class="form form-horizontal -mt-10" wire:submit.prevent="updateColumn">
            @if(isset($updateColumnForm['column_type']))
                @if($updateColumnForm['column_type'] === 'HSection')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Rolled H-Section</div>
                <div class="item-center">
                    <img class="w-3/5 mx-auto" src="{{ asset('assets/img/Column/H-Section.svg') }}" alt="">
                </div>
                @elseif($updateColumnForm['column_type'] === 'ISection')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Rolled I-Section</div>
                <div class="item-center">
                    <img class="w-3/5 mx-auto" src="{{ asset('assets/img/Column/I-Section.svg') }}" alt="">
                </div>
                @endif
            @endif
            <div class="text-center relative">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="L">L<span class="text-xs" style="left:1pt;position:relative;top:4pt;">E</span> :</label>
                <input type="text" wire:model.defer="updateColumnForm.L" class="w-17 h-7 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Length">
            </div>
            <div class="text-gray-600 p-2 text-sm text-center mx-auto text-gray-600 dark:text-gray-500">All calculations based on Metric units KN/m</div>
            <div class="px-4 text-center relative">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">D.L :</label>
                <input type="text" wire:model.defer="updateColumnForm.DL" class="w-24 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Dead Load">
                
                <label class="font-medium ml-2 text-sm text-gray-600 dark:text-gray-300" for="LL">L.L :</label>
                <input type="text" wire:model.defer="updateColumnForm.LL" class="w-24 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Live Load">
            </div>

            <div class="px-4 text-center relative mt-2">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="WL">W.L :</label>
                <input type="text" wire:model.defer="updateColumnForm.WL" class="w-24 mr-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wind Load">
                
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="Grade">Grade :</label>
                <select wire:model.defer="updateColumnForm.grade" class="w-24 text-xs text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select rounded">
                    <option value="43">43</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
            </div>
            <div class="text-center mx-auto mt-2">
                <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                <input type="radio" wire:model.defer="updateColumnForm.element_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="element_type" value="outstand">
                <span class="ml-1">Outstand element</span>
                </label>
                <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                <input type="radio" wire:model.defer="updateColumnForm.element_type" class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" name="element_type" value="internal">
                <span class="ml-1">Internal element</span>
                </label>
            </div>
            <div class="flex text-sm mt-2">
                <input type="text" wire:model.defer="updateColumnForm.project_name" placeholder="Project Name" class="w-1/2 h-17 mr-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <input type="text" wire:model.defer="updateColumnForm.customer_name" placeholder="Customer Name" class="w-1/2 h-17 ml-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
            </div>
            @if($sections)
            <div class="relative mt-2 text-gray-500 focus-within:text-purple-600">
                <select wire:model.defer="updateColumnForm.designation_id" class="block w-3/4 pr-20 mt-1 text-sm text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select rounded-l">
                    <option value="0">Select section</option>
                    @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->designation }} {{$updateColumnForm['column_type'] === 'HSection' ? 'UC' : 'UB'}}</option>
                    @endforeach
                </select>
                <button type="submit" class="analyze absolute inset-y-0 right-0 w-1/4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
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

<!-- Remove Column Confirmation Modal -->
<x-confirmation-modal wire:model="confirmingColumnRemoval">
    <x-slot name="title">
        {{ __('Remove Analyzed Column') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to remove this column from the analyzed columns?') }}
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button class="btn-outline-hard" for="fa fa-window-close" wire:click="$toggle('confirmingColumnRemoval')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button for="fa fa-user-slash" class="ml-2" wire:click="removeColumn" wire:loading.attr="disabled">
            {{ __('Remove') }}
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>

</div>
@else
<span class="w-full block mb-5 text-lg text-center rounded-md px-4 py-2 border-2 border-dashed border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-400">
Whoops!, it's look like you don't have any analyzed columns :)
</span>
@endif