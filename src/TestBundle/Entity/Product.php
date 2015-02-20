<?php

namespace TestBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Product
 *
 * - Product has a single ProductVariant (for now)
 * - ProductVariant price and volume take precedence over Product price and volume
 * - Product and ProductVariant can have only one volume (relation is going to be refactored)
 *
 * @Serializer\ExclusionPolicy("all")
 */
class Product
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
    protected $name;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $slug;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $description;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Expose
     */
    protected $deletedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductImage>")
     * @Serializer\Expose
     */
    protected $productImages;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductPrice>")
     * @Serializer\Expose
     */
    protected $productPrices;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVolume>")
     * @Serializer\Expose
     */
    protected $productVolumes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariant>")
     * @Serializer\Expose
     */
    protected $productVariants;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductAttributeValue>")
     * @Serializer\Expose
     */
    protected $productAttributeValues;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductPropertyValue>")
     */
    protected $productPropertyValues;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductOptionValue>")
     */
    protected $productOptionValues;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductProductCategory>")
     */
    protected $productProductCategories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\FulfillmentProvider>")
     */
    protected $fulfillmentProviders;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Product>")
     */
    protected $products;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\RegionTaxCategoryRate>")
     */
    protected $regionTaxCategoryRates;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\RegionZoneTaxCategoryRate>")
     */
    protected $regionZoneTaxCategoryRates;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\RegionZone>")
     */
    protected $regionZones;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductFlagType>")
     */
    protected $flags;

    /**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Interval>")
     *
     */
    protected $intervals;

    /**
     * @var ArrayCollection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\SubscriptionProvider>")
     */
    private $subscriptionProviders;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->productImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productPrices = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productVolumes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productVariants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productAttributeValues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productPropertyValues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productOptionValues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->productProductCategories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->fulfillmentProviders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regionTaxCategoryRates = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regionZoneTaxCategoryRates = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regionZones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscriptionProviders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set id
     *
     * @param $id
     * @return Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Product
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
     * Add productImages
     *
     * @param \TestBundle\Entity\ProductImage $productImages
     * @return Product
     */
    public function addProductImage(\TestBundle\Entity\ProductImage $productImages)
    {
        $this->productImages[] = $productImages;
        $productImages->setProduct($this);

        return $this;
    }

    /**
     * Remove productImages
     *
     * @param \TestBundle\Entity\ProductImage $productImages
     */
    public function removeProductImage(\TestBundle\Entity\ProductImage $productImages)
    {
        $this->productImages->removeElement($productImages);
    }

    /**
     * Get productImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductImages()
    {
        return $this->productImages;
    }

    /**
     * Add productPrices
     *
     * @param \TestBundle\Entity\ProductPrice $productPrices
     * @return Product
     */
    public function addProductPrice(\TestBundle\Entity\ProductPrice $productPrices)
    {
        $this->productPrices[] = $productPrices;
        $productPrices->setProduct($this);

        return $this;
    }

    /**
     * Remove productPrices
     *
     * @param \TestBundle\Entity\ProductPrice $productPrices
     */
    public function removeProductPrice(\TestBundle\Entity\ProductPrice $productPrices)
    {
        $this->productPrices->removeElement($productPrices);
    }

    /**
     * Get productPrices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductPrices()
    {
        return $this->productPrices;
    }

    /**
     * @return float
     */
    public function getWholesalePrice()
    {
        return ($price = $this->getPrice(PriceType::WHOLESALE)) ? $price->getValue() : null;
    }

    /**
     * @return string
     */
    public function getWholesalePriceDescription()
    {
        return ($price = $this->getPrice(PriceType::WHOLESALE)) ? $price->getPriceType()->getName() : '';
    }

    /**
     * @return float
     */
    public function getMsrpPrice()
    {
        return ($price = $this->getPrice(PriceType::MSRP)) ? $price->getValue() : null;
    }

    /**
     * Get price by type name
     *
     * @param string $typeName
     * @return ProductPrice|null
     */
    public function getPrice($typeName)
    {
        // search among ProductVariant and Product prices with precedence of ProductVariant prices
        $prices = $this->getProductVariant()
                ? $this->getProductVariant()->getProductVariantPrices()->toArray()
                : [];
        $prices = array_merge($prices, $this->getProductPrices()->toArray());

        foreach ($prices as $price) {
            if ($price->getPriceType()->getName() == $typeName) {
                return $price;
            }
        }

        return null;
    }

    /**
     * Add productVolumes
     *
     * @param \TestBundle\Entity\ProductVolume $productVolumes
     * @return Product
     */
    public function addProductVolume(\TestBundle\Entity\ProductVolume $productVolumes)
    {
        $this->productVolumes[] = $productVolumes;
        $productVolumes->setProduct($this);

        return $this;
    }

    /**
     * Remove productVolumes
     *
     * @param \TestBundle\Entity\ProductVolume $productVolumes
     */
    public function removeProductVolume(\TestBundle\Entity\ProductVolume $productVolumes)
    {
        $this->productVolumes->removeElement($productVolumes);
    }

    /**
     * Get productVolumes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductVolumes()
    {
        return $this->productVolumes;
    }

    /**
     * @return \TestBundle\Entity\ProductVolume
     */
    public function getProductVolume()
    {
        $volume = $this->getProductVariant()
                ? $this->getProductVariant()->getProductVariantVolumes()->first()
                : null;
        $volume or $volume = $this->productVolumes->first();

        return $volume;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        $attributeValues = $this->getProductAttributeValues();

        foreach ($attributeValues as $attributeValue) {
            if ($attributeValue->getAttribute()->getName() == Attribute::SUBTITLE) {
                return $attributeValue->getValue();
            }
        }

        return '';
    }

    /**
     * Add productVariants
     *
     * @param \TestBundle\Entity\ProductVariant $productVariants
     * @return Product
     */
    public function addProductVariant(\TestBundle\Entity\ProductVariant $productVariants)
    {
        $this->productVariants[] = $productVariants;

        return $this;
    }

    /**
     * Remove productVariants
     *
     * @param \TestBundle\Entity\ProductVariant $productVariants
     */
    public function removeProductVariant(\TestBundle\Entity\ProductVariant $productVariants)
    {
        $this->productVariants->removeElement($productVariants);
    }

    /**
     * Get productVariants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductVariants()
    {
        return $this->productVariants;
    }

    /**
     * this is AWEFULL DONT USE, WILL BE REFACTORED
     * @return \TestBundle\Entity\ProductVariant
     * @deprecated
     */
    public function getProductVariant()
    {
        return $this->productVariants->first();
    }

    /**
     * Add productAttributeValues
     *
     * @param \TestBundle\Entity\ProductAttributeValue $productAttributeValues
     * @return Product
     */
    public function addProductAttributeValue(\TestBundle\Entity\ProductAttributeValue $productAttributeValues)
    {
        $this->productAttributeValues[] = $productAttributeValues;
        $productAttributeValues->setProduct($this);

        return $this;
    }

    /**
     * Remove productAttributeValues
     *
     * @param \TestBundle\Entity\ProductAttributeValue $productAttributeValues
     */
    public function removeProductAttributeValue(\TestBundle\Entity\ProductAttributeValue $productAttributeValues)
    {
        $this->productAttributeValues->removeElement($productAttributeValues);
    }

    /**
     * Get productAttributeValues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductAttributeValues()
    {
        return $this->productAttributeValues;
    }

    /**
     * Add productPropertyValues
     *
     * @param \TestBundle\Entity\ProductPropertyValue $productPropertyValues
     * @return Product
     */
    public function addProductPropertyValue(\TestBundle\Entity\ProductPropertyValue $productPropertyValues)
    {
        $this->productPropertyValues[] = $productPropertyValues;
        $productPropertyValues->setProduct($this);

        return $this;
    }

    /**
     * Remove productPropertyValues
     *
     * @param \TestBundle\Entity\ProductPropertyValue $productPropertyValues
     */
    public function removeProductPropertyValue(\TestBundle\Entity\ProductPropertyValue $productPropertyValues)
    {
        $this->productPropertyValues->removeElement($productPropertyValues);
    }

    /**
     * Get productPropertyValues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductPropertyValues()
    {
        return $this->productPropertyValues;
    }

    /**
     * Add productOptionValues
     *
     * @param \TestBundle\Entity\ProductOptionValue $productOptionValues
     * @return Product
     */
    public function setProductOptionValues($productOptionValues = null)
    {
        if (null != $productOptionValues) {
            foreach ($productOptionValues as $productOptionValue) {
                $productOptionValue->setProduct($this);
            }
        }

        $this->productOptionValues = $productOptionValues;

        return $this;
    }

    /**
     * Add productOptionValues
     *
     * @param \TestBundle\Entity\ProductOptionValue $productOptionValues
     * @return Product
     */
    public function addProductOptionValue(\TestBundle\Entity\ProductOptionValue $productOptionValues = null)
    {
        $this->productOptionValues[] = $productOptionValues;
        $productOptionValues->setProduct($this);

        return $this;
    }

    /**
     * Remove productOptionValues
     *
     * @param \TestBundle\Entity\ProductOptionValue $productOptionValues
     */
    public function removeProductOptionValue(\TestBundle\Entity\ProductOptionValue $productOptionValues)
    {
        $this->productOptionValues->removeElement($productOptionValues);
    }

    /**
     * Get productOptionValues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProductOptionValues()
    {
        return $this->productOptionValues;
    }

    /**
     * Add productProductCategories
     *
     * @param \TestBundle\Entity\ProductProductCategory $productProductCategories
     * @return Product
     */
    public function addProductProductCategory(\TestBundle\Entity\ProductProductCategory $productProductCategories)
    {
        $this->productProductCategories[] = $productProductCategories;
        $productProductCategories->setProduct($this);

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
     * Set fulfillmentProviders
     *
     * @param ArrayCollection $fulfillmentProviders
     * @return Product
     */
    public function setFulfillmentProviders(ArrayCollection $fulfillmentProviders = null)
    {
        $this->fulfillmentProviders = $fulfillmentProviders;
        if (is_array($fulfillmentProviders) || $fulfillmentProviders instanceof Collection) {
            foreach ($fulfillmentProviders as $fulfillmentProv) {
                $fulfillmentProv->addProduct($this);
            }
        }

        return $this;
    }

    /**
     *
     * @param FulfillmentProvider $fulfillmentProvider
     * @return Product
     */
    public function setFulfillmentProvider(FulfillmentProvider $fulfillmentProvider)
    {
        $this->setFulfillmentProviders(new ArrayCollection([$fulfillmentProvider]));
        return $this;
    }

    /**
     * @return FulfillmentProvider
     */
    public function getFulfillmentProvider()
    {
        return $this->getFulfillmentProviders()->first();
    }

    /**
     * Add fulfillmentProvider
     *
     * @param \TestBundle\Entity\FulfillmentProvider $fulfillmentProvider
     * @return Product
     */
    public function addFulfillmentProvider(\TestBundle\Entity\FulfillmentProvider $fulfillmentProvider)
    {
        $this->fulfillmentProvider[] = $fulfillmentProvider;
        $fulfillmentProvider->addProduct($this);

        return $this;
    }

    /**
     * Remove fulfillmentProvider
     *
     * @param \TestBundle\Entity\FulfillmentProvider $fulfillmentProvider
     */
    public function removeFulfillmentProvider(\TestBundle\Entity\FulfillmentProvider $fulfillmentProvider)
    {
        $this->fulfillmentProvider->removeElement($fulfillmentProvider);
    }

    /**
     * Get fulfillmentProvider
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFulfillmentProviders()
    {
        return $this->fulfillmentProviders;
    }

    /**
     * Add products
     *
     * @param \TestBundle\Entity\Product $products
     * @return Product
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
     * Add regionTaxCategoryRates
     *
     * @param \TestBundle\Entity\RegionTaxCategoryRate $regionTaxCategoryRates
     * @return Product
     */
    public function addRegionTaxCategoryRate(\TestBundle\Entity\RegionTaxCategoryRate $regionTaxCategoryRates)
    {
        $this->regionTaxCategoryRates[] = $regionTaxCategoryRates;

        return $this;
    }

    /**
     * Remove regionTaxCategoryRates
     *
     * @param \TestBundle\Entity\RegionTaxCategoryRate $regionTaxCategoryRates
     */
    public function removeRegionTaxCategoryRate(\TestBundle\Entity\RegionTaxCategoryRate $regionTaxCategoryRates)
    {
        $this->regionTaxCategoryRates->removeElement($regionTaxCategoryRates);
    }

    /**
     * Get regionTaxCategoryRates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegionTaxCategoryRates()
    {
        return $this->regionTaxCategoryRates;
    }

    /**
     * Add regionZoneTaxCategoryRates
     *
     * @param \TestBundle\Entity\RegionZoneTaxCategoryRate $regionZoneTaxCategoryRates
     * @return Product
     */
    public function addRegionZoneTaxCategoryRate(\TestBundle\Entity\RegionZoneTaxCategoryRate $regionZoneTaxCategoryRates)
    {
        $this->regionZoneTaxCategoryRates[] = $regionZoneTaxCategoryRates;

        return $this;
    }

    /**
     * Remove regionZoneTaxCategoryRates
     *
     * @param \TestBundle\Entity\RegionZoneTaxCategoryRate $regionZoneTaxCategoryRates
     */
    public function removeRegionZoneTaxCategoryRate(\TestBundle\Entity\RegionZoneTaxCategoryRate $regionZoneTaxCategoryRates)
    {
        $this->regionZoneTaxCategoryRates->removeElement($regionZoneTaxCategoryRates);
    }

    /**
     * Get regionZoneTaxCategoryRates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegionZoneTaxCategoryRates()
    {
        return $this->regionZoneTaxCategoryRates;
    }

    /**
     * Add regionZones
     *
     * @param \TestBundle\Entity\RegionZone $regionZones
     * @return Product
     */
    public function addRegionZone(\TestBundle\Entity\RegionZone $regionZones)
    {
        $this->regionZones[] = $regionZones;

        return $this;
    }

    /**
     * Remove regionZones
     *
     * @param \TestBundle\Entity\RegionZone $regionZones
     */
    public function removeRegionZone(\TestBundle\Entity\RegionZone $regionZones)
    {
        $this->regionZones->removeElement($regionZones);
    }

    /**
     * Get regionZones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegionZones()
    {
        return $this->regionZones;
    }

    /**
     * Add flags
     *
     * @param \TestBundle\Entity\ProductFlagType $flags
     * @return Product
     */
    public function addFlag(\TestBundle\Entity\ProductFlagType $flags)
    {
        $this->flags[] = $flags;

        return $this;
    }

    /**
     * Remove flags
     *
     * @param \TestBundle\Entity\ProductFlagType $flags
     */
    public function removeFlag(\TestBundle\Entity\ProductFlagType $flags)
    {
        $this->flags->removeElement($flags);
    }

    /**
     * Get flags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFlags()
    {
        return $this->flags;
    }

    public function hasFlag(\TestBundle\Entity\ProductFlagType $flag)
    {
        return $this->getFlags()->contains($flag);
    }

    /**
     * Twig emulation of hasFlag (Should only be used in views)
     *
     * @param $productFlagTypeName
     * @return bool
     */
    public function hasFlagNamed($productFlagTypeName)
    {
        /** @var ProductFlagType $flag */
        foreach ($this->getFlags() as $flag)
        {
            if($flag->getValue() == $productFlagTypeName)
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Get productImages as an associative array
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImagesAssoc()
    {
        $images = [];

        /** @var ProductImage $image */
        foreach($this->productImages as $image)
        {
            $images[$image->getProductImageType()->getName()] = $image->getImage();
        }

        return $images;
    }

    /**
     * Gets the default Image
     *
     * @return File
     */
    public function getDefaultImage()
    {
        /** @var ProductImage $image */
        foreach($this->getProductImages() as $image)
        {
            if($image->getIsDefault()) return $image->getImage();
        }

        return null;
    }

    /**
     * Returns true if all ProductVariants have no inventory
     *
     * @return bool
     */
    public function isSoldOut()
    {
        /** @var ProductVariant $variant */
        foreach($this->getProductVariants() as $variant)
        {
            if ($variant->getInventory() && $variant->getInventory()->getAmount() > 0)
            {
                return false;
            }
        }

        return true;
    }

    /**
     * Add intervals
     *
     * @param \TestBundle\Entity\Interval $intervals
     * @return Product
     */
    public function addInterval(\TestBundle\Entity\Interval $intervals)
    {
        $this->intervals[] = $intervals;

        return $this;
    }

    /**
     * Remove intervals
     *
     * @param \TestBundle\Entity\Interval $intervals
     */
    public function removeInterval(\TestBundle\Entity\Interval $intervals)
    {
        $this->intervals->removeElement($intervals);
    }

    /**
     * Get intervals
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIntervals()
    {
        return $this->intervals;
    }

    /**
     * Returns true if Product.
     *
     * @return bool
     */
    public function isPackage()
    {
        return (count($this->getProducts())) ? true : false;
    }

    /**
     * @todo
     * @return null|string
     */
    public function getVideoLink()
    {
        return null;
    }


    /**
     * Add subscriptionProviders
     *
     * @param \TestBundle\Entity\SubscriptionProvider $subscriptionProviders
     * @return Product
     */
    public function addSubscriptionProvider(\TestBundle\Entity\SubscriptionProvider $subscriptionProviders)
    {
        $this->subscriptionProviders[] = $subscriptionProviders;

        return $this;
    }

    /**
     * Remove subscriptionProviders
     *
     * @param \TestBundle\Entity\SubscriptionProvider $subscriptionProviders
     */
    public function removeSubscriptionProvider(\TestBundle\Entity\SubscriptionProvider $subscriptionProviders)
    {
        $this->subscriptionProviders->removeElement($subscriptionProviders);
    }

    /**
     * Get subscriptionProviders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptionProviders()
    {
        return $this->subscriptionProviders;
    }

    /**
     * Get subscriptionProviders
     *
     * @return SubscriptionProvider
     */
    public function getSubscriptionProvider()
    {
        return $this->getSubscriptionProviders()->first();
    }
}
