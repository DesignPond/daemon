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
        $this->registerStructureService();

        $this->registerCategorieService();
        $this->registerTypeService();
        $this->registerGroupeService();
        $this->registerProjetService();

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

    /**
     * Structure
     */
    protected function registerStructureService(){

        $this->app->singleton('App\Cours\Structure\Repo\StructureInterface', function()
        {
            return new \App\Cours\Structure\Repo\StructureEloquent(new \App\Cours\Structure\Entities\Structure);
        });
    }

    /**
     * Categorie
     */
    protected function registerCategorieService(){

        $this->app->singleton('App\Cours\Categorie\Repo\CategorieInterface', function()
        {
            return new \App\Cours\Categorie\Repo\CategorieEloquent(new \App\Cours\Categorie\Entities\Categorie);
        });
    }

    /**
     * Type
     */
    protected function registerTypeService(){

        $this->app->singleton('App\Cours\Type\Repo\TypeInterface', function()
        {
            return new \App\Cours\Type\Repo\TypeEloquent(new \App\Cours\Type\Entities\Type);
        });
    }

    /**
     * Groupe
     */
    protected function registerGroupeService(){

        $this->app->singleton('App\Cours\Groupe\Repo\GroupeInterface', function()
        {
            return new \App\Cours\Groupe\Repo\GroupeEloquent(new \App\Cours\Groupe\Entities\Groupe);
        });
    }

    /**
     * Projet
     */
    protected function registerProjetService(){

        $this->app->singleton('App\Cours\Projet\Repo\ProjetInterface', function()
        {
            return new \App\Cours\Projet\Repo\ProjetEloquent(new \App\Cours\Projet\Entities\Projet);
        });
    }

}
