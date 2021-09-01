<x-form-section submit="updatePassword">

    <x-slot name="form">
        <div class="mt-3">
            <div class="input-group">
            <span class="input-group-text"><i class="fa fa-shield-alt" aria-hidden="true"></i></span>
                <x-input id="current_password" type="password" placeholder="Current Password" class="w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            </div>
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="mt-3">
            <div class="input-group">
            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                <x-input id="password" type="password" onkeyup="isGood(this.value)" placeholder="New Password" class="w-full" wire:model.defer="state.password" autocomplete="new-password" />
            </div>
            <x-input-error for="password" class="mt-2" />
        </div>
        <div id="password-text">
        
        </div>
        <a href="https://www.security.org/how-secure-is-my-password/" class="text-purple-600 block mt-2 text-md sm:text-sm" target="_blank">What is a secure password?</a>
        <div class="mt-3">
            <div class="input-group">
            <span class="input-group-text"><i class="fa fa-key" aria-hidden="true"></i></span>
                <x-input id="password_confirmation" type="password" placeholder="Confirm New Password" class="w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            </div>
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button class="w-full btn btn-primary">
            {{ __('Update Password') }}
        </x-button>
    </x-slot>
</x-form-section>