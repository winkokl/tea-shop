<?php
use App\Helpers\General\HtmlHelper;
use GuzzleHttp\Client as GuzzleHttpC;
use GuzzleHttp\Exception\BadResponseException;

if (! function_exists('app_name')) {
    /**
     * Helper to grab the application name
     *
     * @return mixed
     */
    function app_name()
    {
        return config('app.name');
    }
}

if (! function_exists('module_path')) {
    function module_path($name, $path = '')
    {
        $module = app('modules')->find($name);

        return $module->getPath() . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (! function_exists('style')) {

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return mixed
     */
    function style($url, $attributes = [], $secure = null)
    {
        return resolve(HtmlHelper::class)->style($url, $attributes, $secure);
    }
}

if (! function_exists('script')) {

    /**
     * @param       $url
     * @param array $attributes
     * @param null  $secure
     *
     * @return mixed
     */
    function script($url, $attributes = [], $secure = null)
    {
        return resolve(HtmlHelper::class)->script($url, $attributes, $secure);
    }
}

if (! function_exists('form_cancel')) {

    /**
     * @param        $cancel_to
     * @param        $title
     * @param string $classes
     *
     * @return mixed
     */
    function form_cancel($cancel_to, $title, $classes = 'btn btn-danger btn-sm')
    {
        return resolve(HtmlHelper::class)->formCancel($cancel_to, $title, $classes);
    }
}

if (! function_exists('form_submit')) {

    /**
     * @param        $title
     * @param string $classes
     *
     * @return mixed
     */
    function form_submit($title, $classes = 'btn btn-success btn-sm pull-right')
    {
        return resolve(HtmlHelper::class)->formSubmit($title, $classes);
    }
}

if (! function_exists('get_user_timezone')) {

    /**
     * @return string
     */
    function get_user_timezone()
    {
        if (auth()->user()) {
            return auth()->user()->timezone;
        }

        return 'UTC';
    }
}

if (! function_exists('rand_color')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function rand_color()
    {
        $colors = array('primary','secondary','success','danger','warning','info','lightdark');

        shuffle($colors);

        return $colors;
    }
}

if (! function_exists('send_sms')) {

    function send_sms($mobile,$message,$description='SMS',$class=1,$priority=0)
    {
        if(config('sms.sms_poh_enable') == 'true')
        {
    
            $sender = appName();
            $input = array(
                    'to'      => $mobile,
                    'message' => $message,
                    'sender'  => $sender
                    );
            $input = json_encode($input);

            $http = new GuzzleHttpC(['headers' => 
                                            array( 
                                            'Authorization' => 'Bearer '.config('sms.sms_poh_token'),
                                            'Content-Type' => 'application/json' 
                                            )
                                    ]);
            try{

                $response = $http->post(config('sms.sms_poh_host'),[
                    'body' => $input
                ]);
                $response = json_decode($response->getBody(), true);
                
                \Log::notice(' Send SMS Response : '.$mobile.' '. json_encode($response));
    
                return true;
            }
            catch(BadResponseException $e){
            $response = $e->getResponse();                              
            \Log::error(' Send SMS Error Response : '.$mobile.' '. json_encode($response));

            return false;
            }
        }
    }
}

