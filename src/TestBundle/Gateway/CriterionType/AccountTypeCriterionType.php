<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;

class AccountTypeCriterionType implements CriterionTypeInterface
{
    /**
     * Evaluate if the AccountType of the Member associated with this Transaction
     * is the same as the one associated with the GatewayCriterion
     *
     * @param GatewayCriterion $gatewayCriterion
     * @param Transaction $transaction
     * @return boolean
     */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

    }
}
