<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/** AccountType */
class AccountType
{
    const IBO = "IndependentBusinessOwner";
    const PC = "PreferredCustomer";
    
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Member"})
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Member"})
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Member>")
     * @Serializer\Exclude
     */
    protected $members;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\PriceType>")
     */
    protected $priceTypes;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
        $this->priceTypes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return AccountType
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

    /**
     * Add members
     *
     * @param \TestBundle\Entity\Member $members
     * @return AccountType
     */
    public function addMember(\TestBundle\Entity\Member $members)
    {
        $this->members[] = $members;

        return $this;
    }

    /**
     * Remove members
     *
     * @param \TestBundle\Entity\Member $members
     */
    public function removeMember(\TestBundle\Entity\Member $members)
    {
        $this->members->removeElement($members);
    }

    /**
     * Get members
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * Add priceTypes
     *
     * @param \TestBundle\Entity\PriceType $priceTypes
     * @return AccountType
     */
    public function addPriceType(\TestBundle\Entity\PriceType $priceTypes)
    {
        $this->priceTypes[] = $priceTypes;

        return $this;
    }

    /**
     * Remove priceTypes
     *
     * @param \TestBundle\Entity\PriceType $priceTypes
     */
    public function removePriceType(\TestBundle\Entity\PriceType $priceTypes)
    {
        $this->priceTypes->removeElement($priceTypes);
    }

    /**
     * Get priceTypes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPriceTypes()
    {
        return $this->priceTypes;
    }
}
