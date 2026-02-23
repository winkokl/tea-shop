<?php

namespace Modules\City\Entities;

use App\Enums\Table;
use Database\Factories\CityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Vendor\Entities\Vendor;
use Modules\Customer\Entities\Customer;

class City extends Model
{
    use SoftDeletes, HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::CITY;

    protected $fillable = [
                            "id",
                            "name",
                            "active"
                          ];

    /**
     * @return mixed
     */
    public function townships()
    {
        return $this->hasMany(Township::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'city_id');
    }

    /**
     * @return mixed
     */

    public function vendor()
    {
        return $this->belongsTo(Vendor::class,'id','city_id');
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.city.view')){
            return '<a href="'.route('admin.city.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.city.edit')){
            return '<a href="'.route('admin.city.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        $valid = Vendor::where('city_id',$this->id)->count();

        if (auth()->user()->can('admin.access.city.delete') && $valid <= 0 ) {
            return '<a href="'.route('admin.city.destroy', $this).'" data-method="delete"
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
    public function getStatusAttribute()
    {
        if ($this->active) {
            return "<span class='badge badge-success'>".__('labels.general.active').'</span>';
        }

        return "<span class='badge badge-danger'>".__('labels.general.inactive').'</span>';
    }

    protected static function newFactory()
    {
        return CityFactory::new();
    }
}
