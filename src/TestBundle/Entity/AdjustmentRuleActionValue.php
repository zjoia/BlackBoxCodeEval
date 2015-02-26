<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * AdjustmentRuleActionValue
 *
 * @Serializer\ExclusionPolicy("all")
 */
class AdjustmentRuleActionValue
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Expose
     */
    protected $id;

    /**
     * @var float
     * @Serializer\Type("float")
     * @Serializer\Expose
     */
    protected $value;

    /**
     * @var \TestBundle\Entity\AdjustmentRuleAction
     * @Serializer\Type("TestBundle\Entity\AdjustmentRuleAction")
     * @Serializer\Expose
     */
    protected $adjustmentRuleAction;


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
     * @return AdjustmentRuleActionValue
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
     * Set adjustmentRuleAction
     *
     * @param \TestBundle\Entity\AdjustmentRuleAction $adjustmentRuleAction
     * @return AdjustmentRuleActionValue
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
}
