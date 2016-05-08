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
        $page  =  new \App\Cours\Page\Entities\Page();
        $site  =  new \App\Cours\Site\Entities\Site();

        $root  = $page->where('parent_id','=',0)->where('main', null)->orderBy('rang','asc')->get();
        $sites = $site->with(['root'])->get();

        view()->share('hierarchy', $root);
        view()->share('sites', $sites);
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

        $this->registerCategorieService();
        $this->registerGlossaireService();

        $this->registerUploadService();
        $this->registerSiteService();

    }

    /**
     * Site
     */
    protected function registerSiteService(){

        $this->app->singleton('App\Cours\Site\Repo\SiteInterface', function()
        {
            return new \App\Cours\Site\Repo\SiteEloquent(new \App\Cours\Site\Entities\Site);
        });
    }

    /*
    * Upload
    */
    protected function registerUploadService(){

        $this->app->bind('App\Cours\Service\UploadInterface', function()
        {
            return new \App\Cours\Service\UploadWorker();
        });
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
     * Categorie
     */
    protected function registerCategorieService(){

        $this->app->singleton('App\Cours\Categorie\Repo\CategorieInterface', function()
        {
            return new \App\Cours\Categorie\Repo\CategorieEloquent(new \App\Cours\Categorie\Entities\Categorie);
        });
    }

    /**
     * Glossaire
     */
    protected function registerGlossaireService(){

        $this->app->singleton('App\Cours\Glossaire\Repo\GlossaireInterface', function()
        {
            return new \App\Cours\Glossaire\Repo\GlossaireEloquent(new \App\Cours\Glossaire\Entities\Glossaire);
        });
    }

}
