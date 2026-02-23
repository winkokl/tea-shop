<?php
namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Product\Entities\ProductAttribute;

class UniqueAttributeValue implements Rule
{
    private $productItemId;
    private $attributeId;

    public function __construct($productItemId, $attributeId)
    {
        $this->productItemId = $productItemId;
        $this->attributeId = $attributeId;
    }

    public function passes($attribute, $value)
    {
        $count = ProductAttribute::where('product_item_id', $this->productItemId)
            ->where('attribute_id', $this->attributeId)
            ->where('attribute_value_id', $value)
            ->count();

        return $count === 0;
    }

    public function message()
    {
        return 'The attribute value must be unique.';
    }
}

