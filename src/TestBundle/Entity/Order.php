<?php

namespace TestBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Order
 *
 * @Serializer\ExclusionPolicy("all")
 */
class Order
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\Expose
     */
    protected $number;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $preAdjustedShippingTotal = 0;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $shippingAdjustmentTotal;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\Expose
     */
    protected $volumeAdjustmentTotal;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $currencyAdjustmentTotal;

    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var OrderType
     */
    protected $orderType;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\OrderItem>")
     */
    protected $orderItems;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\OrderAddress>")
     */
    protected $orderAddresses;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ContactOrder>")
     */
    protected $contactOrders;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\AdjustmentResults>")
     */
    protected $adjustmentResults;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Transaction>")
     */
    protected $transactions;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\AutoPay>")
     */
    protected $autoPays;

    /**
     * @var bool
     */
    protected $isVoidable;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    protected $isRefundable;

    /**
     * @var bool
     * @Serializer\Type("boolean")
     */
    protected $isChargedback;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderItems = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orderAddresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contactOrders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adjustmentResults = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->autoPays = new \Doctrine\Common\Collections\ArrayCollection();

        $this->isVoidable = false;
        $this->isRefundable = false;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Order
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
     * Set number
     *
     * @param integer $number
     * @return Order
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set preAdjustedShippingTotal
     *
     * @param float $preAdjustedShippingTotal
     * @return Order
     */
    public function setPreAdjustedShippingTotal($preAdjustedShippingTotal)
    {
        $this->preAdjustedShippingTotal = round($preAdjustedShippingTotal, 2);

        return $this;
    }

    /**
     * Get preAdjustedShippingTotal
     *
     * @return float
     */
    public function getPreAdjustedShippingTotal()
    {
        return round($this->preAdjustedShippingTotal, 2);
    }

    /**
     * Get preAdjustedVolumeTotal
     *
     * @return integer
     */
    public function getPreAdjustedVolumeTotal()
    {
        $preAdjustedVolumeTotal = 0;
        /** @var OrderItem $orderItem */
        foreach($this->orderItems AS $orderItem){
            $preAdjustedVolumeTotal += $orderItem->getPreAdjustedVolumeTotal();

        }

        return $preAdjustedVolumeTotal;
    }

    /**
     * Get preAdjustedCurrencySubtotal
     *
     * @return float
     */
    public function getPreAdjustedCurrencySubtotal()
    {
        $preAdjustedCurrencyTotal = 0;
        /** @var OrderItem $orderItem */
        foreach($this->orderItems AS $orderItem){
            $preAdjustedCurrencyTotal += $orderItem->getPreAdjustedCurrencyTotal();

        }

        return round($preAdjustedCurrencyTotal, 2);
    }

    /**
     * Set shippingAdjustmentTotal
     *
     * @param float $shippingAdjustmentTotal
     * @return Order
     */
    public function setShippingAdjustmentTotal($shippingAdjustmentTotal)
    {
        $this->shippingAdjustmentTotal = round($shippingAdjustmentTotal, 2);

        return $this;
    }

    /**
     * Get shippingAdjustmentTotal
     *
     * @return float
     */
    public function getShippingAdjustmentTotal()
    {
        return $this->shippingAdjustmentTotal;
    }

    /**
     * Set volumeAdjustmentTotal
     *
     * @param integer $volumeAdjustmentTotal
     * @return Order
     */
    public function setVolumeAdjustmentTotal($volumeAdjustmentTotal)
    {
        $this->volumeAdjustmentTotal = $volumeAdjustmentTotal;

        return $this;
    }

    /**
     * Get volumeAdjustmentTotal
     *
     * @return integer
     */
    public function getVolumeAdjustmentTotal()
    {
        return $this->volumeAdjustmentTotal;
    }

    /**
     * Get volumeAdjustmentTotal
     *
     * @return integer
     */
    public function getCombinedVolumeAdjustmentTotal()
    {
        $orderItemVolumeAdjustmentTotal = 0;
        /** @var OrderItem $orderItem */
        foreach($this->orderItems AS $orderItem){
            $orderItemVolumeAdjustmentTotal += $orderItem->getVolumeAdjustmentTotal();

        }

        return $this->getVolumeAdjustmentTotal() + $orderItemVolumeAdjustmentTotal;
    }

    /**
     * Set currencyAdjustmentTotal
     *
     * @param float $currencyAdjustmentTotal
     * @return Order
     */
    public function setCurrencyAdjustmentTotal($currencyAdjustmentTotal)
    {
        $this->currencyAdjustmentTotal = round($currencyAdjustmentTotal, 2);

        return $this;
    }

    /**
     * Get currencyAdjustmentTotal
     *
     * @return float
     */
    public function getCurrencyAdjustmentTotal()
    {
        return $this->currencyAdjustmentTotal;
    }

    /**
     * Get currencyAdjustmentTotal
     *
     * @return float
     */
    public function getCombinedCurrencyAdjustmentTotal()
    {
        $orderItemCurrencyAdjustmentTotal = 0;

        /** @var OrderItem $orderItem */
        foreach ($this->orderItems AS $orderItem)
        {
            $orderItemCurrencyAdjustmentTotal += $orderItem->getCurrencyAdjustmentTotal();
        }

        return round($this->getCurrencyAdjustmentTotal() + $orderItemCurrencyAdjustmentTotal, 2);
    }

    /**
     * Calculates shipping total after adjustments are made
     *
     * @return float
     */
    public function getAdjustedShippingTotal() {
        return round($this->getPreAdjustedShippingTotal() + $this->getShippingAdjustmentTotal(), 2);
    }

    /**
     * Calculates volume total after adjustments are made
     *
     * @return integer
     */
    public function getAdjustedVolumeTotal() {
        return $this->getPreAdjustedVolumeTotal() + $this->getCombinedVolumeAdjustmentTotal();
    }

    /**
     * Calculates currency subtotal after adjustments are made
     *
     * @return float
     */
    public function getAdjustedCurrencySubtotal() {
        return round($this->getPreAdjustedCurrencySubtotal() - $this->getCombinedCurrencyAdjustmentTotal(), 2);
    }

    /**
     * Calculates currency total after adjustments are made and tax/shipping are added
     *
     * @return float
     */
    public function getAdjustedCurrencyTotal() {
        return round($this->getAdjustedCurrencySubtotal() + $this->getAdjustedShippingTotal() + $this->getTaxTotal(), 2);
    }

    /**
     * Add orderItems
     *
     * @param \TestBundle\Entity\OrderItem $orderItems
     * @return Order
     */
    public function addOrderItem(\TestBundle\Entity\OrderItem $orderItems)
    {
        $this->orderItems[] = $orderItems;

        return $this;
    }

    /**
     * Remove orderItems
     *
     * @param \TestBundle\Entity\OrderItem $orderItems
     */
    public function removeOrderItem(\TestBundle\Entity\OrderItem $orderItems)
    {
        $this->orderItems->removeElement($orderItems);
    }

    /**
     * Get orderItems
     *
     * @return ArrayCollection
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }

    /**
     * Add orderAddresses
     *
     * @param \TestBundle\Entity\OrderAddress $orderAddresses
     * @return Order
     */
    public function addOrderAddress(\TestBundle\Entity\OrderAddress $orderAddresses)
    {
        $this->orderAddresses[] = $orderAddresses;

        return $this;
    }

    /**
     * Remove orderAddresses
     *
     * @param \TestBundle\Entity\OrderAddress $orderAddresses
     */
    public function removeOrderAddress(\TestBundle\Entity\OrderAddress $orderAddresses)
    {
        $this->orderAddresses->removeElement($orderAddresses);
    }

    /**
     * Get orderAddresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderAddresses()
    {
        return $this->orderAddresses;
    }

    /**
     * Add contactOrders
     *
     * @param \TestBundle\Entity\ContactOrder $contactOrders
     * @return Order
     */
    public function addContactOrder(\TestBundle\Entity\ContactOrder $contactOrders)
    {
        $contactOrders->setOrder($this);
        $this->contactOrders[] = $contactOrders;

        return $this;
    }

    /**
     * Remove contactOrders
     *
     * @param \TestBundle\Entity\ContactOrder $contactOrders
     */
    public function removeContactOrder(\TestBundle\Entity\ContactOrder $contactOrders)
    {
        $this->contactOrders->removeElement($contactOrders);
    }

    /**
     * Get contactOrders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactOrders()
    {
        return $this->contactOrders;
    }

    /**
     * @param $typeName
     * @return Contact
     */
    public function getContactByContactOrderTypeName($typeName)
    {
        if($orderFor = $this->getContactOrderByTypeName($typeName))
        {
            return $orderFor->getContact();
        }

        throw new \UnexpectedValueException("Order does not have an OrderFor record of type '$typeName'");
    }

    /**
     * @param $typeName
     * @return ContactOrder
     */
    public function getContactOrderByTypeName($typeName)
    {
        return $this->getContactOrders()->filter(function($contactOrder) use ($typeName) {
            /** @var ContactOrder $contactOrder */
            return ($contactOrder->getContactOrderType()->getName() === $typeName);
        })->first();
    }

    /**
     * @return ContactOrder
     * @throws \LogicException
     */
    public function getOrderFor()
    {
        return $this->getContactOrderByTypeName(ContactOrderType::ORDER_FOR);
    }

    /**
     * Add adjustmentResult
     *
     * @param \TestBundle\Entity\AdjustmentResult $adjustmentResult
     * @return Order
     */
    public function addAdjustmentResult(\TestBundle\Entity\AdjustmentResult $adjustmentResult)
    {
        $this->adjustmentResults[] = $adjustmentResult;

        return $this;
    }

    /**
     * Remove adjustmentResult
     *
     * @param \TestBundle\Entity\AdjustmentResult $adjustmentResult
     */
    public function removeAdjustmentResult(\TestBundle\Entity\AdjustmentResult $adjustmentResult)
    {
        $this->adjustmentResults->removeElement($adjustmentResult);
    }

    /**
     * Get adjustments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdjustmentResults()
    {
        return $this->adjustmentResults;
    }

    /**
     * Add transactions
     *
     * @param \TestBundle\Entity\Transaction $transactions
     * @return Order
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

    /**
     * Get tax total from order items
     *
     * @return float
     */
    public function getTaxTotal()
    {
        $taxTotal = 0;
        /** @var OrderItem $orderItem */
        foreach ($this->getOrderItems() as $orderItem) {
            $taxTotal += $orderItem->getTaxTotal();
        }

        return round($taxTotal, 2);
    }

    /**
     * Add autoPays
     *
     * @param \TestBundle\Entity\AutoPay $autoPays
     * @return Order
     */
    public function addAutoPay(\TestBundle\Entity\AutoPay $autoPays)
    {
        $this->autoPays[] = $autoPays;
        $autoPays->addOrder($this);

        return $this;
    }

    /**
     * Remove autoPays
     *
     * @param \TestBundle\Entity\AutoPay $autoPays
     */
    public function removeAutoPay(\TestBundle\Entity\AutoPay $autoPays)
    {
        $this->autoPays->removeElement($autoPays);
    }

    /**
     * Get autoPays
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutoPays()
    {
        return $this->autoPays;
    }

    /**
     * convenience method for a one to maybe
     */
    public function getAutoPay()
    {
        return $this->getAutoPays()->first();
    }

    /**
     * Set orderType
     *
     * @param \TestBundle\Entity\OrderType $orderType
     * @return Order
     */
    public function setOrderType(\TestBundle\Entity\OrderType $orderType)
    {
        $this->orderType = $orderType;

        return $this;
    }

    /**
     * Get orderType
     *
     * @return \TestBundle\Entity\OrderType
     */
    public function getOrderType()
    {
        return $this->orderType;
    }

    /**
     * Get OrderAddress of type OrderAddressType::SHIPPING
     *
     * @return \TestBundle\Entity\OrderAddress
     */
    public function getShippingAddress()
    {
        return $this->getOrderAddressByType(OrderAddressType::SHIPPING);
    }

    /**
     * Get OrderAddress of type OrderAddressType::BILLING
     *
     * @return \TestBundle\Entity\OrderAddress
     */
    public function getBillingAddress()
    {
        return $this->getOrderAddressByType(OrderAddressType::BILLING);
    }

    /**
     * @param $typeName
     * @return OrderAddress
     */
    public function getOrderAddressByType($typeName)
    {
        $orderAddresses = $this->getOrderAddresses();

        return (count($orderAddresses) == 1 && $orderAddresses->first()->getType()->getName() == OrderAddressType::BOTH) ?
            $orderAddresses->first() :
            $orderAddresses->filter(
                function(OrderAddress $orderAddress) use ($typeName)
                {
                    if($orderAddress->getType()->getName() === $typeName)
                    {
                        return true;
                    }
                }
            )->first();
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Order
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
     * Get total of associated Transactions with passed TransactionType
     *
     * @param TransactionType $transactionType
     * @return float
     */
    public function getTransactionTotalByType(TransactionType $transactionType)
    {
        $total = 0.00;

        /** @var Transaction $transaction */
        foreach($this->getTransactions() as $transaction)
        {
            if($transaction->getTransactionType() == $transactionType)
            {
                $total += $transaction->getAmount();
            }
        }

        return $total;
    }

    /**
     * @param boolean $isRefundable
     */
    public function setIsRefundable($isRefundable)
    {
        $this->isRefundable = $isRefundable;
    }

    /**
     * @return boolean
     */
    public function getIsRefundable()
    {
        return $this->isRefundable;
    }

    /**
     * @param boolean $isChargedback
     */
    public function setIsChargedback($isChargedback)
    {
        $this->isChargedback = $isChargedback;
    }

    /**
     * @return boolean
     */
    public function getIsChargedback()
    {
        return $this->isChargedback;
    }

    /**
     * @param boolean $isVoidable
     */
    public function setIsVoidable($isVoidable)
    {
        $this->isVoidable = $isVoidable;
    }

    /**
     * @return boolean
     */
    public function getIsVoidable()
    {
        return $this->isVoidable;
    }

    /**
     * @return CreditCard|null
     */
    public function getCreditCard()
    {
        /** @var Transaction $transaction */
        foreach ($this->getTransactions() as $transaction)
        {
            if
            (
                $transaction->getStatus()->getName() == TransactionStatusType::COMPLETE
                && in_array($transaction->getTransactionType()->getName(), [TransactionType::SALE, TransactionType::CAPTURE])
            )
            {
                if ($creditCard = $transaction->getCreditCard())
                {
                    return $creditCard;
                }
            }
        }

        return null;
    }
}
