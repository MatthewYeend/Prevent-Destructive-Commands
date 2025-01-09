<?php

namespace MattYeend\PreventDestructiveCommands;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Artisan;

class PreventDestructiveCommandsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        if (app()->environment('production')) {
            $this->preventDestructiveCommands();
        }
    }

    /**
     * Register the package services.
     */
    public function register()
    {
        // You can register bindings or services if needed
    }

    /**
     * Prevent destructive commands from running.
     */
    protected function preventDestructiveCommands()
    {
        $destructiveCommands = [
            'migrate:fresh',    // Drops all tables
            'migrate:reset',    // Rolls back all migrations
            'migrate:rollback', // Rolls back a batch of migrations
            'db:wipe',          // Drops all databases
        ];

        foreach ($destructiveCommands as $command) {
            Artisan::command($command, function () use ($command) {
                $this->error("This '{$command}' command is disabled in this environment for safety.");
            });
        }
    }
}
