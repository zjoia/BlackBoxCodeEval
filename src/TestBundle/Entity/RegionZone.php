<?php

namespace TestBundle\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/** RegionZone */
class RegionZone
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $name;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $deletedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\RegionZoneImage>")
     */
    protected $regionZoneImages;

    /**
     * @var \TestBundle\Entity\RegionZoneType
     * @Serializer\Type("TestBundle\Entity\RegionZoneType")
     */
    protected $regionZoneType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\IsoCode>")
     */
    protected $isoCode;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Region>")
     * @Serializer\Exclude
     */
    protected $regions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Product>")
     * @Serializer\Exclude
     */
    protected $products;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\HistoricalTaxRate>")
     * @Serializer\Exclude
     */
    protected $historicalTaxRates;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->regionZoneImages = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isoCode = new \Doctrine\Common\Collections\ArrayCollection();
        $this->regions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return RegionZone
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
     * @return RegionZone
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
     * Add regionZoneImages
     *
     * @param \TestBundle\Entity\RegionZoneImage $regionZoneImages
     * @return RegionZone
     */
    public function addRegionZoneImage(\TestBundle\Entity\RegionZoneImage $regionZoneImages)
    {
        $this->regionZoneImages[] = $regionZoneImages;

        return $this;
    }

    /**
     * Remove regionZoneImages
     *
     * @param \TestBundle\Entity\RegionZoneImage $regionZoneImages
     */
    public function removeRegionZoneImage(\TestBundle\Entity\RegionZoneImage $regionZoneImages)
    {
        $this->regionZoneImages->removeElement($regionZoneImages);
    }

    /**
     * Get regionZoneImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegionZoneImages()
    {
        return $this->regionZoneImages;
    }

    /**
     * Set regionZoneType
     *
     * @param \TestBundle\Entity\RegionZoneType $regionZoneType
     * @return RegionZone
     */
    public function setRegionZoneType(\TestBundle\Entity\RegionZoneType $regionZoneType = null)
    {
        $this->regionZoneType = $regionZoneType;

        return $this;
    }

    /**
     * Get regionZoneType
     *
     * @return \TestBundle\Entity\RegionZoneType
     */
    public function getRegionZoneType()
    {
        return $this->regionZoneType;
    }

    /**
     * Add isoCode
     *
     * @param \TestBundle\Entity\IsoCode $isoCode
     * @return RegionZone
     */
    public function addIsoCode(\TestBundle\Entity\IsoCode $isoCode)
    {
        $this->isoCode[] = $isoCode;

        return $this;
    }

    /**
     * Remove isoCode
     *
     * @param \TestBundle\Entity\IsoCode $isoCode
     */
    public function removeIsoCode(\TestBundle\Entity\IsoCode $isoCode)
    {
        $this->isoCode->removeElement($isoCode);
    }

    /**
     * Get isoCode
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIsoCodes()
    {
        return $this->isoCode;
    }

    /**
     * @return null|\TestBundle\Entity\IsoCode
     */
    public function getIsoCode()
    {
        if (is_array($this->isoCode) && count($this->isoCode) > 0) {
            return $this->isoCode[0];
        }

        if ($this->isoCode instanceof Collection && !$this->isoCode->isEmpty()) {
            return $this->isoCode->first();
        }

        return null;
    }

    /**
     * Add regions
     *
     * @param \TestBundle\Entity\Region $regions
     * @return RegionZone
     */
    public function addRegion(\TestBundle\Entity\Region $regions)
    {
        $this->regions[] = $regions;

        return $this;
    }

    /**
     * Remove regions
     *
     * @param \TestBundle\Entity\Region $regions
     */
    public function removeRegion(\TestBundle\Entity\Region $regions)
    {
        $this->regions->removeElement($regions);
    }

    /**
     * Get regions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRegions()
    {
        return $this->regions;
    }

    /**
     * Add products
     *
     * @param \TestBundle\Entity\Product $products
     * @return RegionZone
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
     * Add historicalTaxRates
     *
     * @param \TestBundle\Entity\HistoricalTaxRate $historicalTaxRates
     * @return RegionZone
     */
    public function addHistoricalTaxRate(\TestBundle\Entity\HistoricalTaxRate $historicalTaxRates)
    {
        $this->historicalTaxRates[] = $historicalTaxRates;

        return $this;
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
     * Get historicalTaxRates
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getHistoricalTaxRates()
    {
        return $this->historicalTaxRates;
    }

    public function getFlag()
    {
        $flagLink = '';
        $flag = $this->regionZoneImages->filter(
            function($image)
            {
                return $image->getType()->getName() == RegionZoneImageType::FLAG;
            }
        )->first();
        if($flag != false)
        {
            $flagLink = $flag->getImage()->getUrl();
        }
        return $flagLink;
    }
}
