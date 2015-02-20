<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * TransactionStatusType
 *
 * @Serializer\ExclusionPolicy("all")
 */
class TransactionStatusType
{
    const PENDING = 'Pending';
    const PENDING_REDIRECT_COMPLETE = 'PendingRedirectComplete';
    const FAILED = 'Failed';
    const COMPLETE = 'Complete';
    const CANCELED = 'Canceled';

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
     * @Serializer\Expose
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
     * Set id
     *
     * @param string $id
     * @return TransactionStatusType
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * @return TransactionStatusType
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
     * @return TransactionStatusType
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
