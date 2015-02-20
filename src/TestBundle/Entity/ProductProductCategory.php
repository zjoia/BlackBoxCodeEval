<?php

namespace TestBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ProductProductCategory
 */
class ProductProductCategory
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var \TestBundle\Entity\Product
     * @Serializer\Type("TestBundle\Entity\Product")
     * @Serializer\Expose
     */
    protected $product;

    /**
     * @var \TestBundle\Entity\ProductCategory
     * @Serializer\Type("TestBundle\Entity\ProductCategory")
     * @Serializer\Expose
     */
    protected $productCategory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Duration>")
     * @Serializer\Expose
     */
    protected $durations;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->durations = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->productCategory->getName();
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
     * Set product
     *
     * @param \TestBundle\Entity\Product $product
     * @return ProductProductCategory
     */
    public function setProduct(\TestBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \TestBundle\Entity\Product 
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * Set productCategory
     *
     * @param \TestBundle\Entity\ProductCategory $productCategory
     * @return ProductProductCategory
     */
    public function setProductCategory(\TestBundle\Entity\ProductCategory $productCategory)
    {
        $this->productCategory = $productCategory;

        return $this;
    }

    /**
     * Get productCategory
     *
     * @return \TestBundle\Entity\ProductCategory 
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Add durations
     *
     * @param \TestBundle\Entity\Duration $durations
     * @return ProductProductCategory
     */
    public function addDuration(\TestBundle\Entity\Duration $durations)
    {
        $this->durations[] = $durations;
        $durations->addProductProductCategory($this);

        return $this;
    }

    /**
     * Set durations
     *
     * @param \TestBundle\Entity\Duration $durations
     * @return ProductProductCategory
     */
    public function setDurations($durations)
    {
        if (is_array($durations) || $durations instanceof Collection) {
            foreach ($durations as $duration) {
                $duration->addProductProductCategory($this);
            }
        }

        $this->durations = $durations;

        return $this;
    }

    /**
     * Remove durations
     *
     * @param \TestBundle\Entity\Duration $durations
     */
    public function removeDuration(\TestBundle\Entity\Duration $durations)
    {
        $this->durations->removeElement($durations);
    }

    /**
     * Get durations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDurations()
    {
        return $this->durations;
    }
}
