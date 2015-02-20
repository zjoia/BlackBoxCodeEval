<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GatewayCriterionValue
 */
class GatewayCriterionValue
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var float
     */
    private $value;

    /**
     * @var \TestBundle\Entity\GatewayCriterion
     */
    private $gatewayCriterion;


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
     * @param float $value
     * @return GatewayCriterionValue
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set gatewayCriterion
     *
     * @param \TestBundle\Entity\GatewayCriterion $gatewayCriterion
     * @return GatewayCriterionValue
     */
    public function setGatewayCriterion(\TestBundle\Entity\GatewayCriterion $gatewayCriterion)
    {
        $this->gatewayCriterion = $gatewayCriterion;

        return $this;
    }

    /**
     * Get gatewayCriterion
     *
     * @return \TestBundle\Entity\GatewayCriterion
     */
    public function getGatewayCriterion()
    {
        return $this->gatewayCriterion;
    }
}
