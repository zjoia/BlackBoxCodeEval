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

    /** @inheritdoc */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

    }
}
