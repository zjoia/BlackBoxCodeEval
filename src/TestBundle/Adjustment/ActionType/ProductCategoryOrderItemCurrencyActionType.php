<?php

namespace TestBundle\Adjustment\ActionType;

use TestBundle\Entity\AdjustmentResult;
use TestBundle\Entity\AdjustmentResultType;
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
        $orderItems = $this->getOrderItemsByCategoryName($adjustmentRuleAction->getProductCategory(), $order->getOrderItems());

        if (count($orderItems) > 0) {
            $adjustment = new AdjustmentResult();
            $adjustment->setValue($adjustmentRuleAction->getAdjustmentRuleActionValue()->getValue());
            $adjustment->setOperatorType($adjustmentRuleAction->getAdjustmentRuleActionOperator()->getOperatorType());
            $adjustment->setAdjustmentResultType(new AdjustmentResultType(AdjustmentResultType::ORDER_ITEM_CURRENCY));

            foreach ($orderItems as $orderItem) {
                $adjustment->addOrderItem($orderItem);
            }

            $this->adjustmentResultRepository->persist($adjustment);
            $this->adjustmentResultRepository->flush();
        }
    }
}
