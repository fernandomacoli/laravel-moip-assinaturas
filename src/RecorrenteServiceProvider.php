<?php
namespace Moip\Recorrente;

use Illuminate\Support\ServiceProvider;

class RecorrenteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/Config/moiprecorrente.php' => config_path('moiprecorrente.php')], 'config');
    }
    public function register()
    {
        $this->app->singleton('recorrente', function (){
            return new Recorrente();
        });
    }
}