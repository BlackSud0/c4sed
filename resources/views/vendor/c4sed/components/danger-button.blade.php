<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring focus:ring-red-200 active:bg-red-600 disabled:opacity-25 transition']) }}>
    @if (isset($for))
    <i class="{{$for}} mr-1"></i>
    @else
    <i class="fa fa-check-square mr-1"></i>
    @endif
    {{ $slot }}
</button>
