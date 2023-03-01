<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Webapix\Admin\Admin;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register any Admin services.
     *
     * @throws \ReflectionException
     */
    public function boot()
    {
        Admin::registerResourcesIn(app_path('Admin'));
        Admin::registerResources([
            //
        ]);
    }
}
