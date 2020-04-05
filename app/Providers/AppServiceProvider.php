<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Community any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Services\CommunityServiceInterface', 'App\Services\CommunityService'); // community
        $this->app->bind('App\Contracts\Services\UserRegisterServiceInterface', 'App\Services\UserRegisterService'); //user_register
        $this->app->bind('App\Contracts\Services\BillPaymentServiceInterface', 'App\Services\BillPaymentService'); //bill_payment

        $this->app->bind('App\Contracts\Dao\CommunityDaoInterface', 'App\Dao\CommunityDao'); //community
        $this->app->bind('App\Contracts\Dao\UserRegisterDaoInterface', 'App\Dao\UserRegisterDao'); //user_register
        $this->app->bind('App\Contracts\Dao\BillPaymentDaoInterface', 'App\Dao\BillPaymentDao'); //bill_payment
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
