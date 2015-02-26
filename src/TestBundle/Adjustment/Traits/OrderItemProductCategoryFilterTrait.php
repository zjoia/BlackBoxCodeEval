<?php

namespace TestBundle\Adjustment\Traits;

use Doctrine\Common\Collections\Collection;
use TestBundle\Entity\OrderItem;
use TestBundle\Entity\ProductCategory;
use TestBundle\Repository\ProductCategoryStructureRepository;

trait OrderItemProductCategoryFilterTrait
{
    /** @var ProductCategoryStructureRepository */
    private $productCategoryStructureRepository;

    /**
     * @param $categoryName
     * @param Collection $orderItems
     * @return Array<OrderItem>
     */
    public function getOrderItemsByCategoryName($categoryName, Collection $orderItems)
    {
        $productCategory = new ProductCategory();
        $productCategory->setName($categoryName);

        return $orderItems->filter(function (OrderItem $orderItem) use ($productCategory) {
           return $orderItem->getProduct()->getProductProductCategories()->contains($productCategory);
        })->toArray();
    }
}
