<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\ContactOrder;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;

class RegionZoneCriterionType implements CriterionTypeInterface
{
    /**
     * Evaluate if the RegionZone of the User associated with this Transaction
     * is the same as the one associated with the GatewayCriterion
     *
     * @param GatewayCriterion $gatewayCriterion
     * @param Transaction $transaction
     * @return boolean
     */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {
        /** @var ContactOrder $contactOrder */
        $contactOrder = $transaction->getOrder()->getContactOrders()->first();

        if (!$contactOrder) {
            return false;
        }

        $user = $contactOrder->getContact()->getUser();

        return $gatewayCriterion->getRegionZones()->contains($user->getRegionZone());
    }
}
