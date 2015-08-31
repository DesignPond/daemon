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
        $page =  new \App\Cours\Page\Entities\Page();
        $root  = $page->whereNull('parent_id')->orderBy('rang','asc')->get();

        view()->share('hierarchy', $root);
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
        $this->registerLinkService();

        $this->registerSchemaService();
        $this->registerBoxService();
        $this->registerArrowService();

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
     * Link
     */
    protected function registerLinkService(){

        $this->app->singleton('App\Cours\Link\Repo\LinkInterface', function()
        {
            return new \App\Cours\Link\Repo\LinkEloquent(new \App\Cours\Link\Entities\Link);
        });

    }

    /**
     * Schema
     */
    protected function registerSchemaService(){

        $this->app->singleton('App\Cours\Schema\Repo\SchemaInterface', function()
        {
            return new \App\Cours\Schema\Repo\SchemaEloquent(new \App\Cours\Schema\Entities\Schema);
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

    /**
     * Box
     */
    protected function registerBoxService(){

        $this->app->singleton('App\Cours\Box\Repo\BoxInterface', function()
        {
            return new \App\Cours\Box\Repo\BoxEloquent(new \App\Cours\Box\Entities\Box);
        });
    }

    /**
     * Arrow
     */
    protected function registerArrowService(){

        $this->app->singleton('App\Cours\Arrow\Repo\ArrowInterface', function()
        {
            return new \App\Cours\Arrow\Repo\ArrowEloquent(new \App\Cours\Arrow\Entities\Arrow);
        });
    }

}
