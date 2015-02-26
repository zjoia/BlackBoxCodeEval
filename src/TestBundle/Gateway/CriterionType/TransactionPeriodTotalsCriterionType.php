<?php

namespace TestBundle\Gateway\CriterionType;

use TestBundle\Entity\TransactionType;
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

    /**
     * Evaluate the total of all Transactions for a Gateway in a PeriodType that are both
     * associated to GatewayCriterion against the GatewayCriterion value and Operator
     *
     * @param GatewayCriterion $gatewayCriterion
     * @param Transaction $transaction
     * @uses TransactionRepository::getTotalsByPeriodType
     * @uses MathService::compare
     * @return boolean
     */
    public function evaluate(GatewayCriterion $gatewayCriterion, Transaction $transaction)
    {

        return $this->mathService->compare(
            $this->transactionRepository->getTotalsByPeriodType($gatewayCriterion->getPeriodType()),
            $gatewayCriterion->getGatewayCriterionOperator()->getOperatorType()->getName(),
            $gatewayCriterion->getGatewayCriterionValue()->getValue()
        );

    }
}
