<?php

namespace Tests\Feature\Backend\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppSettingControllerTest extends TestCase
{
    public function test_app_setting_index_success()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/appsetting');

        $response->assertStatus(200);
    }


    public function test_app_setting_update_success()
    {
        $this->loginAsAdmin();

        $content = file_get_contents(base_path() . '/.env.testing');

        $response = $this->post('/admin/appsetting', [
            'tab' => 'emailAndSms',
            'mail_mailer' => 'market_mail',
            'filename' => 'env.testing',
        ]);

        $response->assertSessionHas(['flash_success' => __('appsetting::alerts.backend.appsetting.updated')]);

    }

    public function test_app_setting_update_fail()
    {
        $this->loginAsAdmin();

        $content = file_get_contents(base_path() . '/.env.testing');

        $response = $this->post('/admin/appsetting', [
            'tab' => 'emailAndSms',
            'change_name' => 'Market',
            'filename' => 'env.testing',
        ]);

        if (strpos($content, 'CHANGE_NAME="Market"') === false) {
            $response->assertStatus(302);
        }
    }
}
