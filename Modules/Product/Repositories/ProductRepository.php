<?php

namespace Modules\Product\Repositories;

use Modules\Product\Entities\Product;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function __construct(Product $model)
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
            ->with(['shop', 'category'])
            ->join('shops', 'product.shop_id', '=', 'shops.id')
            ->join('productcats', 'product.category_id', '=', 'productcats.id')
            ->select('product.*', 'shops.name as shop_name', 'productcats.name as category_name');
    }
}
