<?php

namespace Users\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        $module_name = basename(dirname(__DIR__,1));
        config([
            $module_name => File::getRequire(loadConfigFile($module_name,'route'))
        ]);
        $this->loadRoutesFrom(loadRoutesFile($module_name,'web'));
        $this->loadRoutesFrom(loadRoutesFile($module_name,'api'));
        $this->loadViewsFrom(loadViewsFile($module_name),$module_name);
        $this->loadMigrationsFrom(loadMigrationsFile($module_name));
    }
}
