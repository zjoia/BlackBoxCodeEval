<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\ContactOrder;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;
use TestBundle\Entity\TransactionType;

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
        //TODO fix the description as it is incorrect this test want to know that a Contact has never had a ChargeBack transaction
        /** @var ContactOrder $contactOrder */
        $contactOrder = $transaction->getOrder()->getContactOrders()->first();

        if ($contactOrder) {
            $contact = $contactOrder->getContact();

            $chargeBackOrders = $contact->getContactOrders()->filter(function (ContactOrder $order) {
                return $order->getOrder()->getTransactions()->filter(function (Transaction $transaction) {
                    return $transaction->getTransactionType()->getName() == TransactionType::CHARGE_BACK;
                })->count() > 0;
            });

            return $chargeBackOrders->count() == 0;
        }

        return false;
    }
}
