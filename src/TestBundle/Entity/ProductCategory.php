<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ProductCategory
 *
 * @Serializer\ExclusionPolicy("all")
 */
class ProductCategory
{
    const CORPORATE = 'Corporate';
    
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
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $slug;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Product>")
     * @Serializer\Expose
     */
    protected $products;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductCategoryPropertyValue>")
     */
    protected $productCategoryPropertyValues;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set id
     *
     * @param $id
     * @return ProductCategory
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
     * Set slug
     *
     * @param string $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ProductCategory
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return ProductCategory
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
     * Add products
     *
     * @param \TestBundle\Entity\Product $products
     * @return ProductCategory
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
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $productProductCategories;


    /**
     * Add productProductCategories
     *
     * @param \TestBundle\Entity\ProductProductCategory $productProductCategories
     * @return ProductCategory
     */
    public function addProductProductCategory(\TestBundle\Entity\ProductProductCategory $productProductCategories)
    {
        $this->productProductCategories[] = $productProductCategories;

        return $this;
    }

    /**
     * Remove productProductCategories
     *
     * @param \TestBundle\Entity\ProductProductCategory $productProductCategories
     */
    public function removeProductProductCategory(\TestBundle\Entity\ProductProductCategory $productProductCategories)
    {
        $this->productProductCategories->removeElement($productProductCategories);
    }

    /**
     * Get productProductCategories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductProductCategories()
    {
        return $this->productProductCategories;
    }

    /**
     * Add productCategoryPropertyValues
     *
     * @param \TestBundle\Entity\ProductCategoryPropertyValue $productCategoryPropertyValue
     * @return ProductCategory
     */
    public function addProductCategoryPropertyValue(\TestBundle\Entity\ProductCategoryPropertyValue $productCategoryPropertyValue)
    {
        $this->productCategoryPropertyValues[] = $productCategoryPropertyValue;
        $productCategoryPropertyValue->setProduct($this);

        return $this;
    }

    /**
     * Remove productCategoryPropertyValues
     *
     * @param \TestBundle\Entity\ProductCategoryPropertyValue $productCategoryPropertyValue
     */
    public function removeProductCategoryPropertyValue(\TestBundle\Entity\ProductCategoryPropertyValue $productCategoryPropertyValue)
    {
        $this->productCategoryPropertyValues->removeElement($productCategoryPropertyValue);
    }

    /**
     * Get productPropertyValues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductCategoryPropertyValues()
    {
        return $this->productCategoryPropertyValues;
    }
}
