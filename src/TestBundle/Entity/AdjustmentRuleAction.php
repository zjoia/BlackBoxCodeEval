<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * AdjustmentRuleAction
 *
 * @Serializer\ExclusionPolicy("all")
 */
class AdjustmentRuleAction
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleActionValue
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleActionValue")
     * @Serializer\Expose
     */
    protected $adjustmentRuleActionValue;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \TestBundle\Entity\AdjustmentRule
     * @Serializer\Type("TestBundle\Entity\AdjustmentRule")
     * @Serializer\Expose
     */
    protected $adjustmentRule;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleActionType
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleActionType")
     * @Serializer\Expose
     */
    protected $adjustmentRuleActionType;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleActionOperator
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleActionOperator")
     * @Serializer\Expose
     */
    protected $adjustmentRuleActionOperator;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Product>")
     * @Serializer\Expose
     */
    protected $products;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductCategory>")
     * @Serializer\Expose
     */
    protected $productCategories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariantVolumeType>")
     * @Serializer\Expose
     */
    protected $volumeTypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productCategories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->volumeTypes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set adjustmentRuleActionValue
     *
     * @param \TestBundle\Entity\AdjustmentRuleActionValue $adjustmentRuleActionValue
     * @return AdjustmentRuleAction
     */
    public function setAdjustmentRuleActionValue(\TestBundle\Entity\AdjustmentRuleActionValue $adjustmentRuleActionValue = null)
    {
        $this->adjustmentRuleActionValue = $adjustmentRuleActionValue;

        return $this;
    }

    /**
     * Get adjustmentRuleActionValue
     *
     * @return \TestBundle\Entity\AdjustmentRuleActionValue
     */
    public function getAdjustmentRuleActionValue()
    {
        return $this->adjustmentRuleActionValue;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return AdjustmentRuleAction
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
     * Set adjustmentRule
     *
     * @param \TestBundle\Entity\AdjustmentRule $adjustmentRule
     * @return AdjustmentRuleAction
     */
    public function setAdjustmentRule(\TestBundle\Entity\AdjustmentRule $adjustmentRule)
    {
        $this->adjustmentRule = $adjustmentRule;

        return $this;
    }

    /**
     * Get adjustmentRule
     *
     * @return \TestBundle\Entity\AdjustmentRule 
     */
    public function getAdjustmentRule()
    {
        return $this->adjustmentRule;
    }

    /**
     * Set adjustmentRuleActionType
     *
     * @param \TestBundle\Entity\AdjustmentRuleActionType $adjustmentRuleActionType
     * @return AdjustmentRuleAction
     */
    public function setAdjustmentRuleActionType(\TestBundle\Entity\AdjustmentRuleActionType $adjustmentRuleActionType)
    {
        $this->adjustmentRuleActionType = $adjustmentRuleActionType;

        return $this;
    }

    /**
     * Get adjustmentRuleActionType
     *
     * @return \TestBundle\Entity\AdjustmentRuleActionType
     */
    public function getAdjustmentRuleActionType()
    {
        return $this->adjustmentRuleActionType;
    }

    /**
     * Set adjustmentRuleActionOperator
     *
     * @param \TestBundle\Entity\AdjustmentRuleActionOperator $adjustmentRuleActionOperator
     * @return AdjustmentRuleAction
     */
    public function setAdjustmentRuleActionOperator(\TestBundle\Entity\AdjustmentRuleActionOperator $adjustmentRuleActionOperator = null)
    {
        $this->adjustmentRuleActionOperator = $adjustmentRuleActionOperator;

        return $this;
    }

    /**
     * Get adjustmentRuleActionOperator
     *
     * @return \TestBundle\Entity\AdjustmentRuleActionOperator
     */
    public function getAdjustmentRuleActionOperator()
    {
        return $this->adjustmentRuleActionOperator;
    }

    /**
     * Add products
     *
     * @param \TestBundle\Entity\Product $products
     * @return AdjustmentRuleAction
     */
    public function addProduct(\TestBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param \TestBundle\Entity\Product $products
     */
    public function removeProduct(\TestBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Add productCategories
     *
     * @param \TestBundle\Entity\ProductCategory $productCategories
     * @return AdjustmentRuleAction
     */
    public function addProductCategory(\TestBundle\Entity\ProductCategory $productCategories)
    {
        $this->productCategories[] = $productCategories;

        return $this;
    }

    /**
     * Remove productCategories
     *
     * @param \TestBundle\Entity\ProductCategory $productCategories
     */
    public function removeProductCategory(\TestBundle\Entity\ProductCategory $productCategories)
    {
        $this->productCategories->removeElement($productCategories);
    }

    /**
     * Get productCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductCategories()
    {
        return $this->productCategories;
    }

    /**
     * Get productCategory
     *
     * @return \TestBundle\Entity\ProductCategory
     */
    public function getProductCategory()
    {
        return $this->getProductCategories()->first();
    }

    /**
     * Add volumeTypes
     *
     * @param \TestBundle\Entity\VolumeType $volumeTypes
     * @return AdjustmentRuleAction
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
}
