<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * PeriodType
 */
class PeriodType
{
    const DAY   = 'Day';
    const WEEK  = 'Week';
    const MONTH = 'Month';
    const YEAR  = 'Year';

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
     * @return PeriodType
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
}
