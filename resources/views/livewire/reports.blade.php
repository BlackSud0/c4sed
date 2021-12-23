@section('content')

@if(isset($beamReport))
    @livewire('beams.reports',['beam' => $beamReport])
@elseif(isset($columnReport))
    @livewire('columns.reports',['column' => $columnReport])
@elseif(isset($eangleReport))
    @livewire('eangles.reports',['eangle' => $eangleReport])
@else
    {{abort(404)}}
@endif

@endsection