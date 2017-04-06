<?php
/**
 * This file is part of Naptime-Server.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace HyanCat\AppVersion;

class AppVersionLaravelServiceProvider extends AbstractServiceProvider
{
    public function configure()
    {
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/../config/appversion.php' => config_path('appversion.php'),
        ], 'config');
    }

    protected function registerRoute(array $config)
    {
        $this->app['router']->get($config['path'], [
            'middleware' => $config['middleware'],
            'uses'       => $config['uses'],
            'as'         => $config['name'],
        ]);
    }
}
