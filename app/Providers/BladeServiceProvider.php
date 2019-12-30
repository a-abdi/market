<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;

use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        Blade::directive('convert', function ($money) {

            return "<?php echo number_format($money); ?>";
            
        });

        Blade::directive('duration', function ($date) {

            return "<?php echo Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->diffForHumans(); ?>";
            
        });

    }
}
