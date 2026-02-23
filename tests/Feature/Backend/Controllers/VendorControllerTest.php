<?php

namespace Tests\Feature\Backend\Controllers;

use App\Domains\Auth\Models\Role;
use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\City\Entities\City;
use Modules\Township\Entities\Township;
use Modules\Vendor\Entities\Vendor;
use Tests\TestCase;

class VendorControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_vendor_index_success()
    {
        $this->loginAsAdmin();
        $response = $this->get('/admin/vendor');
        $response->assertOk()
                ->assertViewIs('vendor::index');
    }
    public function test_vendor_create_page()
    {
        $this->loginAsAdmin();
        $response = $this->get('/admin/vendor/create');
        $response->assertOk()
                ->assertViewIs('vendor::create')
                ->assertViewHas('cities');
    }

    public function test_vendor_create_validation_error()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/vendor',[]);

        $response->assertSessionHasErrors(['name','mobile','password']);

        $township = Township::factory()->create();

        $user  = User::factory()->create();

        $name = 'a';

        for($i=0 ; $i < 200 ;$i++) $name .= 'a';

        $data = [
            'name' => $name,
            'type' => 'admin',
            'user_id' => $user->id,
            'mobile'=>'954555372',
            'email' => 'testinggmail.com',
            'password' => '123456',
            'password_confirmation' => '123456',
            'city_id' => $township->city_id,
            'township_id' => $township->id,
            'active' => 1,
            'confirmed' => 1,
            'is_vendor' => 1
        ];

        $response = $this->post('/admin/vendor', $data);

        $response->assertSessionHasErrors(['name','mobile','email']);

    }

    public function test_vendor_create_success()
    {
        $this->loginAsAdmin();
        Role::factory()->create([
            'type'=>'admin',
            'name' => 'vendor'
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

        $response = $this->post('/admin/vendor', $data);

        $this->assertDatabaseHas(
            'users',
            [
                'name' => 'test',
                'mobile'=>'95954555372',
                'email' => 'testing@gmail.com'
            ]
        );
        $this->assertDatabaseHas(
            'vendors',
            [
                'name' => 'test',
                'mobile'=>'95954555372',
                'city_id' => $township->city_id,
                'township_id' => $township->id
            ]
        );

        $response->assertRedirect(route('admin.vendor.index'));
    }

    public function test_vendor_edit()
    {
        $this->loginAsAdmin();

        $vendor  = Vendor::factory()->create();

        $response = $this->get('/admin/vendor/'.$vendor->id.'/edit');

        $response->assertOk();
        $response->assertViewIs('vendor::edit');
    }

    public function test_vendor_update_validation_error()
    {
        $this->loginAsAdmin();

        $vendor = Vendor::factory()->create();

        $response = $this->patch('/admin/vendor/'.$vendor->id, []);

        $response->assertSessionHasErrors(['name','mobile']);

        $user = User::factory()->create([
            'email' => 'testing@gmail.com'
        ]);

        Vendor::factory()->create([
            'user_id' => $user->id
        ]);

        $existingVendor = Vendor::factory()->create();

        $response = $this->patch('/admin/vendor/'.$existingVendor->id, [
            'name' => 'Testing',
            'mobile' => '959954555372',
            'email' => 'testing@gmail.com'
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    public function test_vendor_update_success()
    {
        $this->loginAsAdmin();

        $vendor = Vendor::factory()->create();

        $data = [
            'name'    => 'phyo',
            'mobile'  => '95923850396'
        ];

        $response = $this->patch('/admin/vendor/'.$vendor->id, $data);

        $this->assertDatabaseHas('vendors', $data);

        $response->assertRedirect(route('admin.vendor.index'));
    }

    public function test_vendor_delete_success()
    {
        $this->loginAsAdmin();

        $vendor = Vendor::factory()->create();

        $response = $this->delete('/admin/vendor/'.$vendor->id);

        $this->assertDatabaseMissing(
            'vendors',
            [
                'id' => $vendor->id,
                'deleted_at' => null
            ]
        );

        $response->assertRedirect(route('admin.vendor.index'));
    }
}
