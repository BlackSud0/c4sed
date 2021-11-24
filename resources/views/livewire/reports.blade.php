@section('content')

@if(isset($beamReport))
    @livewire('beams.reports',['beam' => $beamReport])
@endif

@endsection