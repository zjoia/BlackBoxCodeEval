<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * AdjustmentRuleActionOperator
 *
 * @Serializer\ExclusionPolicy("all")
 */
class AdjustmentRuleActionOperator
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleAction
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleAction")
     * @Serializer\Expose
     */
    protected $adjustmentRuleAction;

    /**
     * @var \TestBundle\Entity\OperatorType
     * @Serializer\Type("TestBundle\Entity\OperatorType")
     * @Serializer\Expose
     */
    protected $operatorType;


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
     * Set adjustmentRuleAction
     *
     * @param \TestBundle\Entity\AdjustmentRuleAction $adjustmentRuleAction
     * @return AdjustmentRuleActionOperator
     */
    public function setAdjustmentRuleAction(\TestBundle\Entity\AdjustmentRuleAction $adjustmentRuleAction)
    {
        $this->adjustmentRuleAction = $adjustmentRuleAction;

        return $this;
    }

    /**
     * Get adjustmentRuleAction
     *
     * @return \TestBundle\Entity\AdjustmentRuleAction 
     */
    public function getAdjustmentRuleAction()
    {
        return $this->adjustmentRuleAction;
    }

    /**
     * Set operatorType
     *
     * @param \TestBundle\Entity\OperatorType $operatorType
     * @return AdjustmentRuleActionOperator
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
