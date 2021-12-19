@section('content')

@if(isset($beamReport))
    @livewire('beams.reports',['beam' => $beamReport])
@elseif(isset($columnReport))
    @livewire('columns.reports',['column' => $columnReport])
@else
    {{abort(404)}}
@endif

@endsection