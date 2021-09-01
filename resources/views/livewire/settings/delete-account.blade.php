<x-action-section>

    <x-slot name="content">
        <div class="max-w-xl">
            <h2 class="font-medium text-base mb-4">
              <i class="fa fa-power-off"></i> Permanently delete your account.
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-500">
                {{ __('Once your account is deleted, all of its resources and will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
            </div>
        </div>

        <div class="mt-4">
            <x-danger-button for="fa fa-power-off" class="block w-full" wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, your account is no longer available in our systems. You won’t be able to reactivate your previous account and you won’t have access to any old data.
                 Please enter your password to confirm you would like to permanently delete your account.') }}

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-input type="password" class="mt-1 block w-full"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button class="btn-outline-hard" for="fa fa-window-close" wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button for="fa fa-user-slash" class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>