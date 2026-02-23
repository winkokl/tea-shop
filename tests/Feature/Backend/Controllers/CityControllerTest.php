<?php

namespace Tests\Feature\Backend\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_city_index_success()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/city');

        $response->assertStatus(200);
    }

    /** @test **/
    public function test_create_city_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/city/create');

        $response->assertOk();
    }

    /** @test **/
    public function create_city_requires_validation()
    {
        $this->loginAsAdmin();

        $response = $this->post('admin/city');

        $response->assertSessionHasErrors(['name']);
    }

    /** @test **/
    public function test_create_city_success()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/city', [
            'name' => 'test'
        ]);

        $this->assertDatabaseHas(
            'city',
            [
                'name' => 'test'
            ]
        );

        $response->assertSessionHas(['flash_success' => __('city::alerts.backend.city.created')]);
    }
}
