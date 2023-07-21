<?php

namespace App\Providers;

use App\Config\MenuSidebar;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
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
      //
   }
   /**
    * Bootstrap any application services.
    *
    * @return void
    */
   public function boot()
   {
      // Model::preventLazyLoading(!$this->app->isProduction());

      Blade::directive('rupiah', function ($expression) {
         return "Rp. <?php echo number_format($expression,0,',','.'); ?>";
      });

      Blade::directive('tanggal', function ($expression) {
         return "<?php echo \Carbon\Carbon::parse($expression)->translatedFormat('d-m-y H:m:s'); ?>";
      });

      view()->composer('*', function ($view) {
         if (Auth::check()) {
            $view->with('fotoProfil',    User::find(auth()->user()->id)->getUrlFoto());
            $view->with('menu', MenuSidebar::menu());
         }
      });
   }
}
