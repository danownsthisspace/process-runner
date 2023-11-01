<?php

namespace App\Providers;

use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Contracts\ProvidesPhpIni;

class NativeAppServiceProvider implements ProvidesPhpIni
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {

        GlobalShortcut::key('alt+shift+c')
            ->event(\App\Events\OpenApp::class)
            ->register();

        MenuBar::create()
            ->width(600)
            ->height(600)
            ->icon(storage_path('app/menuBarIcon.png'));
    }

    /**
     * Return an array of php.ini directives to be set.
     */
    public function phpIni(): array
    {
        return [];
    }
}
