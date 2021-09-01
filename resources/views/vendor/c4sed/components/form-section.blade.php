@props(['submit'])

<div {{ $attributes->merge(['class' => 'mt-2']) }}>

        <form class="form form-horizontal" wire:submit.prevent="{{ $submit }}">
            <div class="{{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                
                    {{ $form }}
                
            </div>

            @if (isset($actions))
                <div class="text-right mt-5">
                    {{ $actions }}
                </div>
            @endif
        </form>
</div>
