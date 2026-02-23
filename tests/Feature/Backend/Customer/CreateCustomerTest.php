<?php

namespace Tests\Feature\Backend;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Domains\Auth\Events\User\UserCreated;
use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Modules\Township\Entities\Township;

class CreateCustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test **/
    public function unauthenticated_users_cant_access_admin_dashboard()
    {
        $this->get('/admin/dashboard')->assertRedirect('/login');
    }

    /** @test **/
    public function an_admin_can_access_create_the_customer_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/customer/create');

        $response->assertOk();
    }

    /** @test **/
    public function create_customer_requires_validation()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/customer');

        $response->assertSessionHasErrors(['name', 'mobile', 'password']);
    }

    /** @test */
    public function customer_phone_must_unique()
    {
        $this->loginAsAdmin();

        User::factory()->create(['mobile' => '959253450835']);

        $response = $this->post('/admin/customer', [
            'mobile' => '959253450835',
        ]);

        $response->assertSessionHasErrors('mobile');

    }

    /** @test */
    // public function user_email_needs_to_be_unique()
    // {
    //     $this->loginAsAdmin();

    //     User::factory()->create(['email' => 'john@example.com']);

    //     $response = $this->post('/admin/auth/user', [
    //         'email' => 'john@example.com',
    //     ]);

    //     $response->assertSessionHasErrors('email');
    // }

    public function test_customer_create_success()
    {
        $this->loginAsAdmin();
        Role::factory()->create([
            'type'=>'user',
            'name' => 'user'
        ]);
        $township = Township::factory()->create();
        $data = [
            'name' => 'test',
            'mobile'=>'95954555372',
            'email' => 'testing@gmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
            'city_id' => $township->city_id,
            'township_id' => $township->id,
            'active' => 1,
            'confirmed' => 1,
            'is_vendor' => 1,
            'address' => 'Yangon',
            'latitude' => '3434.44334',
            'longitude' => '435345.4334'
        ];

        $response = $this->post('/admin/customer', $data);

        $this->assertDatabaseHas(
            'users',
            [
                'name' => 'test',
                'mobile'=>'95954555372',
                'email' => 'testing@gmail.com'
            ]
        );
        $this->assertDatabaseHas(
            'customers',
            [
                'name' => 'test',
                'city_id' => $township->city_id,
                'township_id' => $township->id,
            ]
        );

        $response->assertRedirect(route('admin.customer.index'));
    }
}
