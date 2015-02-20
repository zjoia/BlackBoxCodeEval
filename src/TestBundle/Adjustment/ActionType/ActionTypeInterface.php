<?php

namespace TestBundle\Adjustment\ActionType;

use TestBundle\Entity\AdjustmentRuleAction;
use TestBundle\Entity\Order;

interface ActionTypeInterface
{
    /**
     * Create and persist an Adjustment entity
     *
     * @param AdjustmentRuleAction $action
     * @param Order $order
     */
    public function apply(AdjustmentRuleAction $action, Order $order);
}
