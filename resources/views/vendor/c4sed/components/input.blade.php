@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control text-gray-600 dark:text-gray-500 dark:placeholder-gray-500 form-input']) !!}>
