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

    /** {@inheritdoc} */
    public function evaluate(AdjustmentRuleCriterion $adjustmentRuleCriterion, Order $order)
    {

    }
}
