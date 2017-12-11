<?php

namespace App\Providers;

use App\Entities\CalonDaerahPemasaran;
use App\Entities\Pesanan;
use App\Observers\CalonDaerahObserver;
use App\Observers\PesananObserver;
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
        Pesanan::observe(PesananObserver::class);
        CalonDaerahPemasaran::observe(CalonDaerahObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
