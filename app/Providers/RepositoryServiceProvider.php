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
        $this->app->bind(\App\Repositories\Contracts\AccountInterface::class, \App\Repositories\AccountRepository::class);
        $this->app->bind(\App\Repositories\Contracts\RoleInterface::class, \App\Repositories\RoleRepository::class);
        $this->app->bind(\App\Repositories\Contracts\UserInterface::class, \App\Repositories\UserRepository::class);
        $this->app->bind(\App\Repositories\Contracts\MediaInterface::class, \App\Repositories\MediaRepository::class);
        $this->app->bind(\App\Repositories\Contracts\PageInterface::class, \App\Repositories\PageRepository::class);
        $this->app->bind(\App\Repositories\Contracts\BlogInterface::class, \App\Repositories\BlogRepository::class);
        $this->app->bind(\App\Repositories\Contracts\CategoryInterface::class, \App\Repositories\CategoryRepository::class);
        $this->app->bind(\App\Repositories\Contracts\TagInterface::class, \App\Repositories\TagRepository::class);
        $this->app->bind(\App\Repositories\Contracts\TeamInterface::class, \App\Repositories\TeamRepository::class);
        $this->app->bind(\App\Repositories\Contracts\PricingPlanInterface::class, \App\Repositories\PricingPlanRepository::class);
        $this->app->bind(\App\Repositories\Contracts\TestimonialInterface::class, \App\Repositories\TestimonialRepository::class);
        $this->app->bind(\App\Repositories\Contracts\FaqInterface::class, \App\Repositories\FaqRepository::class);
        $this->app->bind(\App\Repositories\Contracts\SectionInterface::class, \App\Repositories\SectionRepository::class);
        $this->app->bind(\App\Repositories\Contracts\SocialLinkInterface::class, \App\Repositories\SocialLinkRepository::class);
        $this->app->bind(\App\Repositories\Contracts\Commentinterface::class, \App\Repositories\CommentRepository::class);
    }
}
