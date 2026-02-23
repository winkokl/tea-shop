<?php

namespace Modules\AppSetting\Repositories;

use Modules\AppSetting\Entities\AppSetting;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AppSettingRepository.
 */
class AppSettingRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(AppSetting $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable()
    {
        // return $this->model
        //     ->select('*');
        return [];
    }

    public function update($request)
    {
        $data = $request->except('_token','_method','tab');
        if($request->tab == 'basic'){
            $main_logo_url =  config('appsetting.basic.main_logo');

            if($request->hasFile('main_logo')){
                 $file = $request->file('main_logo');
                 $logoname = 'main_logo.'.$file->extension();
                 $main_logo = explode("/", $main_logo_url);
                 \File::delete('app_data/'. end($main_logo));
                 $file->move('app_data/', $logoname);
                 $data['main_logo'] =  url('app_data/'.$logoname);
             }

            $defaults = $this->getBasicDefault();
            
        }else if($request->tab == 'payment'){
            $defaults = [
                            config('appsetting.payment.2c2p.version'),
                            config('appsetting.payment.2c2p.currency'),
                            config('appsetting.payment.2c2p.secret_key'),
                            config('appsetting.payment.2c2p.payment_url'),
                            config('appsetting.payment.2c2p.frontend_url'),
                            config('appsetting.payment.2c2p.backend_url'),
                            config('appsetting.payment.2c2p.charge_type'),
                            config('appsetting.payment.2c2p.charge'),

                            config('appsetting.payment.kbz.version'),
                            config('appsetting.payment.kbz.currency'),
                            config('appsetting.payment.kbz.app_id'),
                            config('appsetting.payment.kbz.merchant_code'),
                            config('appsetting.payment.kbz.merchant_key'),
                            config('appsetting.payment.kbz.payment_url'),
                            config('appsetting.payment.kbz.frontend_url'),
                            config('appsetting.payment.kbz.backend_url'),
                            config('appsetting.payment.kbz.charge_type'),
                            config('appsetting.payment.kbz.charge'),

                            config('appsetting.payment.cod.charge_type'),
                            config('appsetting.payment.cod.charge'),
                            config('appsetting.payment.cod.note'),
                        ];

            $twoctwop_enable = (isset($data['2c2p_enable']))?"true":"false";
            unset($data['2c2p_enable']);
            $data['2c2p_enable'] =  $twoctwop_enable;

            $kbz_enable = (isset($data['kbz_enable']))?"true":"false";
            unset($data['kbz_enable']);
            $data['kbz_enable'] =  $kbz_enable;

            $cod_enable = (isset($data['cod_enable']))?"true":"false";
            unset($data['cod_enable']);
            $data['cod_enable'] = $cod_enable;

            $defaults[] = config('appsetting.payment.2c2p.enable')?"true":"false";
            $defaults[] = config('appsetting.payment.kbz.enable')?"true":"false";
            $defaults[] = config('appsetting.payment.cod.enable')?"true":"false";

        } else if($request->tab == 'emailAndSms'){
            $defaults = [
                            config('sms.sms_poh_sender_name'),
                            config('sms.sms_poh_host'),
                            config('sms.sms_poh_token'),
                        ];
            $sms_poh_enable = (isset($data['sms_poh_enable'])) ? "true":"false";
            unset($data['sms_poh_enable']);
            $data['sms_poh_enable'] = $sms_poh_enable;
            $defaults[] = config('sms.sms_poh_enable')?"true":"false";
        }

        $content = file_get_contents(base_path() . '/.env');

        // replace default values with new ones
        $i = 0;
        foreach ($data as $key => $value) {
            $content = str_replace(strtoupper($key).'="'.$defaults[$i].'"', strtoupper($key).'="'.$value.'"', $content);
            $i++;
        }

        // Update .env file
        $path = base_path('.env');
        if(file_exists($path)) {
            file_put_contents($path, $content);
        }
        \Log::info('User Updated App Setting: ' . auth()->user()->name);
         return true;
    }

    private function getBasicDefault()
    {
        $defaults = array(
                        config('appsetting.basic.app_name'),
                        config('appsetting.basic.email'),
                        config('appsetting.basic.fb_link'),
                        config('appsetting.basic.phone'),
                        config('appsetting.basic.address'),
                        config('app.meta_keywords'),
                        config('app.meta_description'),
                        config('appsetting.basic.main_logo'),
                    );
        return $defaults;   
    }
}
