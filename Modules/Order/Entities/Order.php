<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'orders';

    protected $fillable = [
        "id",
        "shop_id",
        "order_number",
        "table_id",
        "total_amount",
        "discount_amount",
        "final_amount",
        "payment_method",
        "payment_status",
        "order_status",
        "ordered_at",
        "customer_name",
        "customer_phone",
        "total",
        "status",
];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo(\Modules\Shop\Entities\Shop::class, 'shop_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table()
    {
        return $this->belongsTo(\Modules\Shoptable\Entities\Shoptable::class, 'table_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany(\Modules\Orderitem\Entities\Orderitem::class, 'order_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(\Modules\Orderitem\Entities\Orderitem::class, 'order_id', 'id');
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.order.view')){
            return '<a href="'.route('admin.order.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.order.edit')){
            return '<a href="'.route('admin.order.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.order.delete')) {
            return '<a href="'.route('admin.order.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger btn-sm"><i class="fas fa-trash" style="color: #fff;"></i>&nbsp;<span style="color: #fff;">Delete</span></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getShowButtonAttribute().' '.$this->getEditButtonAttribute().' '.$this->getDeleteButtonAttribute();
    }

    /**
     * @return string
     */
    public function getPaymentMethodLabelAttribute()
    {
        $methodClasses = [
            'cash' => 'badge badge-success',
            'kbzpay' => 'badge badge-primary',
            'wavepay' => 'badge badge-info',
            'card' => 'badge badge-warning'
        ];

        $methodLabels = [
            'cash' => 'Cash',
            'kbzpay' => 'KBZ Pay',
            'wavepay' => 'Wave Pay',
            'card' => 'Card'
        ];

        $class = $methodClasses[$this->payment_method] ?? 'badge badge-secondary';
        $label = $methodLabels[$this->payment_method] ?? ucfirst($this->payment_method);

        return "<span class='{$class}'>{$label}</span>";
    }

    /**
     * @return string
     */
    public function getPaymentStatusLabelAttribute()
    {
        $statusClasses = [
            'pending' => 'badge badge-warning',
            'paid' => 'badge badge-success',
            'cancelled' => 'badge badge-danger'
        ];

        $statusLabels = [
            'pending' => 'Pending',
            'paid' => 'Paid',
            'cancelled' => 'Cancelled'
        ];

        $class = $statusClasses[$this->payment_status] ?? 'badge badge-secondary';
        $label = $statusLabels[$this->payment_status] ?? ucfirst($this->payment_status);

        return "<span class='{$class}'>{$label}</span>";
    }

    /**
     * @return string
     */
    public function getOrderStatusLabelAttribute()
    {
        $statusClasses = [
            'pending' => 'badge badge-warning',
            'preparing' => 'badge badge-info',
            'completed' => 'badge badge-success',
            'cancelled' => 'badge badge-danger'
        ];

        $statusLabels = [
            'pending' => 'Pending',
            'preparing' => 'Preparing',
            'completed' => 'Completed',
            'cancelled' => 'Cancelled'
        ];

        $class = $statusClasses[$this->order_status] ?? 'badge badge-secondary';
        $label = $statusLabels[$this->order_status] ?? ucfirst($this->order_status);

        return "<span class='{$class}'>{$label}</span>";
    }
}
