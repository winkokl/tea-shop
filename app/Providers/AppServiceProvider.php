<?php

namespace App\Providers;

use Blade;
use Carbon\Carbon;
use GMBF\MyanmarPhoneNumber;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Request;
use Schema;
use App\Domains\Auth\Models\User;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Sets third party service providers that are only needed on local/testing environments
        if ($this->app->environment() !== 'production') {
            /**
             * Loader for registering facades.
             */
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();

            // Load third party local aliases
            $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades::class);
        }

        // $this->app->singleton(
        //     BookingRespositoryContract::class,
        //     EloquentBookingRepository::class
        // );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {

        setlocale(LC_TIME, config('app.locale_php'));

        // setLocale to use Carbon source locales. Enables diffForHumans() localized
        Carbon::setLocale(config('app.locale'));

        

        // Force SSL in production
        if ($this->app->environment() === 'production') {
            \URL::forceScheme('https');
        }
        $this->customValidator($request);

        Paginator::useBootstrap();

        Blade::if('readonly', function () {
            return config('app.read_only');
        });

        /*
         * The block of code inside this directive indicates
         * the chosen language requests RTL support.
         */
        Blade::if('langrtl', function ($session_identifier = 'lang-rtl') {
            return session()->has($session_identifier);
        });

        Schema::defaultStringLength(191);
    }

    public function customValidator($request)
    {
        $this->app['validator']->extend('valid_phone_number', function ($attribute, $value, $parameters) use ($request) {
            $phone_number = new MyanmarPhoneNumber();
            if ($phone_number->is_valid($value)) {
                return true;
            }
            return false;
        });

        $this->app['validator']->extend('unique_user_email_or_mobile',function($attribute, $value, $parameters) use ($request) {
            
            if (is_numeric($value)){
                $phoneNumber = new MyanmarPhoneNumber();
                $value       = $phoneNumber->add_prefix($value);
            }

            $user = User::where('mobile',$value)->orWhere('email',$value)->first();
            
            if(!$user){
                return true;
            }
            
            return false;
        });

        $this->app['validator']->extend('valid_phone_number_or_email', function($attribute, $value, $parameters) use ($request) {
            if (is_numeric($value)){

                $phoneNumber = new MyanmarPhoneNumber();
                if ($phoneNumber->is_valid($value)) {
                    return true;
                }
                
                return false;
            }elseif (filter_var($value, FILTER_VALIDATE_EMAIL)) {
                return true;
            }

            return false;
        });
    }
}
