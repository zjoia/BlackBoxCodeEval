<?php

namespace TestBundle\Adjustment\Traits;

use Doctrine\Common\Collections\Collection;
use TestBundle\Repository\ProductCategoryStructureRepository;

trait OrderItemProductCategoryFilterTrait
{
    /** @var ProductCategoryStructureRepository */
    private $productCategoryStructureRepository;

    public function getOrderItemsByCategoryName($categoryName, Collection $orderItems)
    {

    }
}
