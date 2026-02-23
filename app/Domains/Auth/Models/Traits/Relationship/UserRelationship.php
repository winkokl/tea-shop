<?php

namespace App\Domains\Auth\Models\Traits\Relationship;

use App\Domains\Auth\Models\PasswordHistory;
use Modules\Customer\Entities\Customer;
use Modules\Vendor\Entities\Vendor;
use Modules\Order\Entities\Order;

/**
 * Class UserRelationship.
 */
trait UserRelationship
{
    /**
     * @return mixed
     */
    public function passwordHistories()
    {
        return $this->morphMany(PasswordHistory::class, 'model');
    }

    /**
     * Get the dealer associated with the user.
     */

    public function vendor()
    {
        return $this->hasOne(Vendor::class);
    }

    /**
     * Get the customer associated with the user.
     */
    public function customer()
    {
        return $this->hasOne(Customer::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    
}
