<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.navbar', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
                $notifications = Notification::where('id_user', Auth::id())
                    ->where('dibaca', false)
                    ->latest()
                    ->take(10)
                    ->get();

                $notifCount = Notification::where('id_user', Auth::id())
                    ->where('dibaca', false)
                    ->count();

                $view->with(compact('notifications', 'notifCount'));
            }
        });
    }
}
