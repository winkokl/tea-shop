<?php

namespace Tests\Feature\Backend\Customer;

use App\Domains\Auth\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Modules\Customer\Entities\Customer;
use Tests\TestCase;

class UpdateCustomerTest extends TestCase
{
    public function test_customer_edit()
    {
        $this->loginAsAdmin();

        $customer  = Customer::factory()->create();

        $response = $this->get('/admin/customer/'.$customer->id.'/edit');

        $response->assertOk();
        $response->assertViewIs('customer::edit');
    }


    public function test_customer_update_success()
    {
        $this->loginAsAdmin();

        $customer = Customer::factory()->create();

        $data = [
            'name'    => 'phyo',
            'address' => 'Mandalay'
        ];

        $response = $this->patch('/admin/customer/'.$customer->id, $data);

        $this->assertDatabaseHas('customers', $data);

        $response->assertRedirect(route('admin.customer.index'));
    }
}
