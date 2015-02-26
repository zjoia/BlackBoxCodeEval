<?php

namespace TestBundle\Adjustment\CriterionType;

use Monolog\Logger;
use TestBundle\Adjustment\Traits\OrderItemProductCategoryFilterTrait;
use TestBundle\Entity\AdjustmentRuleCriterion;
use TestBundle\Entity\Order;
use TestBundle\Repository\ProductCategoryStructureRepository;

class ProductCategoryCriterionType implements CriterionTypeInterface
{
    use OrderItemProductCategoryFilterTrait;

    /** @var Logger */
    private $logger;

    public function __construct(ProductCategoryStructureRepository $productCategoryStructureRepository, Logger $logger)
    {
        $this->productCategoryStructureRepository = $productCategoryStructureRepository;
        $this->logger = $logger;
    }

    /**
     * Evaluate if this order meets this AdjustmentRuleCriterion
     *
     * @param AdjustmentRuleCriterion $adjustmentRuleCriterion
     * @param Order $order
     * @return boolean
     */
    public function evaluate(AdjustmentRuleCriterion $adjustmentRuleCriterion, Order $order)
    {
        return count($this->getOrderItemsByCategoryName($adjustmentRuleCriterion->getProductCategory(), $order->getOrderItems())) > 0;
    }
}
