<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ContactOrderType
 */
class ContactOrderType
{
    const ORDER_FOR = 'OrderFor';
    const ORDERED_BY = 'OrderedBy';
    const CSR_ORDER = 'CsrOrder';
    const AUTOPAY = 'AutoPay';

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
     * @return ContactOrderType
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
