<?php

namespace Tests\Feature\Backend\Customer;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Modules\Customer\Entities\Customer;

class DeleteCustomerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function admin_can_access_delete_customer_page()
    {
        $this->loginAsAdmin();

        $customer = Customer::factory()->create();

        $response = $this->delete('/admin/customer/'.$customer->id);

        $this->assertDatabaseMissing(
            'customers',
            [
                'id' => $customer->id,
                'deleted_at' => null
            ]
        );

        $response->assertRedirect(route('admin.customer.index'));

    }
}
