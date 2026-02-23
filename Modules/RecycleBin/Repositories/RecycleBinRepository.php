<?php

namespace Modules\RecycleBin\Repositories;

use Modules\RecycleBin\Entities\RecycleBin;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

/**
 * Class RecycleBinRepository.
 */
class RecycleBinRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(RecycleBin $model)
    {
        $this->model = $model;
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getAll($orderBy = 'created_at', $sort = 'desc')
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getForDataTable($submodule=null)
    {
        if($submodule){
            return $this->model->where('module',$submodule)
            ->select('*');
        }
        return $this->model
            ->select('*');
    }

    public function binCheckDeleted($module,$date)
    {
        if($module && $module = \Module::find($module)){
            if (in_array($module->getLowerName(), config('boilerplate.plural_table_name_bin'))) {
                $table = $module->getPluralName();
            } else {
                $table = $module->getLowerName();
            }
            // $table = $module->getLowerName();
            $deletedModule = DB::table($table)->select('id')->whereNotNull('deleted_at');

            if($date){
                    $startDate     = Carbon::parse($date);
                    $endDate       = Carbon::now();
                    $deletedModule  = $deletedModule->between('deleted_at',[$startDate,$endDate]);
            }

            $deletedModule = $deletedModule->get();

            foreach ($deletedModule as $key => $deleted) {
                if($this->model->where('related_row_id',$deleted->id)->where('module',$module->getName())->count() == 0){
                    $recyclebin = new RecycleBin;
                    $recyclebin->related_row_id = $deleted->id;
                    $recyclebin->module = $module->getName();
                    $recyclebin->eloquent = '\\Modules\\'.$module->getName().'\\Entities\\'.$module->getName();
                    $recyclebin->save();
                }
            }
        }
        else{
            foreach(\Module::getOrdered() as $module)
            {
                if($module->isEnabled() && !in_array($module->getLowerName(),config('boilerplate.ignored_bin'))){

                    if (in_array($module->getLowerName(), config('boilerplate.plural_table_name_bin'))) {
                        $table = $module->getPluralName();
                    } else {
                        $table = $module->getLowerName();
                    }

                    $deletedModule = DB::table($table)->select('id')->whereNotNull('deleted_at');

                    if($date){
                            $startDate     = Carbon::parse($date);
                            $endDate       = Carbon::now();
                            $deletedModule = $deletedModule->between('deleted_at',[$startDate,$endDate]);
                    }

                    $deletedModule = $deletedModule->get();

                    foreach ($deletedModule as $key => $deleted) {
                        if($this->model->where('related_row_id',$deleted->id)->where('module',$module->getName())->count() == 0){
                            $recyclebin = new RecycleBin;
                            $recyclebin->related_row_id = $deleted->id;
                            $recyclebin->module = $module->getName();
                            $recyclebin->eloquent = '\\Modules\\'.$module->getName().'\\Entities\\'.$module->getName();
                            $recyclebin->save();
                        }
                    }
                }
            }
        }
        // \Log::info('Success Bin');
        return "Successfully Sync Recycle Bin.";
    }
}
