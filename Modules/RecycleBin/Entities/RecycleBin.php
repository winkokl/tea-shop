<?php

namespace Modules\RecycleBin\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Enums\Table;

class RecycleBin extends Model
{
    use SoftDeletes;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::RECYCLE_BIN;

    protected $fillable = ["id"];

       /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.recyclebin.view')){
            return '<a href="'.route('admin.recyclebin.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.recyclebin.edit')){
            return '<a href="'.route('admin.recyclebin.destroy', $this).'" data-method="delete" 
            data-trans-button-cancel="'.__('buttons.general.cancel').'"
            data-trans-button-confirm="'.__('buttons.general.crud.restore').'"
            data-trans-title="'.__('strings.backend.general.are_you_sure').'" class="btn btn-primary btn-sm"><i class="fas fas fa-sync-alt" style="color: #fff;"></i></i>&nbsp;<span style="color:#fff;">Restore</span></a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.recyclebin.delete')) {
            return '<a href="'.route('admin.recyclebin.destroy', $this).'" data-method="delete"
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
            return $this->getShowButtonAttribute().' '.$this->getEditButtonAttribute();
    }
}
