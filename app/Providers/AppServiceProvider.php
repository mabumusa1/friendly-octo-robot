<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use App\Filament\Pages\MyProfile;
use Illuminate\Support\HtmlString;

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
        Filament::pushMeta([
            new HtmlString('<script src="https://js.stripe.com/v3/"></script>'),
        ]);

        Filament::pushMeta([
            new HtmlString('<meta name="stripe-key" content="'. env('STRIPE_KEY').'">'),
        ]);


        Filament::serving(function () {
            Filament::registerViteTheme('resources/css/filament.css');

            Filament::registerUserMenuItems([
                'account' => UserMenuItem::make()->url(MyProfile::getUrl()),
            ]);

        });

    }
}
