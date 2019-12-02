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
            
            
            // $rest = substr("abcdef", -1);    // returns "f"
            // $rest = substr("abcdef", -2);    // returns "ef"
            $rest = substr($date,2,2); // returns "d"
            // $rest = "10";
            return "<?php echo $rest; ?>";
        });

    }
}
