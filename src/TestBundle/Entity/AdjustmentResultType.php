<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * AdjustmentResultType
 *
 * @Serializer\ExclusionPolicy("all")
 */
class AdjustmentResultType
{
	const ORDER_CURRENCY = 'OrderCurrency';
	const ORDER_VOLUME = 'OrderVolume';
	const ORDER_SHIPPING = 'OrderShipping';
	const ORDER_ITEM_CURRENCY = 'OrderItemCurrency';
    const ORDER_ITEM_VOLUME = 'OrderItemVolume';

    public static $orderTypes = array(
        self::ORDER_CURRENCY,
        self::ORDER_VOLUME,
        self::ORDER_SHIPPING
    );

    public static $orderItemTypes = array(
        self::ORDER_ITEM_CURRENCY,
        self::ORDER_ITEM_VOLUME
    );

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
     * @return AdjustmentResultType
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
