<?php

namespace TestBundle\Adjustment\CriterionType;

use Symfony\Component\Validator\Exception\MissingOptionsException;
use TestBundle\Entity\AdjustmentRuleCriterion;
use TestBundle\Entity\Order;

interface CriterionTypeInterface
{
    /**
     * Evaluate if this order meets this AdjustmentRuleCriterion
     *
     * @param AdjustmentRuleCriterion $adjustmentRuleCriterion
     * @param Order $order
     * @return boolean
     */
    public function evaluate(AdjustmentRuleCriterion $adjustmentRuleCriterion, Order $order);
}
