<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\View;

use App\Post;
use App\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		//
		Schema::defaultStringLength(191);

		$post_sidebar = Post::with(['categories', 'user'])->orderBy('views', 'DESC')->paginate(10);

		$categories = Category::all();

		View::share('post_sidebar', $post_sidebar);
		View::share('categories', $categories);
    }
}
