<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * OrderItem
 *
 * @Serializer\ExclusionPolicy("all")
 */
class OrderItem
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
    protected $quantity;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $preAdjustedPerItemCurrencyTotal = 0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\Expose
     */
    protected $preAdjustedPerItemVolumeTotal = 0;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \TestBundle\Entity\Order
     * @Serializer\Type("TestBundle\Entity\Order")
     * @Serializer\Expose
     */
    protected $order;

    /**
     * @var \TestBundle\Entity\ProductVariant
     * @Serializer\Type("TestBundle\Entity\ProductVariant")
     * @Serializer\Expose
     */
    protected $productVariant;

    /**
     * @var \TestBundle\Entity\historicalTaxRate
     * @Serializer\Type("TestBundle\Entity\historicalTaxRate")
     * @Serializer\Expose
     */
    protected $historicalTaxRates;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\AdjustmentResult>")
     * @Serializer\Expose
     */
    protected $adjustmentResults;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ShippingStatusType>")
     * @Serializer\Expose
     */
    protected $shippingStatusTypes;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $perItemCurrencyAdjustmentTotal;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\Expose
     */
    protected $perItemVolumeAdjustmentTotal;

    /**
     * @var \TestBundle\Entity\Tracking
     */
    private $tracking;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adjustmentResults = new \Doctrine\Common\Collections\ArrayCollection();
        $this->shippingStatusTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->historicalTaxRates = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set quantity
     *
     * @param integer $quantity
     * @return OrderItem
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return integer 
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set preAdjustedPerItemCurrencyTotal
     *
     * @param float $preAdjustedPerItemCurrencyTotal
     * @return OrderItem
     */
    public function setPreAdjustedPerItemCurrencyTotal($preAdjustedPerItemCurrencyTotal)
    {
        $this->preAdjustedPerItemCurrencyTotal = round($preAdjustedPerItemCurrencyTotal, 2);

        return $this;
    }

    /**
     * @return float
     */
    public function getPreAdjustedPerItemCurrencyTotal()
    {
        return round($this->preAdjustedPerItemCurrencyTotal, 2);
    }

    /**
     * Calculates item price * qty
     *
     * @return float 
     */
    public function getPreAdjustedCurrencyTotal()
    {
        return round($this->getPreAdjustedPerItemCurrencyTotal() * $this->getQuantity(), 2);
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return OrderItem
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
     * Set preAdjustedPerItemVolumeTotal
     *
     * @param integer $preAdjustedPerItemVolumeTotal
     * @return Order
     */
    public function setPreAdjustedPerItemVolumeTotal($preAdjustedPerItemVolumeTotal)
    {
        $this->preAdjustedPerItemVolumeTotal = $preAdjustedPerItemVolumeTotal;

        return $this;
    }

    /**
     * Get preAdjustedPerItemVolumeTotal
     *
     * @return integer
     */
    public function getPreAdjustedPerItemVolumeTotal()
    {
        return $this->preAdjustedPerItemVolumeTotal;
    }

    /**
     * Get preAdjustedVolumeTotal
     *
     * @return integer
     */
    public function getPreAdjustedVolumeTotal()
    {
        return $this->preAdjustedPerItemVolumeTotal * $this->getQuantity();
    }

    /**
     * Set order
     *
     * @param \TestBundle\Entity\Order $order
     * @return OrderItem
     */
    public function setOrder(\TestBundle\Entity\Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \TestBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set productVariant
     *
     * @param \TestBundle\Entity\ProductVariant $productVariant
     * @return OrderItem
     */
    public function setProductVariant(\TestBundle\Entity\ProductVariant $productVariant)
    {
        $this->productVariant = $productVariant;

        return $this;
    }

    /**
     * Get productVariant
     *
     * @return \TestBundle\Entity\ProductVariant
     */
    public function getProductVariant()
    {
        return $this->productVariant;
    }

    /**
     * Get product
     *
     * @return \TestBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->getProductVariant()->getProduct();
    }

    /**
     * Add adjustmentResult
     *
     * @param \TestBundle\Entity\AdjustmentResult $adjustmentResult
     * @return OrderItem
     */
    public function addAdjustmentResult(\TestBundle\Entity\AdjustmentResult $adjustmentResult)
    {
        $this->adjustmentResults[] = $adjustmentResult;

        return $this;
    }

    /**
     * Remove adjustmentsResult
     *
     * @param \TestBundle\Entity\AdjustmentResult $adjustmentResult
     */
    public function removeAdjustmentResult(\TestBundle\Entity\AdjustmentResult $adjustmentResult)
    {
        $this->adjustmentResults->removeElement($adjustmentResult);
    }

    /**
     * Get adjustmentResults
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdjustmentResults()
    {
        return $this->adjustmentResults;
    }

    /**
     * Get historical tax rates
     *
     * @return HistoricalTaxRate
     */
    public function getHistoricalTaxRates()
    {
        return $this->historicalTaxRates;
    }

    /**
     * Add historical tax rate
     *
     * @param \TestBundle\Entity\HistoricalTaxRate $historicalTaxRates
     * @return OrderItem
     */
    public function addHistoricalTaxRate(\TestBundle\Entity\HistoricalTaxRate $historicalTaxRates)
    {
        $this->historicalTaxRates[] = $historicalTaxRates;

        return $this;
    }

    /**
     * Add shippingStatusTypes
     *
     * @param \TestBundle\Entity\ShippingStatusType $shippingStatusTypes
     * @return OrderItem
     */
    public function addShippingStatusType(\TestBundle\Entity\ShippingStatusType $shippingStatusTypes)
    {
        $this->shippingStatusTypes[] = $shippingStatusTypes;

        return $this;
    }

    /**
     * Remove shippingStatusTypes
     *
     * @param \TestBundle\Entity\ShippingStatusType $shippingStatusTypes
     */
    public function removeShippingStatusType(\TestBundle\Entity\ShippingStatusType $shippingStatusTypes)
    {
        $this->shippingStatusTypes->removeElement($shippingStatusTypes);
    }

    /**
     * Get shippingStatusTypes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getShippingStatusTypes()
    {
        return $this->shippingStatusTypes;
    }

    /**
     * Set currencyAdjustmentTotal
     *
     * @param float $perItemCurrencyAdjustmentTotal
     * @return OrderItem
     */
    public function setPerItemCurrencyAdjustmentTotal($perItemCurrencyAdjustmentTotal)
    {
        $this->perItemCurrencyAdjustmentTotal = round($perItemCurrencyAdjustmentTotal, 2);

        return $this;
    }

    /**
     * Get currencyAdjustmentTotal
     *
     * @return float
     */
    public function getPerItemCurrencyAdjustmentTotal()
    {
        return round($this->perItemCurrencyAdjustmentTotal, 2);
    }

    /**
     * Get currencyAdjustmentTotal
     *
     * @return float
     */
    public function getCurrencyAdjustmentTotal()
    {
        return $this->getPerItemCurrencyAdjustmentTotal() * $this->getQuantity();
    }

    /**
     * Set volumeAdjustmentTotal
     *
     * @param integer $volumeAdjustmentTotal
     * @return OrderItem
     */
    public function setPerItemVolumeAdjustmentTotal($volumeAdjustmentTotal)
    {
        $this->perItemVolumeAdjustmentTotal = $volumeAdjustmentTotal;

        return $this;
    }

    /**
     * Get perItemVolumeAdjustmentTotal
     *
     * @return integer
     */
    public function getPerItemVolumeAdjustmentTotal()
    {
        return $this->perItemVolumeAdjustmentTotal;
    }

    /**
     * calculate volume adjustment total
     *
     * @return integer
     */
    public function getVolumeAdjustmentTotal()
    {
        return $this->getPerItemVolumeAdjustmentTotal() * $this->getQuantity();
    }

    /**
     * Calculates currency total after adjustments are made
     *
     * @return float
     */
    public function getAdjustedCurrencyTotal() {
        return round($this->getPreAdjustedCurrencyTotal() - $this->getCurrencyAdjustmentTotal(), 2);
    }

    /**
     * Calculates volume total after adjustments are made
     *
     * @return integer
     */
    public function getAdjustedVolumeTotal() {
        return $this->getPreAdjustedVolumeTotal() + $this->getVolumeAdjustmentTotal();
    }

    /**
     * Get TaxRate
     *
     * @return float
     */
    public function getTaxRate()
    {
        $total = 0;
        foreach ($this->historicalTaxRates as $historicalTaxRate)
        {
            $total += $historicalTaxRate->getValue();
        }
        return $total;
    }

    /**
     * Get TaxTotal
     *
     * @return float
     */
    public function getTaxTotal()
    {
        return round($this->getTaxRate() * $this->getAdjustedCurrencyTotal(), 2);
    }


    /**
     * Remove historicalTaxRates
     *
     * @param \TestBundle\Entity\HistoricalTaxRate $historicalTaxRates
     */
    public function removeHistoricalTaxRate(\TestBundle\Entity\HistoricalTaxRate $historicalTaxRates)
    {
        $this->historicalTaxRates->removeElement($historicalTaxRates);
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return OrderItem
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
     * Set tracking
     *
     * @param \TestBundle\Entity\Tracking $tracking
     * @return OrderItem
     */
    public function setTracking(\TestBundle\Entity\Tracking $tracking = null)
    {
        $this->tracking = $tracking;

        return $this;
    }

    /**
     * Get tracking
     *
     * @return \TestBundle\Entity\Tracking
     */
    public function getTracking()
    {
        return $this->tracking;
    }
}
