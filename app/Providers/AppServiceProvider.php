<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Gate;
use Blade;
use View;
use DB;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Authorization
        Gate::define('admin',function($user){
            return $user->level == 'admin';
        });

        Gate::define('operator',function($user){
            return $user->level == 'operator';
        });
        
        Gate::define('nasabah',function($user){
            return $user->level == 'nasabah';
        });
        
        Gate::before(function($user){
            if ($user->level=='admin') {
                return true;
            }
        });

        //Directive Blade
        Blade::directive('count',function($expression){
            return "<?php echo DB::table({$expression})->count() ?>";
        });

        Blade::directive('toRupiah',function($expression){
            return "<?php echo number_format({$expression},0,2,'.') ?>";
        });

        Blade::directive('toDate',function($expression){
            return "<?php echo Carbon::parse($expression)->format('d-m-Y') ?>";
        });

        //View Share
        View::share('coba','Hai Rahmat Hidayatullah');
    }
}
