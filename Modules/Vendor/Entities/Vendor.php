<?php

namespace Modules\Vendor\Entities;

use App\Enums\Table;
use Database\Factories\VendorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Modules\Region\Entities\Region;
use Modules\Township\Entities\Township;
use App\Domains\Auth\Models\User;

class Vendor extends Model
{
    use SoftDeletes, HasFactory;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = Table::VENDORS;

    protected $fillable = [
        "id",
        "user_id",
        "vendor_ref",
        "name",
        "mobile",
        "nrc",
        "address",
        "logo",
        "shop_photo",
        "region_id",
        "township_id",
        "latitude",
        "longitude",
        "opening_time",
        "closing_time",
        "bank_info",
        "delivery"
        ];

       /**
     * @return string
     */

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id','id');
    }

    public function township()
    {
        return $this->belongsTo(Township::class, 'township_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getShowButtonAttribute()
    {
        if(auth()->user()->can('admin.access.vendor.view') && !$this->deleted_at){
            return '<a href="'.route('admin.vendor.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info btn-sm"><i class="fas fa-search"></i>&nbsp;View</a>';
        }
        return '';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        if(auth()->user()->can('admin.access.vendor.view') && !$this->deleted_at){
            return '<a href="'.route('admin.vendor.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>&nbsp;Edit</a>';
        }
        return '';
    }

     /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        if (auth()->user()->can('admin.access.vendor.delete') && !$this->deleted_at) {
            return '<a href="'.route('admin.vendor.destroy', $this).'" data-method="delete"
                 data-trans-button-cancel="'.__('buttons.general.cancel').'"
                 data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                 data-trans-title="'.__('strings.backend.general.are_you_sure').'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.delete').'" class="btn btn-danger btn-sm"><i class="fas fa-trash" style="color: #fff;"></i>&nbsp;<span style="color:#fff;">Delete</span></a> ';
        }

        return '';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        if(auth()->user()->can('admin.access.vendor') && $this->deleted_at){
            
            return '<a href="'.route('admin.vendor.restore', $this->id).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.access.users.activate').'" class="btn btn-info btn-sm"><i class="fas fa-sync-alt" style="color: #fff;"></i>&nbsp;<span style="color:#fff;">Restore</span></a>';
            
        }

        return '';
    }

    /**
     * @return string
     */
    public function getMoreMenuLinkAttribute()
    {
        if (auth()->user()->isMasterAdmin()) {

        return  '<div class="dropdown d-inline-block">'.'
                        <a class="btn btn-sm btn-secondary dropdown-toggle" id="moreMenuLink" href="#" role="button" data-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false">
                                '.__('More').'
                        </a>
            
                        <div class="dropdown-menu" aria-labelledby="moreMenuLink">'.
                            $this->getChangePasswordBtnAttribute().
                            $this->getLoginAsBtnAttribute().
                            $this->activateDeactivateBtn()
                            .'
                        </div>
                </div>';
        }        
    }

    public function getChangePasswordBtnAttribute()
    {
        return '<a class="dropdown-item" href="'.route('admin.auth.user.change-password', $this->user).'">'.__('Change Password').'</a>';
    }

    public function getLoginAsBtnAttribute()
    {
        return '<a class="dropdown-item" href="'.route('impersonate', $this->user->id).'">'.__('Login As '.$this->user->name).'</a>';    
    }

    /**
     * @return string
     */
    public function activateDeactivateBtn()
    {
        if(auth()->user()->can('admin.access.customer')){
            if(!$this->user->active){
                return '<a href="'.route('admin.auth.user.mark', [$this->user,1]).'" 
                        data-method="patch" 
                        data-toggle="tooltip" 
                        data-placement="top"
                        class="dropdown-item">'.
                        __('Activate')
                        .'</a>';

            }else{
                return '<a href="'.route('admin.auth.user.mark', [$this->user,0]).'" 
                        data-method="patch" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        class="dropdown-item">
                        '.__('Deactivate').'
                        </a>';

                // return '<a class="dropdown-item" href="'.route('admin.auth.user.mark', [$this->user,0]).'">'.__('Deactivate').'</a>'
            }
        }

        return '';
    }
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
            return $this->getShowButtonAttribute().' '.$this->getEditButtonAttribute().' '.$this->getRestoreButtonAttribute().' '.$this->getDeleteButtonAttribute().' '.$this->getMoreMenuLinkAttribute();
    }

    protected static function newFactory()
    {
        return VendorFactory::new();
    }
}
