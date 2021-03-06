<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Service\MathService;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;

class EnrollmentDateCriterionType implements CriterionTypeInterface
{
    /** @var MathService */
    private $mathService;

    /**
     * @param MathService $mathService
     */
    public function __construct(MathService $mathService)
    {
        $this->mathService = $mathService;
    }

    /**
     * Evaluate the createdAt field of the Member associated with this
     * Transaction against the GatewayCriterion value and Operator
     *
     * @param GatewayCriterion $gatewayCriterion
     * @param Transaction $transaction
     * @uses MathService::compare
     * @return boolean
     */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

    }
}
