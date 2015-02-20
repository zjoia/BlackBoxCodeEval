<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use TestBundle\Model\AbstractPaymentMethod;
use TestBundle\Entity\CreditCard;
use TestBundle\Entity\SafetyPayToken;
use TestBundle\Entity\Wallet;
use TestBundle\Entity\Cash;

/**
 * Transaction
 *
 * @Serializer\ExclusionPolicy("all")
 */
class Transaction
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $amount;

    /**
     * @var \TestBundle\Entity\TransactionType
     * @Serializer\Type("TestBundle\Entity\TransactionType")
     */
    protected $transactionType;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $createdAt;

    /**
     * @var updatetimestamp
     * @Serializer\Type("DateTime")
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \TestBundle\Entity\TransactionStatusType
     * @Serializer\Type("TestBundle\Entity\TransactionStatusType")
     * @Serializer\Expose
     */
    protected $status;

    /**
     * @var \TestBundle\Entity\Currency
     * @Serializer\Type("TestBundle\Entity\Currency")
     * @Serializer\Expose
     */
    protected $currency;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Order>")
     * @Serializer\Expose
     */
    protected $order;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\CreditCard>")
     * @Serializer\Expose
     */
    protected $creditCard;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Wallet>")
     * @Serializer\Expose
     */
    protected $wallet;

    /**
     * @var \TestBundle\Entity\GatewayResponseCode
     * @Serializer\Type("TestBundle\Entity\GatewayResponseCode")
     */
    protected $gatewayResponseCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\SafetyPayToken>")
     * @Serializer\Expose
     */
    protected $safetyPayTokens;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Cash>")
     * @Serializer\Expose
     */
    private $cash;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->order = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creditCard = new \Doctrine\Common\Collections\ArrayCollection();
        $this->wallet = new \Doctrine\Common\Collections\ArrayCollection();
        $this->safetyPayTokens = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cash = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set amount
     *
     * @param float $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = round($amount, 2);

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return round($this->amount, 2);
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Transaction
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set status
     *
     * @param \TestBundle\Entity\TransactionStatusType $status
     * @return Transaction
     */
    public function setStatus(\TestBundle\Entity\TransactionStatusType $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \TestBundle\Entity\TransactionStatusType
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set currency
     *
     * @param \TestBundle\Entity\Currency $currency
     * @return Transaction
     */
    public function setCurrency(\TestBundle\Entity\Currency $currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return \TestBundle\Entity\Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Add order
     *
     * @param \TestBundle\Entity\Order $order
     * @return Transaction
     */
    public function addOrder(\TestBundle\Entity\Order $order)
    {
        $order->addTransaction($this);
        $this->order[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \TestBundle\Entity\Order $order
     */
    public function removeOrder(\TestBundle\Entity\Order $order)
    {
        $this->order->removeElement($order);
    }

    /**
     * Get order
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->order;
    }

    /**
     * Get order
     *
     * @return \TestBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->getOrders()->first();
    }

    /**
     * Add creditCard
     *
     * @param \TestBundle\Entity\CreditCard $creditCard
     * @return Transaction
     */
    public function addCreditCard(\TestBundle\Entity\CreditCard $creditCard)
    {
        $this->creditCard[] = $creditCard;

        return $this;
    }

    /**
     * Remove creditCard
     *
     * @param \TestBundle\Entity\CreditCard $creditCard
     */
    public function removeCreditCard(\TestBundle\Entity\CreditCard $creditCard)
    {
        $this->creditCard->removeElement($creditCard);
    }

    /**
     * Get creditCard
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreditCards()
    {
        return $this->creditCard;
    }

    /**
     * Get creditCard
     *
     * @return \TestBundle\Entity\CreditCard
     */
    public function getCreditCard()
    {
        return $this->getCreditCards()->first();
    }

    /**
     * Add wallet
     *
     * @param \TestBundle\Entity\Wallet $wallet
     * @return Transaction
     */
    public function addWallet(\TestBundle\Entity\Wallet $wallet)
    {
        $this->wallet[] = $wallet;

        return $this;
    }

    /**
     * Remove wallet
     *
     * @param \TestBundle\Entity\Wallet $wallet
     */
    public function removeWallet(\TestBundle\Entity\Wallet $wallet)
    {
        $this->wallet->removeElement($wallet);
    }

    /**
     * Get wallet
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWallets()
    {
        return $this->wallet;
    }

    /**
     * Get wallet
     *
     * @return \TestBundle\Entity\Wallet
     */
    public function getWallet()
    {
        return $this->getWallets()->first();
    }

    public function addPaymentMethod(AbstractPaymentMethod $paymentMethod)
    {
        $paymentMethodName = $paymentMethod->getName();

        switch ($paymentMethodName)
        {
            case CreditCard::NAME:
                $this->addCreditCard($paymentMethod);
                break;

            case Wallet::NAME:
                $this->addWallet($paymentMethod);
                break;

            case SafetyPayToken::NAME:
                $this->addSafetyPayToken($paymentMethod);
                break;

            case Cash::NAME:
                $this->addCash($paymentMethod);
                break;
        }

        return $this;
    }

    public function getPaymentMethod()
    {
        $paymentMethod = $this->getCreditCard();
        if (!$paymentMethod) {
            $paymentMethod = $this->getWallet();
            if (!$paymentMethod) {
                $paymentMethod = $this->getSafetyPayToken();
                if (!$paymentMethod) {
                    $paymentMethod = $this->getCash()->first();
                    if (!$paymentMethod) {
                        $paymentMethod = null;
                    }
                }
            }
        }

        return $paymentMethod;
    }

    /**
     * Set transactionType
     *
     * @param \TestBundle\Entity\TransactionType $transactionType
     * @return Transaction
     */
    public function setTransactionType(\TestBundle\Entity\TransactionType $transactionType)
    {
        $this->transactionType = $transactionType;

        return $this;
    }

    /**
     * Get transactionType
     *
     * @return \TestBundle\Entity\TransactionType
     */
    public function getTransactionType()
    {
        return $this->transactionType;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Transaction
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param updatetimestamp $updatedAt
     * @return Transaction
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return updatetimestamp 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set gatewayResponseCode
     *
     * @param \TestBundle\Entity\GatewayResponseCode $gatewayResponseCode
     * @return Transaction
     */
    public function setGatewayResponseCode(\TestBundle\Entity\GatewayResponseCode $gatewayResponseCode = null)
    {
        $this->gatewayResponseCode = $gatewayResponseCode;

        return $this;
    }

    /**
     * Get gatewayResponseCode
     *
     * @return \TestBundle\Entity\GatewayResponseCode
     */
    public function getGatewayResponseCode()
    {
        return $this->gatewayResponseCode;
    }
    /**
     * @var \TestBundle\Entity\ForeignTransactionIdentifier
     */
    protected $foreignIdentifier;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $children;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $parents;


    /**
     * Set foreignIdentifier
     *
     * @param \TestBundle\Entity\ForeignTransactionIdentifier $foreignIdentifier
     * @return Transaction
     */
    public function setForeignIdentifier(\TestBundle\Entity\ForeignTransactionIdentifier $foreignIdentifier = null)
    {
        $this->foreignIdentifier = $foreignIdentifier;

        return $this;
    }

    /**
     * Get foreignIdentifier
     *
     * @return \TestBundle\Entity\ForeignTransactionIdentifier
     */
    public function getForeignIdentifier()
    {
        return $this->foreignIdentifier;
    }

    /**
     * Add children
     *
     * @param \TestBundle\Entity\Transaction $children
     * @return Transaction
     */
    public function addChild(\TestBundle\Entity\Transaction $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \TestBundle\Entity\Transaction $children
     */
    public function removeChild(\TestBundle\Entity\Transaction $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add parents
     *
     * @param \TestBundle\Entity\Transaction $parents
     * @return Transaction
     */
    public function addParent(\TestBundle\Entity\Transaction $parents)
    {
        $this->parents[] = $parents;

        return $this;
    }

    /**
     * Remove parents
     *
     * @param \TestBundle\Entity\Transaction $parents
     */
    public function removeParent(\TestBundle\Entity\Transaction $parents)
    {
        $this->parents->removeElement($parents);
    }

    /**
     * Get parents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParents()
    {
        return $this->parents;
    }

    /**
     * Get parent
     *
     * @return \TestBundle\Entity\Transaction
     */
    public function getParent()
    {
        return $this->parents->first();
    }

    /**
     * Add safetyPayTokens
     *
     * @param \TestBundle\Entity\SafetyPayToken $safetyPayTokens
     * @return Transaction
     */
    public function addSafetyPayToken(\TestBundle\Entity\SafetyPayToken $safetyPayTokens)
    {
        $this->safetyPayTokens[] = $safetyPayTokens;

        return $this;
    }

    /**
     * Remove safetyPayTokens
     *
     * @param \TestBundle\Entity\SafetyPayToken $safetyPayTokens
     */
    public function removeSafetyPayToken(\TestBundle\Entity\SafetyPayToken $safetyPayTokens)
    {
        $this->safetyPayTokens->removeElement($safetyPayTokens);
    }

    /**
     * Get safetyPayTokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSafetyPayTokens()
    {
        return $this->safetyPayTokens;
    }

    /**
     * Get safetyPayToken
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSafetyPayToken()
    {
        return $this->safetyPayTokens->first() ? $this->safetyPayTokens->first() : null;
    }

    /**
     * Add cash
     *
     * @param \TestBundle\Entity\Cash $cash
     * @return Transaction
     */
    public function addCash(\TestBundle\Entity\Cash $cash)
    {
        $this->cash[] = $cash;

        return $this;
    }

    /**
     * Remove cash
     *
     * @param \TestBundle\Entity\Cash $cash
     */
    public function removeCash(\TestBundle\Entity\Cash $cash)
    {
        $this->cash->removeElement($cash);
    }

    /**
     * Get cash
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCash()
    {
        return $this->cash;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commission;


    /**
     * Add commission
     *
     * @param \TestBundle\Entity\Commission $commission
     * @return Transaction
     */
    public function addCommission(\TestBundle\Entity\Commission $commission)
    {
        $this->commission[] = $commission;

        return $this;
    }

    /**
     * Remove commission
     *
     * @param \TestBundle\Entity\Commission $commission
     */
    public function removeCommission(\TestBundle\Entity\Commission $commission)
    {
        $this->commission->removeElement($commission);
    }

    /**
     * Get commission
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommission()
    {
        return $this->commission;
    }
}
