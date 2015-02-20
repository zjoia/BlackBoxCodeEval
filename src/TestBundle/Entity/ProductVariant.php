<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ProductVariant
 *
 * @Serializer\ExclusionPolicy("all")
 */
class ProductVariant
{
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
    protected $sku;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \TestBundle\Entity\ProductVariantInventory
     * @Serializer\Type("TestBundle\Entity\ProductVariantInventory")
     */
    protected $inventory;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariantImage>")
     */
    protected $productVariantImages;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariantOptionValue>")
     */
    protected $productVariantOptionValues;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariantPrice>")
     * @Serializer\Expose
     */
    protected $productVariantPrices;

    /**
     * @var \TestBundle\Entity\Product
     * @Serializer\Type("TestBundle\Entity\Product")
     */
    protected $product;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariantVolumes>")
     * @Serializer\Expose
     */
    protected $productVariantVolumes;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productVariantImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productVariantOptionValues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productVariantPrices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productVariantVolumes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set sku
     *
     * @param string $sku
     * @return ProductVariant
     */
    public function setSku($sku)
    {
        $this->sku = $sku;

        return $this;
    }

    /**
     * Get sku
     *
     * @return string 
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return ProductVariant
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
     * Set inventory
     *
     * @param \TestBundle\Entity\ProductVariantInventory $inventory
     * @return ProductVariant
     */
    public function setInventory(\TestBundle\Entity\ProductVariantInventory $inventory = null)
    {
        $this->inventory = $inventory;
        $this->inventory->setProductVariant($this);

        return $this;
    }

    /**
     * Get inventory
     *
     * @return \TestBundle\Entity\ProductVariantInventory
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Add productVariantImages
     *
     * @param \TestBundle\Entity\ProductVariantImage $productVariantImages
     * @return ProductVariant
     */
    public function addProductVariantImage(\TestBundle\Entity\ProductVariantImage $productVariantImages)
    {
        $this->productVariantImages[] = $productVariantImages;
        $productVariantImages->setProductVariant($this);

        return $this;
    }

    /**
     * Remove productVariantImages
     *
     * @param \TestBundle\Entity\ProductVariantImage $productVariantImages
     */
    public function removeProductVariantImage(\TestBundle\Entity\ProductVariantImage $productVariantImages)
    {
        $this->productVariantImages->removeElement($productVariantImages);
    }

    /**
     * Get productVariantImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductVariantImages()
    {
        return $this->productVariantImages;
    }

    /**
     * Add productVariantOptionValues
     *
     * @param \TestBundle\Entity\ProductVariantOptionValue $productVariantOptionValues
     * @return ProductVariant
     */
    public function addProductVariantOptionValue(\TestBundle\Entity\ProductVariantOptionValue $productVariantOptionValues)
    {
        $this->productVariantOptionValues[] = $productVariantOptionValues;
        $productVariantOptionValues->setProductVariant($this);

        return $this;
    }

    /**
     * Remove productVariantOptionValues
     *
     * @param \TestBundle\Entity\ProductVariantOptionValue $productVariantOptionValues
     */
    public function removeProductVariantOptionValue(\TestBundle\Entity\ProductVariantOptionValue $productVariantOptionValues)
    {
        $this->productVariantOptionValues->removeElement($productVariantOptionValues);
    }

    /**
     * Get productVariantOptionValues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductVariantOptionValues()
    {
        return $this->productVariantOptionValues;
    }

    /**
     * Add productVariantPrices
     *
     * @param \TestBundle\Entity\ProductVariantPrice $productVariantPrices
     * @return ProductVariant
     */
    public function addProductVariantPrice(\TestBundle\Entity\ProductVariantPrice $productVariantPrices)
    {
        $this->productVariantPrices[] = $productVariantPrices;
        $productVariantPrices->setProductVariant($this);

        return $this;
    }

    /**
     * Remove productVariantPrices
     *
     * @param \TestBundle\Entity\ProductVariantPrice $productVariantPrices
     */
    public function removeProductVariantPrice(\TestBundle\Entity\ProductVariantPrice $productVariantPrices)
    {
        $this->productVariantPrices->removeElement($productVariantPrices);
    }

    /**
     * Get productVariantPrices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductVariantPrices()
    {
        return $this->productVariantPrices;
    }

    /**
     * Set product
     *
     * @param \TestBundle\Entity\Product $product
     * @return ProductVariant
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

    public function getDefaultImage()
    {
        /** @var ProductVariantImage $image */
        foreach($this->getProductVariantImages() as $image)
        {
            if($image->getIsDefault()) return $image->getImage();
        }
        return null;
    }

    /**
     * Verifies that the variant has prices and volumes
     * @return bool
     */
    public function isValid()
    {
        $productDefaultPrices = $this->getProduct()->getProductPrices()->filter(
            function($productPrice)
            {
                return $productPrice->getPriceType()->getIsDefault() == true;
            }
        );
        if($this->productVariantPrices->count() <= 0 &&
            $productDefaultPrices->count() <= 0)
        {
            return false;
        }
        if($this->product->getProductVolumes()->count() <= 0)
        {
            return false;
        }

        return true;
    }

    /**
     * Add productVariantVolumes
     *
     * @param \TestBundle\Entity\ProductVariantVolume $productVariantVolumes
     * @return ProductVariant
     */
    public function addProductVariantVolume(\TestBundle\Entity\ProductVariantVolume $productVariantVolumes)
    {
        $this->productVariantVolumes[] = $productVariantVolumes;

        return $this;
    }

    /**
     * Remove productVariantVolumes
     *
     * @param \TestBundle\Entity\ProductVariantVolume $productVariantVolumes
     */
    public function removeProductVariantVolume(\TestBundle\Entity\ProductVariantVolume $productVariantVolumes)
    {
        $this->productVariantVolumes->removeElement($productVariantVolumes);
    }

    /**
     * Get productVariantVolumes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductVariantVolumes()
    {
        return $this->productVariantVolumes;
    }
}
