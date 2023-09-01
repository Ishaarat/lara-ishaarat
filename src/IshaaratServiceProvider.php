<?php
/**
 * IshaaratServiceProvider
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */

namespace Ishaarat\LaraIshaarat;

use Illuminate\Support\ServiceProvider;
use Ishaarat\LaraIshaarat\Commands\IshaaratPublishCommand;

class IshaaratServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/ishaarat-wa.php' => config_path('ishaarat-wa.php'),
            ], 'ishaarat-wa-config');

            $this->commands([
                IshaaratPublishCommand::class,
            ]);
        }

        $this->app->bind('ishaarat-wa', function () {
            return new WA(config('ishaarat-wa'));
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ishaarat-wa.php', 'ishaarat-wa');
    }
}
