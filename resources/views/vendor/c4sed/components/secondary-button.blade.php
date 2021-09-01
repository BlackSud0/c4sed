<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn text-sm font-medium leading-5  transition-colors duration-150 rounded-md sm:px-4 sm:py-2 sm:w-auto active:bg-transparent active:text-gray-500']) }}>
    @if (isset($for))
    <i class="{{$for}} mr-1"></i>
    @else
    <i class="fa fa-check-square mr-1"></i>
    @endif
    {{ $slot }}
</button>
