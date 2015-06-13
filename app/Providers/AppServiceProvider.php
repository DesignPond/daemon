<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserService();
        $this->registerPageService();
    }

    /**
     * User
     */
    protected function registerUserService(){

        $this->app->singleton('App\Cours\User\Repo\UserInterface', function()
        {
            return new \App\Cours\User\Repo\UserEloquent(new \App\Cours\User\Entities\User);
        });

    }

    /**
     * Page
     */
    protected function registerPageService(){

        $this->app->singleton('App\Cours\Page\Repo\PageInterface', function()
        {
            return new \App\Cours\Page\Repo\PageEloquent(new \App\Cours\Page\Entities\Page);
        });

    }
}
