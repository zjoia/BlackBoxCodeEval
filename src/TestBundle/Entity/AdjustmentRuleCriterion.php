<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * AdjustmentRuleCriterion
 *
 * @Serializer\ExclusionPolicy("all")
 */
class AdjustmentRuleCriterion
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleCriterionValue
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleCriterionValue")
     * @Serializer\Expose
     */
    protected $adjustmentRuleCriterionValue;

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
     * @var \TestBundle\Entity\AdjustmentRuleCriterionType
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleCriterionType")
     * @Serializer\Expose
     */
    protected $adjustmentRuleCriterionType;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleCriterionOperator
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleCriterionOperator")
     * @Serializer\Expose
     */
    protected $adjustmentRuleCriterionOperator;

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
     * Set id
     *
     * @param string $id
     * @return AdjustmentRuleCriterion
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
     * Set adjustmentRuleCriterionValue
     *
     * @param \TestBundle\Entity\AdjustmentRuleCriterionValue $adjustmentRuleCriterionValue
     * @return AdjustmentRuleCriterion
     */
    public function setAdjustmentRuleCriterionValue(\TestBundle\Entity\AdjustmentRuleCriterionValue $adjustmentRuleCriterionValue = null)
    {
        $this->adjustmentRuleCriterionValue = $adjustmentRuleCriterionValue;

        return $this;
    }

    /**
     * Get adjustmentRuleCriterionValue
     *
     * @return \TestBundle\Entity\AdjustmentRuleCriterionValue
     */
    public function getAdjustmentRuleCriterionValue()
    {
        return $this->adjustmentRuleCriterionValue;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return AdjustmentRuleCriterion
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
     * @return AdjustmentRuleCriterion
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
     * Set adjustmentRuleCriterionType
     *
     * @param \TestBundle\Entity\AdjustmentRuleCriterionType $adjustmentRuleCriterionType
     * @return AdjustmentRuleCriterion
     */
    public function setAdjustmentRuleCriterionType(\TestBundle\Entity\AdjustmentRuleCriterionType $adjustmentRuleCriterionType)
    {
        $this->adjustmentRuleCriterionType = $adjustmentRuleCriterionType;

        return $this;
    }

    /**
     * Get adjustmentRuleCriterionType
     *
     * @return \TestBundle\Entity\AdjustmentRuleCriterionType 
     */
    public function getAdjustmentRuleCriterionType()
    {
        return $this->adjustmentRuleCriterionType;
    }

    /**
     * Set adjustmentRuleCriterionOperator
     *
     * @param \TestBundle\Entity\AdjustmentRuleCriterionOperator $adjustmentRuleCriterionOperator
     * @return AdjustmentRuleCriterion
     */
    public function setAdjustmentRuleCriterionOperator(\TestBundle\Entity\AdjustmentRuleCriterionOperator $adjustmentRuleCriterionOperator = null)
    {
        $this->adjustmentRuleCriterionOperator = $adjustmentRuleCriterionOperator;

        return $this;
    }

    /**
     * Get adjustmentRuleCriterionOperator
     *
     * @return \TestBundle\Entity\AdjustmentRuleCriterionOperator
     */
    public function getAdjustmentRuleCriterionOperator()
    {
        return $this->adjustmentRuleCriterionOperator;
    }

    /**
     * Add products
     *
     * @param \TestBundle\Entity\Product $products
     * @return AdjustmentRuleCriterion
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
     * @return AdjustmentRuleCriterion
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
     * @return AdjustmentRuleCriterion
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
