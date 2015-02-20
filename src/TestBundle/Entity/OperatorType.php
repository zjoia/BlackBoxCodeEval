<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * OperatorType
 *
 * @Serializer\ExclusionPolicy("all")
 */
class OperatorType
{

    const MULTIPLY = '*';
    const DIVIDE = '/';
    const PLUS = '+';
    const MINUS = '-';
    const EQUAL = '==';
    const NOT_EQUAL = '!=';
    const GREATER_THAN = '>';
    const GREATER_THAN_OR_EQUAL = '>=';
    const LESS_THAN = '<=';
    const LESS_THAN_OR_EQUAL = '<=';
    const ASSIGN = '=';


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
     * Set id
     *
     * @param string $id
     * @return OperatorType
     */
    public function setId($id)
    {
        $this->id = $id;

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
     * Set name
     *
     * @param string $name
     * @return OperatorType
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
