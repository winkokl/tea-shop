<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Product\Entities\ProductAttribute;

class CreateVariationRule implements Rule
{
    private $productId;
    private $attributeValueId;

    public function __construct($productId, $attributeValueId)
    {
        $this->productId = $productId;
        $this->attributeValueId = $attributeValueId;
    }

    public function passes($attribute, $value)
    {
        $count = ProductAttribute::whereHas('productItem', function ($query) {
            $query->where('product_id', $this->productId);
        })->where('attribute_value_id', $this->attributeValueId)->count();

        return $count === 0;
    }

    public function message()
    {
        return 'The attribute value must be unique for the given product and attribute.';
    }
}

