<?php

namespace Huid\LaravelUeditor;

use Encore\Admin\Admin;
use Encore\Admin\Form;
use Illuminate\Support\ServiceProvider;

class LaravelUeditorServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot(LaravelUeditor $extension)
    {
        if (! LaravelUeditor::boot()) {
            return ;
        }

        if ($views = $extension->views()) {
            $this->loadViewsFrom($views, 'laravel-ueditor');
        }

        if ($this->app->runningInConsole() && $assets = $extension->assets()) {
            $this->publishes(
                [$assets => public_path('vendor/laravel-admin-ext')],
                'laravel-ueditor'
            );

            $this->publishes([
                __DIR__ . '/../config/ueditor.php' => config_path('ueditor.php'),
            ], 'config');
        }

        $this->app->booted(function () {
            LaravelUeditor::routes(__DIR__.'/../routes/web.php');
        });

        Admin::booting(function () {
            Form::extend(LaravelUeditor::config('field_type', 'ueditor'), Ueditor::class);
        });
    }

    public function register()
    {
        $this->app->singleton('ueditor.storage', function ($app) {
            return new StorageManager(\Storage::disk($app['config']->get('ueditor.disk', 'public')));
        });
    }

}
