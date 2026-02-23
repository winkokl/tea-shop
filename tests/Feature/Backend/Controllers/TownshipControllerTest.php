<?php

namespace Tests\Feature\Backend\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\City\Entities\City;
use Modules\Township\Entities\Township;
use Tests\TestCase;

class TownshipControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_township_index_success()
    {
        $this->loginAsAdmin();
        $response = $this->get('/admin/township');
        $response->assertOk()
                ->assertViewIs('township::index');
    }
    public function test_township_create_page()
    {
        $this->loginAsAdmin();
        $response = $this->get('/admin/township/create');
        $response->assertOk()
                ->assertViewIs('township::create')
                ->assertViewHas('cities');
    }

    public function test_township_create_validation_error()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/township', []);

        $response->assertSessionHasErrors(['name', 'city_id']);

    }

    public function test_township_create_success()
    {
        $this->loginAsAdmin();

        $city = City::factory()->create();

        $data = [
            'name'    => $this->faker->word,
            'city_id' => $city->id,
            'active'  => 1
        ];

        $response = $this->post('/admin/township', $data);

        $this->assertDatabaseHas('township', $data);

        $response->assertRedirect(route('admin.township.index'));
    }

    public function test_township_edit()
    {
        $this->loginAsAdmin();

        $township  = Township::factory()->create();

        $response = $this->get('/admin/township/'.$township->id.'/edit');

        $response->assertOk();
        $response->assertViewIs('township::edit');
    }

    public function test_township_update_success()
    {
        $this->loginAsAdmin();

        $township = Township::factory()->create();

        $city = City::factory()->create();

        $data = [
            'name'    => $this->faker->word,
            'city_id' => $city->id,
            'active'  => 1
        ];

        $response = $this->patch('/admin/township/'.$township->id, $data);

        $this->assertDatabaseHas('township', $data);

        $response->assertRedirect(route('admin.township.index'));
    }

    public function test_township_delete_success()
    {
        $this->loginAsAdmin();

        $township = Township::factory()->create();

        $response = $this->delete('/admin/township/'.$township->id);

        $this->assertDatabaseMissing(
            'township',
            [
                'id' => $township->id,
                'deleted_at' => null
            ]
        );

        $response->assertRedirect(route('admin.township.index'));
    }
}
