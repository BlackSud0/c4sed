@section('content')

@if(isset($beamReport))
    <div class="flex my-6 justify-between">
        <h2 class="text-2xl font-bold pb-2 tracking-wider text-gray-600 dark:text-gray-300">Calculation Report</h2>
        <div>
            <div class="relative mr-4 inline-block">
                <div class="text-gray-500 zoom-in w-10 h-10 rounded-full bg-white hover:bg-gray-300 inline-flex items-center justify-center" data-tippy-content="Print Report">
                    <!-- Print this invoice! -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                        <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                        <rect x="7" y="13" width="10" height="8" rx="2" />
                    </svg>				  
                </div>
            </div>
            
            <div class="relative inline-block">
                <div class="text-gray-500 zoom-in w-10 h-10 rounded-full bg-white hover:bg-gray-300 inline-flex items-center justify-center" data-tippy-content="Reload Page" @click="window.location.reload()">
                    <!-- Reload Page -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="0" y="0" width="24" height="24" stroke="none"></rect>
                        <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -5v5h5" />
                        <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 5v-5h-5" />
                    </svg>	  
                </div>
            </div>
        </div>
    </div>
    <div class="mb-10">
        @livewire('beams.reports',['beam' => $beamReport])
    </div>
@else
    <h4 class="flex my-6 text-lg font-semibold text-gray-600 dark:text-gray-300">
        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
        Analyze new beam
    </h4>
    <div class="grid grid-cols-12 gap-6">
        <a class="zoom-in col-span-12 lg:col-span-4 box pt-5">
            @livewire('beams.simply-supported')
        </a>
        <a class="zoom-in col-span-12 lg:col-span-4 box pt-5">
            @livewire('beams.cantilever')
        </a>
        <a class="zoom-in col-span-12 lg:col-span-4 box pt-5">
            @livewire('beams.fixed-end')
        </a>
    </div>
    <div class="my-10">
        <h4 class="flex mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>    
            Recently analyzed beams
        </h4>
        @livewire('beams.manager')
    </div>
@endif

@endsection