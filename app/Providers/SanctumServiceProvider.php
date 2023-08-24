<?php

use Illuminate\Support\ServiceProvider;

class SanctumServiceProvider extends ServiceProvider
{
    public function register()
    {
        config([
            'auth.guards.sanctum' => array_merge([
                'driver' => 'sanctum',
                'provider' => null,
            ], config('auth.guards.sanctum', [])),
        ]);

        if (! app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/../config/sanctum.php', 'sanctum');
        }
    }
}
