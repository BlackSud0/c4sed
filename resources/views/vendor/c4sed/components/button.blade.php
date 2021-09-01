<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn block mx-auto  disabled:opacity-25']) }}>
    @if (isset($for))
    <i class="{{$for}} mr-1"></i>
    @else
    <i class="fa fa-check-square mr-1"></i>
    @endif
    {{ $slot }}
</button>
