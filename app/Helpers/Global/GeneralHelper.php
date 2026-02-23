<?php

use Carbon\Carbon;
use Jenssegers\Agent\Agent;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'Welcome');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        $agent = new Agent();
        if (auth()->check()) {

            if (auth()->user()->isMasterAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isVendor()) {

                if ( $agent->isMobile()){
                    return 'frontend.vendor_home';
                }else{
                    return 'admin.dashboard';
                }
            }

            if (auth()->user()->isUser()) {

                if ( $agent->isMobile()){
                     return 'frontend.index';
                }else{
                    return 'frontend.user.dashboard';
                }
            }
        }

        return 'frontend.index';
    }
}
