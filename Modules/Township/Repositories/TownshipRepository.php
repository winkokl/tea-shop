<?php

namespace Modules\Township\Repositories;

use Modules\Township\Entities\Township;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TownshipRepository.
 */
class TownshipRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Township $model)
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
            ->select('*');
    }

    public function getTownshipById($regionId)
    {
        return $this->model
            ->where('region_id',$regionId)
            ->where('active',1)
            ->select('*')
            ->get();
    }
}
