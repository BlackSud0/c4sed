@if ($beams->isNotEmpty())
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
    <table class="w-full overflow-x-auto whitespace-no-wrap">
        <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">Beam</th>
            <th class="px-4 py-3">Span/length</th>
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
        @foreach ($beams as $beam)
        <tr class="text-gray-700 dark:text-gray-400">
            <td class="px-2 py-3">
            <div class="flex items-center text-sm">
                <!-- Avatar with inset shadow -->
                <div class="relative hidden zoom-in w-14 h-12 mr-2 rounded-md md:block">
                    @if($beam->beam_type === 'Simple')
                    <img class="w-full h-full rounded-md" src="{{ asset('assets/img/Beam/Simply-supported.svg') }}" alt="" loading="simply"/>
                    @elseif($beam->beam_type === 'Cantilever')
                    <img class="w-full h-full rounded-md" src="{{ asset('assets/img/Beam/Cantilever.svg') }}" alt="" loading="cantilever"/>
                    @elseif($beam->beam_type === 'FixedEnd')
                    <img class="w-full h-full rounded-md" src="{{ asset('assets/img/Beam/Fixed-End.svg') }}" alt="" loading="fixedend"/>
                    @endif
                    
                    <div class="absolute inset-0" aria-hidden="true"></div>
                    </div>
                <div>
                <p class="font-semibold">{{$beam->beam_type}}</p>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                {{$beam->designation->designation ?? 'Not Selected'}}
                </p>
                </div>
            </div>
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$beam->L}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$beam->DL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$beam->LL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$beam->WL}}
            </td>
            <td class="px-2 py-3 text-sm text-center">
            {{$beam->grade}}
            </td>
            <td class="px-2 py-3 text-xs text-center">
            @if($beam->status === null)
            <span class="px-2 py-2 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-md dark:text-white dark:bg-orange-600">
                Pending
            </span>
            @elseif($beam->status === 'succeeded')
            <span class="px-2 py-2 font-semibold leading-tight text-green-700 bg-green-100 rounded-md dark:bg-green-700 dark:text-green-100">
                Succeeded
            </span>
            @elseif($beam->status === 'failed')
            <span class="px-2 py-2 font-semibold leading-tight text-red-700 bg-red-100 rounded-md dark:text-red-100 dark:bg-red-700">
                Failed
            </span>
            @endif
            </td>
            <td class="px-3 py-3 text-sm">
            {{ date("M j\, Y", strtotime($beam->created_at)) }}
            </td>
            <td class="px-4 py-3">
            <div class="flex items-center space-x-2 text-sm">
                <button data-tippy-content="Veiw report" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit" >
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </button>    
                <button wire:click="confirmBeamUpdate('{{ $beam->id }}')" data-tippy-content="Edit" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-500 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Edit" >
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                </button>
                <button wire:click="confirmBeamRemoval('{{ $beam->id }}')" data-tippy-content="Delete" class="flex zoom-in items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
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
    {{ $beams->links() }}
        <!-- <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
            <li>
            <button
                class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Previous"
            >
                <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
                >
                <path
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                ></path>
                </svg>
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                1
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                2
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                3
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                4
            </button>
            </li>
            <li>
            <span class="px-3 py-1">...</span>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                8
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
            >
                9
            </button>
            </li>
            <li>
            <button
                class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                aria-label="Next"
            >
                <svg
                class="w-4 h-4 fill-current"
                aria-hidden="true"
                viewBox="0 0 20 20"
                >
                <path
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd"
                    fill-rule="evenodd"
                ></path>
                </svg>
            </button>
            </li>
        </ul>
        </nav> -->
    </span>
    </div>

<!-- Update Beam informations Modal -->
<x-dialog-modal wire:model="confirmingBeamUpdate">
    <x-slot name="title">
        <div class="text-right">
            <x-secondary-button class="btn-outline-hard" for="fa fa-window-close" wire:click="$toggle('confirmingBeamUpdate')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
        </div>
    </x-slot>

    <x-slot name="content">
        <form class="form form-horizontal" wire:submit.prevent="updateBeam">
            @if(isset($updateBeamForm['beam_type']))
                @if($updateBeamForm['beam_type'] === 'Simple')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Simply supported</div>
                <div class="item-center">
                    <img class="w-4/5 mx-auto " src="{{ asset('assets/img/Beam/Simply-supported.svg') }}" alt="">
                </div>
                @elseif($updateBeamForm['beam_type'] === 'Cantilever')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Cantilever</div>
                <div class="item-center">
                    <img class="w-4/5 mx-auto " src="{{ asset('assets/img/Beam/Cantilever.svg') }}" alt="">
                </div>
                @elseif($updateBeamForm['beam_type'] === 'FixedEnd')
                <div class="font-medium text-center text-lg text-gray-800 dark:text-gray-200">Fixed at both End</div>
                <div class="item-center">
                    <img class="w-4/5 mx-auto " src="{{ asset('assets/img/Beam/Fixed-End.svg') }}" alt="">
                </div>
                @endif
            @endif
            <div class="text-center -mt-8 relative">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">L :</label>
                <input type="text" wire:model.defer="updateBeamForm.L" class="w-17 h-7 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Span">
            </div>
            <div class="text-gray-600 p-2 text-sm text-center mx-auto text-gray-600 dark:text-gray-500">The total number of points beam earned</div>
            <div class="px-4 text-center relative">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">D.L :</label>
                <input type="text" wire:model.defer="updateBeamForm.DL" class="w-24 mr-5 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Dead Load">
                
                <label class="font-medium ml-2 text-sm text-gray-600 dark:text-gray-300" for="DL">L.L :</label>
                <input type="text" wire:model.defer="updateBeamForm.LL" class="w-24 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Live Load">
            </div>

            <div class="px-4 text-center relative mt-2">
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">W.L :</label>
                <input type="text" wire:model.defer="updateBeamForm.WL" class="w-24 mr-1 text-xs text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Wind Load">
                
                <label class="font-medium text-sm text-gray-600 dark:text-gray-300" for="DL">Grade :</label>
                <select wire:model.defer="updateBeamForm.grade" class="w-24 text-xs text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                    <option value="43">43</option>
                    <option value="50">50</option>
                    <option value="55">55</option>
                </select>
            </div>
            @if(isset($updateBeamForm['buckling']))
            <div class="px-4 text-sm mt-2 item-center">
                <label class="flex items-center text-gray-600 dark:text-gray-400 justify-center" @if($updateBeamForm['buckling']) wire:click="$set('updateBeamForm.buckling', false)" @else wire:click="$set('updateBeamForm.buckling', true)" @endif>
                    <input type="checkbox" @if($updateBeamForm['buckling']) checked @endif class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                    <span class="ml-2 text-sm">
                    Laterally unrestrained beam (buckling check)
                    </span>
                </label>
            </div>
            @endif

            <div class="flex text-sm mt-2">
                <input type="text" wire:model.defer="updateBeamForm.company_name" placeholder="Company Name" class="w-1/2 h-17 mr-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
                <input type="text" wire:model.defer="updateBeamForm.project_name" placeholder="Project Name" class="w-1/2 h-17 ml-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">
            </div>
            <input type="text" wire:model.defer="updateBeamForm.subject" placeholder="Subject" class="w-full h-17 mt-2 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input">

            @if($sections)
            <div class="relative mt-2 text-gray-500 focus-within:text-purple-600">
                <select wire:model.defer="updateBeamForm.designation_id" class="block w-3/4 pr-20 mt-1 text-sm text-gray-600 dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-select">
                    <option value="0">Select section</option>
                    @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->designation }} UB</option>
                    @endforeach
                </select>
                <button type="submit" class="absolute inset-y-0 right-0 w-1/4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple disabled:opacity-25" wire:loading.attr="disabled">
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

<!-- Remove Team Member Confirmation Modal -->
<x-confirmation-modal wire:model="confirmingBeamRemoval">
    <x-slot name="title">
        {{ __('Remove Analyzed Beam') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to remove this beam from the analyzed beams?') }}
    </x-slot>

    <x-slot name="footer">
        <x-secondary-button class="btn-outline-hard" for="fa fa-window-close" wire:click="$toggle('confirmingBeamRemoval')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        <x-danger-button for="fa fa-user-slash" class="ml-2" wire:click="removeBeam" wire:loading.attr="disabled">
            {{ __('Remove') }}
        </x-danger-button>
    </x-slot>
</x-confirmation-modal>

</div>
@else
<span class="w-full block mb-5 text-lg text-center rounded-md px-4 py-2 border-2 border-dashed border-gray-400 dark:border-dark-5 text-gray-600 dark:text-gray-400">
Whoops!, it's look like you don't have any analyzed beams :)
</span>
@endif

