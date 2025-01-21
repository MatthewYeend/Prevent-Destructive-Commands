<?php

namespace MattYeend\PreventDestructiveCommands\Tests;

use Orchestra\TestBench\TestCase;
use Illuminate\Support\Facades\Artisan;
use MattYeend\PreventDestructiveCommands\PreventDestructiveCommandsServiceProvider;

class PreventDestructiveCommandsTest extends TestCase
{
    /**
     * Load the service provider for the package.
     * 
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [PreventDestructiveCommandsServiceProvider::class];
    }

    public function it_disables_destructive_commands_in_production()
    {
        $this->app['env'] = 'production';

        $commands = [
            'migrate:fresh',
            'migrate:reset',
            'migrate:rollback',
            'db:wipe',
        ];

        foreach ($commands as $command){
            Artisan::call($command);
            $output = Artisan::output();

            $this->assertStringContainsString(
                "This '{$command}' command is disabled in this environment for safety.",
                $output
            );
        }
    }

    public function it_allows_commands_in_non_production_environments()
    {
        $this->app['env'] = 'local';

        Artisan::call('migrate:fresh');
        $output = Artisan::output();

        $this->assertStringNotContainsString(
            "this 'migrate:fresh' command is disabled in this environment for safety.",
            $output
        );
    }
}