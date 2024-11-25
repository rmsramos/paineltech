<?php

namespace App\Providers;

use Filament\Support\Facades\FilamentIcon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->makeTenancyMiddlewareHighestPriority();
        $this->registerNewIcons();
    }

    public function registerNewIcons()
    {
        FilamentIcon::register([
            'panels::topbar.open-database-notifications-button' => 'phosphor-bell-ringing-duotone',
            'panels::pages.dashboard.navigation-item'           => 'phosphor-house-duotone',
            'panels::theme-switcher.light-button'               => 'phosphor-sun-horizon-duotone',
            'panels::theme-switcher.dark-button'                => 'phosphor-moon-stars-duotone',
            'panels::theme-switcher.system-button'              => 'phosphor-monitor-duotone',
            'panels::user-menu.profile-item'                    => 'phosphor-user-circle-duotone',
            'panels::user-menu.logout-button'                   => 'phosphor-sign-out-duotone',
            'panels::widgets.account.logout-button'             => 'phosphor-sign-out-duotone',
            'tables::actions.filter'                            => 'phosphor-funnel-duotone',
            'tables::actions.toggle-columns'                    => 'phosphor-columns-duotone',
        ]);
    }

    public function makeTenancyMiddlewareHighestPriority()
    {
        $parsedUrl = parse_url(URL::current());
        $host      = $parsedUrl['host'];

        if ($host !== config('app.central_url')) {
            Livewire::setUpdateRoute(function ($handle) {
                return Route::post('/livewire/update', $handle)
                    ->middleware([
                        'web',
                        'universal',
                        TenancyServiceProvider::TENANCY_IDENTIFICATION,
                    ]);
            });

            \Artisan::call('route:clear');
        }
    }
}
