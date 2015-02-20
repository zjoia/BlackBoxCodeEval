<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Service\MathService;
use TestBundle\Entity\GatewayCriterion;
use TestBundle\Entity\Transaction;
use TestBundle\Repository\TransactionRepository;

class TransactionPeriodTotalsCriterionType implements CriterionTypeInterface
{
    /** @var MathService */
    private $mathService;
    /** @var TransactionRepository */
    private $transactionRepository;

    /**
     * @param MathService           $mathService
     * @param TransactionRepository $transactionRepository
     */
    public function __construct(MathService $mathService, TransactionRepository $transactionRepository)
    {
        $this->mathService           = $mathService;
        $this->transactionRepository = $transactionRepository;
    }

    /** @inheritdoc */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

    }
}
