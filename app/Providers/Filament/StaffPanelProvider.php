<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Saade\FilamentFullCalendar\FilamentFullCalendarPlugin;

class StaffPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('staff')
            ->path('staff')
            ->login()
            ->colors([
                // 'primary' => Color::Amber,
                'primary' => [
                    50  => '#f0fdf4',
                    100 => '#dcfce7',
                    200 => '#bbf7d0',
                    300 => '#86efac',
                    400 => '#4ade80',
                    500 => '#22c55e', // Tailwind green-500
                    600 => '#16a34a',
                    700 => '#15803d', // your bg-green-700
                    800 => '#166534',
                    900 => '#14532d',
                    950 => '#052e16',
                ],
            ])
            ->plugin(
                FilamentFullCalendarPlugin::make()->selectable()
            )
            ->discoverResources(in: app_path('Filament/Resources/Staff'), for: 'App\\Filament\\Resources\\Staff')
            ->discoverPages(in: app_path('Filament/Pages/Staff'), for: 'App\\Filament\\Pages\\Staff')
            ->pages([
                \App\Filament\Pages\Staff\StaffDashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets/Staff'), for: 'App\\Filament\\Widgets\\Staff')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
