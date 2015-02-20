<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * ContactOrder
 */
class ContactOrder
{
    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $id;

    /**
     * @var \TestBundle\Entity\Contact
     * @Serializer\Type("TestBundle\Entity\Contact")
     */
    protected $contact;

    /**
     * @var \TestBundle\Entity\Order
     * @Serializer\Type("TestBundle\Entity\Order")
     */
    protected $order;

    /**
     * @var \TestBundle\Entity\ContactOrderType
     * @Serializer\Type("TestBundle\Entity\ContactOrderType")
     */
    protected $contactOrderType;


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
     * Set contact
     *
     * @param \TestBundle\Entity\Contact $contact
     * @return ContactOrder
     */
    public function setContact(\TestBundle\Entity\Contact $contact)
    {
        $contact->addContactOrder($this);
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \TestBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set order
     *
     * @param \TestBundle\Entity\Order $order
     * @return ContactOrder
     */
    public function setOrder(\TestBundle\Entity\Order $order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \TestBundle\Entity\Order
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set contactOrderType
     *
     * @param \TestBundle\Entity\ContactOrderType $contactOrderType
     * @return ContactOrder
     */
    public function setContactOrderType(\TestBundle\Entity\ContactOrderType $contactOrderType)
    {
        $this->contactOrderType = $contactOrderType;

        return $this;
    }

    /**
     * Get contactOrderType
     *
     * @return \TestBundle\Entity\ContactOrderType
     */
    public function getContactOrderType()
    {
        return $this->contactOrderType;
    }
}
