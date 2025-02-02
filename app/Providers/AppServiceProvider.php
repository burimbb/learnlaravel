<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Mixins\StrMixins;
use App\PostCardSendingService;
use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function () {
            if (request()->has('credit')) {
                return new CreditPaymentGateway('euro');
            }
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('Postcard', function () {
            return new PostCardSendingService('us', 4, 6);
        });

        /* Str::macro('partNumber', function ($nr) {
            return 'AB-' . substr($nr, 0, 3) . '-' . substr($nr, 3);
        }); */

        Str::mixin(new StrMixins());

        Blade::if('hellomember', function(){
            return true;
        });

        //changed from data => [] to items => []
        Resource::wrap('items');
    }

    /**
     * Destructor of this class AppServiceProvider
     */
    public function __destruct()
    {
        Log::critical("Destructed App Service Provider");
    }
}
