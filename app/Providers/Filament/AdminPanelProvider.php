<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\LatestLeads;
use App\Filament\Widgets\StatsOverview;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\View\PanelsRenderHook;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        $brandLogoPath = 'images/shwehdi-soft-logo.png';
        $brandLogo = file_exists(public_path($brandLogoPath)) ? asset($brandLogoPath) : null;

        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Shwehdi Soft')
            ->brandLogo($brandLogo)
            ->favicon(asset('images/shwehdi-soft-logo.png'))
            ->darkMode()
            ->renderHook(
                PanelsRenderHook::STYLES_AFTER,
                fn () => <<<'HTML'
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">
<style>
/* ===== Shwehdi Soft Dashboard Theme ===== */
.dark .fi-body,
.dark body { background-color: #03050b !important; }
.dark .fi-topbar { background: #03050b !important; border-bottom: 1px solid #2a3449 !important; }
.dark .fi-sidebar { background: linear-gradient(180deg, #03050b 0%, #0a0f1e 100%) !important; border-color: #2a3449 !important; }
.dark .fi-sidebar-item.fi-active .fi-sidebar-item-button { background: rgba(255,122,26,.12) !important; }
.dark .fi-sidebar-item.fi-active .fi-sidebar-item-label { color: #ff7a1a !important; }
.dark .fi-sidebar-nav-group-label { color: #ff7a1a !important; font-weight: 700 !important; font-size: .7rem; letter-spacing: .08em; }
.dark .fi-brand-name { color: #ff7a1a !important; font-weight: 800 !important; }
.dark .fi-main { background-color: #03050b !important; }
.dark .fi-section { background: #0f1522 !important; border-color: #2a3449 !important; }
.dark .fi-section-header { border-color: #2a3449 !important; }
.dark .fi-wi-stats-overview-stat { background: linear-gradient(155deg, #0f1522, #111a29) !important; border-color: #2a3449 !important; }
.dark .fi-ta-ctn { background: #0f1522 !important; border-color: #2a3449 !important; }
.dark .fi-ta-header-cell { background: #111a29 !important; }
.dark .fi-ta-row:hover td { background: rgba(255,122,26,.05) !important; }
.dark .fi-page-header { background: transparent !important; }
.dark .fi-card { background: #0f1522 !important; border-color: #2a3449 !important; }
.dark .fi-dropdown-panel { background: #0f1522 !important; border-color: #2a3449 !important; }
.dark .fi-input { background: #111a29 !important; border-color: #2a3449 !important; }
.fi-body, .fi-body * { font-family: 'Cairo', sans-serif !important; }
</style>
HTML
            )
            ->colors([
                'primary' => Color::Orange,
                'danger' => Color::Red,
                'info' => Color::Blue,
                'success' => Color::Green,
                'warning' => Color::Amber,
            ])
            ->font('Cairo')
            ->globalSearchKeyBindings(['command+k', 'ctrl+k'])
            ->sidebarCollapsibleOnDesktop()
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                StatsOverview::class,
                LatestLeads::class,
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
