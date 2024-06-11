<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\View\Components\forms\input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Event;

use App\Events\CategoryDeleting;
use App\Listeners\HandleCategoryDeletion;

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
        Blade::component('package-input', input::class);
        Blade::componentNamespace('App\\View\\Components\\forms', 'forms');
        Event::listen(
            CategoryDeleting::class,
            HandleCategoryDeletion::class
        );
        $this->getRoutes();
    }

    public function getRoutes()
    {
        Route::prefix('admin')
            ->middleware('web')
            ->as('admin.')
            ->group(base_path('routes/admin.php'));
    }
}
