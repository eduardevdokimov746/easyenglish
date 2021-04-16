<?php

namespace App\Ship\Providers;

use App\Ship\Parents\Providers\MainProvider;

/**
 * Class ShipProvider
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class ShipProvider extends MainProvider
{
    /**
     * Register any Service Providers on the Ship layer (including third party packages).
     *
     * @var array
     */
    public $serviceProviders = [];

    /**
     * Register any Alias on the Ship layer (including third party packages).
     *
     * @var  array
     */
    protected $aliases = [
        'ShipLocalization' => \App\Ship\Facades\ShipLocalizationFacade::class,
        'PhotoStorage' => \App\Ship\Facades\PhotoStorageFacade::class,
        'Breadcrumbs' => \App\Ship\Facades\BreadcrumbsFacade::class,
        'FileStorage' => \App\Ship\Facades\FileStorageFacade::class
    ];

    public function __construct()
    {
        parent::__construct(app());

        if (class_exists('Barryvdh\Debugbar\ServiceProvider')) {
            $this->serviceProviders[] = \Barryvdh\Debugbar\ServiceProvider::class;
        }

        if (class_exists('Barryvdh\Debugbar\Facade')) {
            $this->aliases['Debugbar'] = \Barryvdh\Debugbar\Facade::class;
        }
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // ...
        parent::boot();
        // ...

        \View::composer('teachersection/*::*', function ($view) {
            $view->with(['active_element_main_menu' => 'prepod']);
        });

        \View::composer('studentsection/*::*', function ($view) {
            $view->with(['active_element_main_menu' => 'course']);
        });

        \View::composer('material::*', function ($view) {
            $view->with(['active_element_main_menu' => 'material']);
        });

        \View::composer('practice::*', function ($view) {
            $view->with(['active_element_main_menu' => 'practice']);
        });

        \View::composer('user::*', function ($view) {
            $view->with(['active_element_main_menu' => 'profile']);
        });

        \View::composer('dictionary::*', function ($view) {
            $view->with(['active_element_main_menu' => 'dictionary']);
        });

        \View::share('active_element_main_menu', '');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Load the ide-helper service provider only in non production environments.
         */
        if ($this->app->environment() !== 'production' && class_exists('Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider')) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        parent::register();
    }

}
