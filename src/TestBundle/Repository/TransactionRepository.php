<?php

namespace TestBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Query\Expr;
use TestBundle\Entity\Order;
use TestBundle\Entity\PeriodType;
use TestBundle\Entity\TransactionStatusType;
use TestBundle\Entity\TransactionType;

/**
 * Class TransactionRepository
 * @package TestBundle\Repository
 */
class TransactionRepository extends BaseRepository
{
    /**
     * Returns all transactions with the specified TransactionStatusType->name and OrderStatusType->name
     *
     * @param string $status
     * @param string $contactOrderType
     * @return ArrayCollection<Transaction>
     */
    public function findByStatusAndContactOrderType($status, $contactOrderType)
    {
        $nowDateTime = new \DateTime();
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('t')
            ->from('WunSharedDomainModelsBundle:Transaction', 't')
            ->innerJoin('t.order', 'o')
            ->innerJoin('t.status', 'tst')
            ->innerJoin('o.contactOrders', 'co')
            ->innerJoin('co.contactOrderType', 'cot')
            ->where('tst.name = :status')
            ->andWhere('cot.name = :contact_order_type')
            ->andWhere('t.createdAt < :today')
            ->setMaxResults(100)
            ->setParameter('status', $status)
            ->setParameter('contact_order_type', $contactOrderType)
            ->setParameter('today', $nowDateTime->format(\DateTime::W3C))
        ;

        return $qb->getQuery()->getResult();
    }

    /**
     * Returns the count of transactions for the given order
     *
     * @param string $orderId
     * @param string $transactionStatusName
     * @return int
     */
    public function getCountByOrderAndStatus($orderId, $transactionStatusName)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('count(t)')
            ->from('WunSharedDomainModelsBundle:Transaction', 't')
            ->innerJoin('t.order', 'o')
            ->innerJoin('t.status', 'ts')
            ->where('o.id = :order_id')
            ->andWhere('ts.name = :transactionStatusName')

            ->setParameter('order_id', $orderId)
            ->setParameter('transactionStatusName', $transactionStatusName)
        ;

        return (int) $qb->getQuery()->getSingleScalarResult();
    }

    /**
     * Returns the pending transactions for the given order
     *
     * @param $order
     * @return ArrayCollection<Transaction>
     */
    public function getPendingTransactionsByOrder(Order $order)
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('t')
            ->from('WunSharedDomainModelsBundle:Transaction', 't')
            ->innerJoin('t.order', 'o')
            ->innerJoin('t.status', 'tst')
            ->where('o.id = :order_id')
            ->andWhere('tst.name = :status')

            ->setParameters([
                'order_id' => $order->getId(),
                'status'   => TransactionStatusType::PENDING
            ]);

        return $qb->getQuery()->getResult();
    }

    /**
     * @param $periodType
     * @param array $gateways
     * @param array $transactionTypeNames
     * @param array $transactionStatusTypeNames
     * @return mixed
     */
    public function getTotalsByPeriodType(
        PeriodType $periodType,
        array $gateways                   = [],
        array $transactionTypeNames       = [TransactionType::SALE, TransactionType::CAPTURE],
        array $transactionStatusTypeNames = [TransactionStatusType::COMPLETE]
    ) {
        switch($periodType->getName())
        {
            case PeriodType::DAY:
                $dateTime = new \DateTime('Today');
                break;
            case PeriodType::WEEK:
                $dateTime = new \DateTime('This Sunday');
                break;
            case PeriodType::MONTH:
                $dateTime = new \DateTime('First day of ' . date('F Y'));
                break;
            case PeriodType::YEAR:
                $dateTime = new \DateTime('First day of January ' . date('Y'));
                break;
            default:
                throw new \UnexpectedValueException('Unexpected PeriodType Name');
        }

        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('SUM(t.amount)')
            ->from('TestBundle\Entity\Transaction', 't')
            ->innerJoin('t.transactionType', 'tt')
            ->innerJoin('t.status', 'tst')
            ->innerJoin('t.gatewayResponseCode', 'grc')
            ->where('t.updatedAt >= :DateTime')
            ->andWhere('tt.name IN (:TransactionTypeNames)')
            ->andWhere('tst.name IN (:TransactionStatusTypeNames)')
            ->setParameters([
                'DateTime'                   => $dateTime,
                'TransactionTypeNames'       => $transactionTypeNames,
                'TransactionStatusTypeNames' => $transactionStatusTypeNames
            ]);

        if(count($gateways))
        {
            $qb
                ->andWhere('grc.gateway IN (:Gateways)')
                ->setParameter('Gateways', $gateways);
        }

        return $qb->getQuery()->getSingleScalarResult();
    }
}
