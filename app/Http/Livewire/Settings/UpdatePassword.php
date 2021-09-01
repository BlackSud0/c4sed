<?php

namespace App\Http\Livewire\Settings;
use Illuminate\Support\Facades\Auth;
use App\Contracts\UpdatesUserPasswords;

use Livewire\Component;

class UpdatePassword extends Component
{
   /**
     * The component's state.
     *
     * @var array
     */
    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];

    /**
     * Update the user's password.
     *
     * @param  \Laravel\Fortify\Contracts\UpdatesUserPasswords  $updater
     * @return void
     */
    public function updatePassword(UpdatesUserPasswords $updater)
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        $this->state = [
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'icon' => 'fa fa-shield-alt',
            'title' => 'Password',  
            'message' => 'your password successfully updated!']);

        // $this->emit('saved');
    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.settings.update-password');
    }
}
