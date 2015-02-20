<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * TransactionType
 *
 * @Serializer\ExclusionPolicy("all")
 */
class TransactionType
{
    const AUTH = 'Auth';
    const CAPTURE = 'Capture';
    const SALE = 'Sale';
    const VOID = 'Void';
    const REFUND = 'Refund';
    const CHARGE_BACK = 'ChargeBack';

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Transaction>")
     */
    protected $transactions;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TransactionType
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add transactions
     *
     * @param \TestBundle\Entity\Transaction $transactions
     * @return TransactionType
     */
    public function addTransaction(\TestBundle\Entity\Transaction $transactions)
    {
        $this->transactions[] = $transactions;

        return $this;
    }

    /**
     * Remove transactions
     *
     * @param \TestBundle\Entity\Transaction $transactions
     */
    public function removeTransaction(\TestBundle\Entity\Transaction $transactions)
    {
        $this->transactions->removeElement($transactions);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransactions()
    {
        return $this->transactions;
    }
}
