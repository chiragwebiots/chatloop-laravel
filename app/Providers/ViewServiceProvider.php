<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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

        // For admin page setting
        View::composer('admin.settings.reading', function ($view) {
            $view->with('pages', Page::get()->pluck('title', 'id')->toArray());
        });

        View::composer('frontend.layouts.partials.sidebar', function ($view) {
            $view->with('blogs', \App\Models\Blog::orderByDesc('created_at')->get()->take(5))
            ->with('categories', \App\Models\Category::active(true)->get())
            ->with('tags', \App\Models\Tag::active(true)->get());
        });

        View::composer('frontend.sections.home', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'home')->first());
        });

        View::composer('frontend.sections.about', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'about')->first());
        });

        View::composer('frontend.sections.feature', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'feature')->first());
        });

        View::composer('frontend.sections.how-it-work', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'how-it-work')->first());
        });

        View::composer('frontend.sections.screenshots', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'screenshots')->first());
        });


        View::composer('frontend.sections.team', function ($view) {
            $team = \App\Models\Section::where('section_name', 'team')->first();
            $view->with('section', $team)
                 ->with('teams', \App\Models\Team::orderBy('created_at',
                  isset($team->content['order']) ? $team->content['order'] : 'asc')->get());
        });

        View::composer('frontend.sections.pricing-plan', function ($view) {
            $view->with('plans', \App\Models\PricingPlan::get())
                 ->with('section', \App\Models\Section::where('section_name', 'pricing-plan')->first());
        });

        View::composer('frontend.sections.testimonial', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'testimonials')->first())
                 ->with('testimonials', \App\Models\Testimonial::get());
        });

        View::composer('frontend.sections.faq', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'faq')->first())
                 ->with('faqs', \App\Models\Faq::get());
        });

        View::composer('frontend.sections.recent-blog', function ($view) {
            $blog = \App\Models\Section::where('section_name', 'recent-blog')->first();
            $view->with('section', $blog)
                 ->with('blogs', \App\Models\Blog::orderBy('created_at', 
                 isset($blog->content['order']) ? $blog->content['order'] : 'asc')->get());
        });

        View::composer('frontend.sections.download', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'download')->first());
        });

        View::composer('frontend.sections.contact', function ($view) {
            $view->with('section', \App\Models\Section::where('section_name', 'contact')->first());
        });
        View::composer('frontend.layouts.partials.footer', function ($view) {
            $view->with('social_link', \App\Models\SocialLink::get());
        });
    }
}
