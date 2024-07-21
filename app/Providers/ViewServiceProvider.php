<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Use a view composer to share the cart item count with the layout
        View::composer('*', function ($view) {
            $totItemCount = 0;

            if (Auth::check()) {
                $totItemCount = Cart::where('user_id', Auth::id())->sum('quantity');
            }

            $view->with('totItemCount', $totItemCount);
        });
    }
}
