<?php

/**
 * IshaaratServiceProvider
 *
 * @copyright Copyright © 2023 Ishaarat. All rights reserved.
 * @author    Ishaarat Tech Team <sales@ishaarat.com>
 */

namespace Ishaarat\LaraIshaarat\Providers;

use Illuminate\Support\ServiceProvider;

class IshaaratServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (method_exists($this, 'publishes')) {
            $this->publishes([
                __DIR__.'/../config/ishaarat-wa.php' => $this->config_path('ishaarat-wa.php'),
            ]);
        }
    }

    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    /**
     * @param string $path
     * @return string
     */
    private function config_path(string $path = '')
    {
        return function_exists('config_path') ? config_path($path) : app()->basePath() . DIRECTORY_SEPARATOR . 'config' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}