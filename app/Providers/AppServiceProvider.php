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

        // Helpdesk service
        $this->registerHelpdeskService();
        $this->registerHelpTicketService();
        $this->registerHelpCategorieService();
        $this->registerHelpCommentService();
        $this->registerHelpPriorityService();
        $this->registerHelpStatusService();
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

    /**
     * Help Ticket
     */
    protected function registerHelpdeskService(){

        $this->app->singleton('App\Cours\Help\Worker\HelpdeskInterface', function()
        {
            return new \App\Cours\Help\Worker\Helpdesk(
                \App::make('App\Cours\Help\Repo\TicketInterface'),
                \App::make('App\Cours\Help\Repo\CategoryInterface'),
                \App::make('App\Cours\Help\Repo\CommentInterface'),
                \App::make('App\Cours\Help\Repo\PriorityInterface'),
                \App::make('App\Cours\Help\Repo\StatusInterface')
            );
        });
    }
    
    /**
     * Help Ticket
     */
    protected function registerHelpTicketService(){

        $this->app->singleton('App\Cours\Help\Repo\TicketInterface', function()
        {
            return new \App\Cours\Help\Repo\TicketEloquent(new \App\Cours\Help\Entities\Ticket);
        });
    }

    /**
     * Help Category
     */
    protected function registerHelpCategorieService(){

        $this->app->singleton('App\Cours\Help\Repo\CategoryInterface', function()
        {
            return new \App\Cours\Help\Repo\CategoryEloquent(new \App\Cours\Help\Entities\Category);
        });
    }

    /**
     * Help Comment
     */
    protected function registerHelpCommentService(){

        $this->app->singleton('App\Cours\Help\Repo\CommentInterface', function()
        {
            return new \App\Cours\Help\Repo\CommentEloquent(new \App\Cours\Help\Entities\Comment);
        });
    }

    /**
     * Help Priority
     */
    protected function registerHelpPriorityService(){

        $this->app->singleton('App\Cours\Help\Repo\PriorityInterface', function()
        {
            return new \App\Cours\Help\Repo\PriorityEloquent(new \App\Cours\Help\Entities\Priority);
        });
    }

    /**
     * Help Status
     */
    protected function registerHelpStatusService(){

        $this->app->singleton('App\Cours\Help\Repo\StatusInterface', function()
        {
            return new \App\Cours\Help\Repo\StatusEloquent(new \App\Cours\Help\Entities\Status);
        });
    }

    
}
