<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

// Models
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\StockTransaction;
use App\Models\Setting; // <--- tambahin ini

// Observers
use App\Observers\ProductObserver;
use App\Observers\CategoryObserver;
use App\Observers\SupplierObserver;
use App\Observers\StockTransactionObserver;

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
        Product::observe(ProductObserver::class);
        Category::observe(CategoryObserver::class);
        Supplier::observe(SupplierObserver::class);
        StockTransaction::observe(StockTransactionObserver::class);

        // 🔥 Tambahkan ini biar $setting tersedia di semua view
        View::composer('*', function ($view) {
            $view->with('setting', Setting::first());
        });
    }
}
