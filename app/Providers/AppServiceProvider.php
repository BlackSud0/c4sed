<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;

use App\Actions\User\DeleteUser;
use App\Contracts\DeletesUsers;
use App\Actions\User\UpdateUserPassword;
use App\Contracts\UpdatesUserPasswords;
use App\Actions\Beam\BeamCalculation;
use App\Contracts\BeamsCalculations;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(StatefulGuard::class, function () {
            return Auth::guard(config('auth.defaults.guard', null));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        /**
         * reference https://laravel.com/docs/8.x/packages#views
         * add blade Components
         */
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'c4sed');
        $this->configureComponents();

        app()->singleton(DeletesUsers::class, DeleteUser::class);
        app()->singleton(UpdatesUserPasswords::class, UpdateUserPassword::class);

        app()->singleton(BeamsCalculations::class, BeamCalculation::class);
    }

    /**
     * Configure the Blade components.
     *
     * @return void
     */
    protected function configureComponents()
    {
            $this->callAfterResolving(BladeCompiler::class, function () {
            $this->registerComponent('action-message');
            $this->registerComponent('action-section');
            $this->registerComponent('button');
            $this->registerComponent('confirmation-modal');
            $this->registerComponent('confirms-password');
            $this->registerComponent('danger-button');
            $this->registerComponent('dialog-modal');
            $this->registerComponent('form-section');
            $this->registerComponent('input');
            $this->registerComponent('input-error');
            $this->registerComponent('modal');
            $this->registerComponent('secondary-button');
            $this->registerComponent('validation-errors');
        });
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('c4sed::components.'.$component, $component);
    }
}
