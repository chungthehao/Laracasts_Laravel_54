<?php

namespace App\Providers;

use App\Billing\Stripe;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    //protected $defer = true; // hoãn lại, cần mới lấy
    // Chú ý: không được để true nếu mình cần boot lên xài liền khi chạy ứng dụng
    // (hoãn lại thì lấy gì có mà boot !!)

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        /* Mỗi khi load view layouts.sidebar sẽ có sẵn $archives */
        // Bind $archives với cái view đó.
        view()->composer('layouts.sidebar', function($view) {
            $archives = \App\Post::archives();
            $tags = \App\Tag::has('posts')->pluck('name');

            $view->with(compact('archives', 'tags'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        #   Đăng ký với service container, khi cần resolve class Stripe, biết đường mà xử lý
        // cái $key trong class Stripe
        /*\App::singleton('App\Billing\Stripe', function() {
            return new \App\Billing\Stripe(config('services.stripe.secret'));
        });*/
        #   Đang trong class AppServiceProvider mình có property app, nên có thể
        // $this->app->singleton...

        $this->app->singleton(Stripe::class, function() {
            return new Stripe(config('services.stripe.secret'));
        });
    }
}
