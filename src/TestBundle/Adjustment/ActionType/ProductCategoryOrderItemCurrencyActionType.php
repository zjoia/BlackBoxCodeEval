<?php

namespace TestBundle\Adjustment\ActionType;

use TestBundle\Service\TypeService;
use TestBundle\Entity\AdjustmentRuleAction;
use TestBundle\Entity\Order;
use TestBundle\Adjustment\Traits\OrderItemProductCategoryFilterTrait;
use TestBundle\Repository\BaseRepository;
use TestBundle\Repository\ProductCategoryStructureRepository;

class ProductCategoryOrderItemCurrencyActionType implements ActionTypeInterface
{
    use OrderItemProductCategoryFilterTrait;

    /** @var BaseRepository */
    private $adjustmentResultRepository;
    /** @var TypeService */
    private $typeService;

    /**
     * @param TypeService                        $typeService
     * @param ProductCategoryStructureRepository $productCategoryStructureRepository
     * @param BaseRepository                     $adjustmentResultRepository
     */
    public function __construct
    (
        TypeService                        $typeService,
        ProductCategoryStructureRepository $productCategoryStructureRepository,
        BaseRepository                     $adjustmentResultRepository
    ) {
        $this->typeService                        = $typeService;
        $this->productCategoryStructureRepository = $productCategoryStructureRepository;
        $this->adjustmentResultRepository         = $adjustmentResultRepository;
    }

    /** {@inheritdoc} */
    public function apply(AdjustmentRuleAction $adjustmentRuleAction, Order $order)
    {

    }
}
