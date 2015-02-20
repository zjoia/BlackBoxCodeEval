<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;

class AccountTypeCriterionType implements CriterionTypeInterface
{
    /** @inheritdoc */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

    }
}
