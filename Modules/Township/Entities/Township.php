<?php

namespace Modules\Township\Entities;

use App\Enums\Table;
use Database\Factories\TownshipFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Region\Entities\Region;
use Modules\Customer\Entities\Customer;

class Township extends Model
{
    use SoftDeletes,HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::TOWNSHIP;

    protected $fillable = [ "id",
                            "name",
                            "mm_name",
                            "region_id",
                            "active"
                            ];

    public function region(){
        return $this->belongsTo(Region::class, 'region_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'township_id');
    }

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.township.view')){
            return '<a href="'.route('admin.township.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp; View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.township.edit')){
            return '<a href="'.route('admin.township.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp; Edit</a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.township.delete')) {
            return '<a href="'.route('admin.township.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger btn-sm"><i class="fas fa-trash" style="color:#fff;"></i>&nbsp; <span style="color:#fff;"> Delete </span></a> ';
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
        if($this->active){
            return "<span class='badge badge-success'>Active</span>";
        }
        return "<span class='badge badge-danger'>Inactive</span>";
    }

    protected static function newFactory()
    {
        return TownshipFactory::new();
    }
}
