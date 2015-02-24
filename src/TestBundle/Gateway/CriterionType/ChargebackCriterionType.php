<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;

class ChargebackCriterionType implements CriterionTypeInterface
{
    /**
     * Evaluate if the Contact associated with this Transaction has ever had
     * an Order with a Transaction of TransactionType ChargeBack
     *
     * @param GatewayCriterion $gatewayCriterion
     * @param Transaction $transaction
     * @return boolean
     */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

    }
}
