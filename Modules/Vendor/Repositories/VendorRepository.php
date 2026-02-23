<?php

namespace Modules\Vendor\Repositories;

use Modules\Vendor\Entities\Vendor;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VendorRepository.
 */
class VendorRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Vendor $model)
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
    public function getForDataTable()
    {
        return $this->model
            ->select('*')->with('township','user','region');
    }

    public function getDeletedVendorForDataTable()
    {
        return $this->model
            ->with('township','user','region')
            ->onlyTrashed();
    }
}
