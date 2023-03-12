<?php

namespace App\Providers;

use App\Filament\Pages\MyProfile;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\HtmlString;
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
        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');
            Filament::pushMeta([
                new HtmlString('<script src="https://js.stripe.com/v3/"></script>'),
            ]);

            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->url(MyProfile::getUrl()),
            ]);
        });
    }
}
