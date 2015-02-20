<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Adjustment
 *
 * @Serializer\ExclusionPolicy("all")
 */
class AdjustmentResult
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
    protected $value;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \TestBundle\Entity\AdjustmentResultType
     * @Serializer\Type("TestBundle\Entity\AdjustmentResultType")
     * @Serializer\Expose
     */
    protected $adjustmentResultType;

    /**
     * @var \TestBundle\Entity\OperatorType
     * @Serializer\Type("TestBundle\Entity\OperatorType")
     * @Serializer\Expose
     */
    protected $operatorType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariantVolumeType>")
     * @Serializer\Expose
     */
    protected $volumeTypes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Order>")
     * @Serializer\Expose
     */
    protected $orders;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\OrderItem>")
     * @Serializer\Expose
     */
    protected $orderItems;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->volumeTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->orderItems = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set value
     *
     * @param integer $value
     * @return AdjustmentResult
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return AdjustmentResult
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
     * Set adjustmentResultType
     *
     * @param \TestBundle\Entity\AdjustmentResultType $adjustmentResultType
     * @return AdjustmentResult
     */
    public function setAdjustmentResultType(\TestBundle\Entity\AdjustmentResultType $adjustmentResultType)
    {
        $this->adjustmentResultType = $adjustmentResultType;

        return $this;
    }

    /**
     * Get adjustmentResultType
     *
     * @return \TestBundle\Entity\AdjustmentResultType
     */
    public function getAdjustmentResultType()
    {
        return $this->adjustmentResultType;
    }

    /**
     * Set operatorType
     *
     * @param \TestBundle\Entity\OperatorType $operatorType
     * @return AdjustmentResult
     */
    public function setOperatorType(\TestBundle\Entity\OperatorType $operatorType)
    {
        $this->operatorType = $operatorType;

        return $this;
    }

    /**
     * Get operatorType
     *
     * @return \TestBundle\Entity\OperatorType
     */
    public function getOperatorType()
    {
        return $this->operatorType;
    }

    /**
     * Add volumeTypes
     *
     * @param \TestBundle\Entity\VolumeType $volumeTypes
     * @return AdjustmentResult
     */
    public function addVolumeType(\TestBundle\Entity\VolumeType $volumeTypes)
    {
        $this->volumeTypes[] = $volumeTypes;

        return $this;
    }

    /**
     * Remove volumeTypes
     *
     * @param \TestBundle\Entity\VolumeType $volumeTypes
     */
    public function removeVolumeType(\TestBundle\Entity\VolumeType $volumeTypes)
    {
        $this->volumeTypes->removeElement($volumeTypes);
    }

    /**
     * Get volumeTypes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVolumeTypes()
    {
        return $this->volumeTypes;
    }

    /**
     * Add orders
     *
     * @param \TestBundle\Entity\Order $orders
     * @return AdjustmentResult
     */
    public function addOrder(\TestBundle\Entity\Order $orders)
    {
        $this->orders[] = $orders;
        $orders->addAdjustmentResult($this);

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \TestBundle\Entity\Order $orders
     */
    public function removeOrder(\TestBundle\Entity\Order $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Add orderItems
     *
     * @param \TestBundle\Entity\OrderItem $orderItems
     * @return AdjustmentResult
     */
    public function addOrderItem(\TestBundle\Entity\OrderItem $orderItems)
    {
        $this->orderItems[] = $orderItems;
        $orderItems->addAdjustmentResult($this);

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
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrderItems()
    {
        return $this->orderItems;
    }
}
