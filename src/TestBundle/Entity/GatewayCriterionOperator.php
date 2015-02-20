<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GatewayCriterionOperator
 */
class GatewayCriterionOperator
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var \TestBundle\Entity\GatewayCriterion
     */
    private $gatewayCriterion;

    /**
     * @var \TestBundle\Entity\OperatorType
     */
    private $operatorType;


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
     * Set gatewayCriterion
     *
     * @param \TestBundle\Entity\GatewayCriterion $gatewayCriterion
     * @return GatewayCriterionOperator
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

    /**
     * Set operatorType
     *
     * @param \TestBundle\Entity\OperatorType $operatorType
     * @return GatewayCriterionOperator
     */
    public function setOperatorType(\TestBundle\Entity\OperatorType $operatorType)
    {
        $this->operatorType = $operatorType;

        return $this;
    }

    /**
     * Get operatorType
     *
     * @return \TestBundle\Entity\OperatorType
     */
    public function getOperatorType()
    {
        return $this->operatorType;
    }
}
