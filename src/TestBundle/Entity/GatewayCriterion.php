<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GatewayCriterion
 */
class GatewayCriterion
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $deletedAt;

    /**
     * @var \TestBundle\Entity\GatewayCriterionValue
     */
    private $gatewayCriterionValue;

    /**
     * @var \TestBundle\Entity\GatewayCriterionOperator
     */
    private $gatewayCriterionOperator;

    /**
     * @var \TestBundle\Entity\Gateway
     */
    private $gateway;

    /**
     * @var \TestBundle\Entity\GatewayCriterionType
     */
    private $gatewayCriterionType;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $regionZones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $accountTypes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $periodTypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->regionZones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->accountTypes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->periodTypes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return GatewayCriterion
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
     * Set gatewayCriterionValue
     *
     * @param \TestBundle\Entity\GatewayCriterionValue $gatewayCriterionValue
     * @return GatewayCriterion
     */
    public function setGatewayCriterionValue(\TestBundle\Entity\GatewayCriterionValue $gatewayCriterionValue = null)
    {
        $gatewayCriterionValue->setGatewayCriterion($this);
        $this->gatewayCriterionValue = $gatewayCriterionValue;

        return $this;
    }

    /**
     * Get gatewayCriterionValue
     *
     * @return \TestBundle\Entity\GatewayCriterionValue
     */
    public function getGatewayCriterionValue()
    {
        return $this->gatewayCriterionValue;
    }

    /**
     * Set gatewayCriterionOperator
     *
     * @param \TestBundle\Entity\GatewayCriterionOperator $gatewayCriterionOperator
     * @return GatewayCriterion
     */
    public function setGatewayCriterionOperator(\TestBundle\Entity\GatewayCriterionOperator $gatewayCriterionOperator = null)
    {
        $gatewayCriterionOperator->setGatewayCriterion($this);
        $this->gatewayCriterionOperator = $gatewayCriterionOperator;

        return $this;
    }

    /**
     * Get gatewayCriterionOperator
     *
     * @return \TestBundle\Entity\GatewayCriterionOperator
     */
    public function getGatewayCriterionOperator()
    {
        return $this->gatewayCriterionOperator;
    }

    /**
     * Set gateway
     *
     * @param \TestBundle\Entity\Gateway $gateway
     * @return GatewayCriterion
     */
    public function setGateway(\TestBundle\Entity\Gateway $gateway)
    {
        $this->gateway = $gateway;

        return $this;
    }

    /**
     * Get gateway
     *
     * @return \TestBundle\Entity\Gateway
     */
    public function getGateway()
    {
        return $this->gateway;
    }

    /**
     * Set gatewayCriterionType
     *
     * @param \TestBundle\Entity\GatewayCriterionType $gatewayCriterionType
     * @return GatewayCriterion
     */
    public function setGatewayCriterionType(\TestBundle\Entity\GatewayCriterionType $gatewayCriterionType)
    {
        $this->gatewayCriterionType = $gatewayCriterionType;

        return $this;
    }

    /**
     * Get gatewayCriterionType
     *
     * @return \TestBundle\Entity\GatewayCriterionType
     */
    public function getGatewayCriterionType()
    {
        return $this->gatewayCriterionType;
    }

    /**
     * Add regionZones
     *
     * @param \TestBundle\Entity\RegionZone $regionZones
     * @return GatewayCriterion
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
     * set accountType
     *
     * @param \TestBundle\Entity\AccountType $accountTypes
     * @return GatewayCriterion
     */
    public function setAccountType(\TestBundle\Entity\AccountType $accountTypes)
    {
        $this->accountTypes->clear();
        $this->accountTypes[] = $accountTypes;

        return $this;
    }

    /**
     * Get accountTypes
     *
     * @return \TestBundle\Entity\AccountType
     */
    public function getAccountType()
    {
        return $this->accountTypes->first();
    }

    /**
     * Add periodTypes
     *
     * @param \TestBundle\Entity\PeriodType $periodTypes
     * @return GatewayCriterion
     */
    public function setPeriodType(\TestBundle\Entity\PeriodType $periodTypes)
    {
        $this->periodTypes->clear();
        $this->periodTypes[] = $periodTypes;

        return $this;
    }

    /**
     * Get periodTypes
     *
     * @return \TestBundle\Entity\PeriodType
     */
    public function getPeriodType()
    {
        return $this->periodTypes->first();
    }
}
