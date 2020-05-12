<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $models = ['Category', 'Brand', 'Product', 'Order'];
        foreach ($models as $model) {
            $this->app->bind("App\Repositories\Contracts\\{$model}Contract",
                "App\Repositories\\{$model}Repository");
        }
    }
}
