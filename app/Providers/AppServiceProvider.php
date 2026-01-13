<?php

namespace App\Providers;

// TAMBAHKAN TIGA BARIS INI:
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
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
        // Cek dulu apakah tabel categories sudah ada untuk menghindari error saat migrate
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::all());
        }

        Paginator::useBootstrapFive();
    }


    
}