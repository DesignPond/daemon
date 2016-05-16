<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        \Shortcode::register('maketree', function($attr, $content = null, $name = null)
        {
            $worker = \App::make('App\Cours\Page\Worker\PageWorker');

            $directories = config('tree.directories');

            $colors = config('tree.colors');

            echo $worker->treeDirectories($directories, $path = '', $loop = 0, $colors);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
