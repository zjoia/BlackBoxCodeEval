<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;

interface CriterionTypeInterface
{
    /**
     * Evaluate if this Transaction meets this GatewayCriterion
     *
     * @param GatewayCriterion $gatewayCriterion
     * @param Transaction $transaction
     * @return boolean
     */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction);
}
