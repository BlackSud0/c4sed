@section('content')

@if(isset($beamReport))

    @livewire('beams.reports',['beam' => $beamReport])

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