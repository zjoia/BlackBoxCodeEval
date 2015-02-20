<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ProductCategoryStructure
 *
 * @Serializer\ExclusionPolicy("all")
 */
class ProductCategoryStructure
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
    protected $lft;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Expose
     */
    protected $rgt;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    protected $root;

    /**
     * @var integer
     * @Serializer\Type("integer")
     */
    protected $lvl;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductCategory>")
     */
    protected $children;

    /**
     * @var \TestBundle\Entity\ProductCategoryStructure
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductCategory>")
     */
    protected $parent;

    /**
     * @var \TestBundle\Entity\ProductCategory
     * @Serializer\Type("TestBundle\Entity\ProductCategory")
     * @Serializer\Expose
     */
    protected $productCategory;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->children = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        $productCategory = $this->getProductCategory();
        if (null !== $productCategory) {
            return $productCategory->getName();
        }

        return '#' . $this->getId();
    }

    public function getLaveledName()
    {
        $prefix = "";

        for ($i=1; $i<= $this->lvl; $i++){
            $prefix .= " - - - - ";
        }

        $productCategory = $this->getProductCategory();
        if (null === $productCategory) {
            return $prefix . $this->getId();
        }

        return $prefix . $productCategory->getName();
    }

    public function getThisNode()
    {
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
     * Set lft
     *
     * @param integer $lft
     * @return ProductCategoryStructure
     */
    public function setLft($lft)
    {
        $this->lft = $lft;

        return $this;
    }

    /**
     * Get lft
     *
     * @return integer 
     */
    public function getLft()
    {
        return $this->lft;
    }

    /**
     * Set rgt
     *
     * @param integer $rgt
     * @return ProductCategoryStructure
     */
    public function setRgt($rgt)
    {
        $this->rgt = $rgt;

        return $this;
    }

    /**
     * Get rgt
     *
     * @return integer 
     */
    public function getRgt()
    {
        return $this->rgt;
    }

    /**
     * Set productCategory
     *
     * @param \TestBundle\Entity\ProductCategory $productCategory
     * @return ProductCategoryStructure
     */
    public function setProductCategory(\TestBundle\Entity\ProductCategory $productCategory = null)
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
     * Set root
     *
     * @param integer $root
     * @return ProductCategoryStructure
     */
    public function setRoot($root)
    {
        $this->root = $root;

        return $this;
    }

    /**
     * Get root
     *
     * @return integer 
     */
    public function getRoot()
    {
        return $this->root;
    }

    /**
     * Set lvl
     *
     * @param integer $lvl
     * @return ProductCategoryStructure
     */
    public function setLvl($lvl)
    {
        $this->lvl = $lvl;

        return $this;
    }

    /**
     * Get lvl
     *
     * @return integer 
     */
    public function getLvl()
    {
        return $this->lvl;
    }

    /**
     * Add children
     *
     * @param \TestBundle\Entity\ProductCategoryStructure $children
     * @return ProductCategoryStructure
     */
    public function addChild(\TestBundle\Entity\ProductCategoryStructure $children)
    {
        $this->children[] = $children;

        return $this;
    }

    /**
     * Remove children
     *
     * @param \TestBundle\Entity\ProductCategoryStructure $children
     */
    public function removeChild(\TestBundle\Entity\ProductCategoryStructure $children)
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
     * Set parent
     *
     * @param \TestBundle\Entity\ProductCategoryStructure $parent
     * @return ProductCategoryStructure
     */
    public function setParent(\TestBundle\Entity\ProductCategoryStructure $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \TestBundle\Entity\ProductCategoryStructure
     */
    public function getParent()
    {
        return $this->parent;
    }
}
