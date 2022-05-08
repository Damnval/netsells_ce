<?php

namespace App\Providers;

use App\CustomClasses\NumeralToRomanConverter;
use App\Interfaces\RomanConversionInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RomanConversionInterface::class, NumeralToRomanConverter::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
