<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/** Member */
class Member
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Member", "Contact"})
     */
    protected $id;

    /**
     * @var float
     * @Serializer\Type("double")
     * @Serializer\Groups({"Member"})
     */
    protected $balance = 0;

    /**
     * @var integer
     * @Serializer\Type("integer")
     * @Serializer\Groups({"Member"})
     */
    protected $enrollIp;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"Member"})
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $updatedAt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $deletedAt;

    /**
     * @var \TestBundle\Entity\MemberSite
     * @Serializer\Type("TestBundle\Entity\MemberSite")
     * @Serializer\Groups("Member")
     */
    protected $site;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\LoginAudit>")
     */
    protected $loginAudits;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\FlagAudit>")
     */
    protected $flagAudits;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\StatusAudit>")
     */
    protected $statusAudits;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\MemberMeta>")
     * @Serializer\Groups("Member")
     */
    protected $metaData;

    /**
     * @var \TestBundle\Entity\AccountType
     * @Serializer\Type("TestBundle\Entity\AccountType")
     * @Serializer\Groups({"Member"})
     */
    protected $type;

    /**
     * @var \TestBundle\Entity\Member
     * @Serializer\Type("TestBundle\Entity\Member")
     * @Serializer\Groups({"Member"})
     */
    protected $originalEnroller;

    /**
     * @var \TestBundle\Entity\Rank
     * @Serializer\Type("TestBundle\Entity\Rank")
     * @Serializer\Groups({"Member"})
     */
    protected $highestRank;

    /**
     * @var \TestBundle\Entity\StatusType
     * @Serializer\Type("TestBundle\Entity\StatusType")
     * @Serializer\Groups({"Member"})
     */
    protected $status;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\User>")
     */
    protected $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\FlagType>")
     * @Serializer\Groups({"Member"})
     */
    protected $flags;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loginAudits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flagAudits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->statusAudits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->metaData = new \Doctrine\Common\Collections\ArrayCollection();
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->createdAt = new \DateTime();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return '#' . $this->getId();
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return member
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set balance
     *
     * @param string $balance
     * @return Member
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set enrollIp
     *
     * @param integer $enrollIp
     * @return Member
     */
    public function setEnrollIp($enrollIp)
    {
        $this->enrollIp = $enrollIp;

        return $this;
    }

    /**
     * Get enrollIp
     *
     * @return integer 
     */
    public function getEnrollIp()
    {
        return $this->enrollIp;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Member
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Member
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return Member
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime 
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set site
     *
     * @param \TestBundle\Entity\MemberSite $site
     * @return Member
     */
    public function setSite(\TestBundle\Entity\MemberSite $site = null)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return \TestBundle\Entity\MemberSite
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Add loginAudits
     *
     * @param \TestBundle\Entity\MemberLoginAudit $loginAudits
     * @return Member
     */
    public function addLoginAudit(\TestBundle\Entity\MemberLoginAudit $loginAudits)
    {
        $this->loginAudits[] = $loginAudits;

        return $this;
    }

    /**
     * Remove loginAudits
     *
     * @param \TestBundle\Entity\MemberLoginAudit $loginAudits
     */
    public function removeLoginAudit(\TestBundle\Entity\MemberLoginAudit $loginAudits)
    {
        $this->loginAudits->removeElement($loginAudits);
    }

    /**
     * Get loginAudits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLoginAudits()
    {
        return $this->loginAudits;
    }

    /**
     * Add flagAudits
     *
     * @param \TestBundle\Entity\MemberFlagAudit $flagAudits
     * @return Member
     */
    public function addFlagAudit(\TestBundle\Entity\MemberFlagAudit $flagAudits)
    {
        $this->flagAudits[] = $flagAudits;

        return $this;
    }

    /**
     * Remove flagAudits
     *
     * @param \TestBundle\Entity\MemberFlagAudit $flagAudits
     */
    public function removeFlagAudit(\TestBundle\Entity\MemberFlagAudit $flagAudits)
    {
        $this->flagAudits->removeElement($flagAudits);
    }

    /**
     * Get flagAudits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFlagAudits()
    {
        return $this->flagAudits;
    }

    /**
     * Add statusAudits
     *
     * @param \TestBundle\Entity\MemberStatusTypeAudit $statusAudits
     * @return Member
     */
    public function addStatusAudit(\TestBundle\Entity\MemberStatusTypeAudit $statusAudits)
    {
        $this->statusAudits[] = $statusAudits;

        return $this;
    }

    /**
     * Remove statusAudits
     *
     * @param \TestBundle\Entity\MemberStatusTypeAudit $statusAudits
     */
    public function removeStatusAudit(\TestBundle\Entity\MemberStatusTypeAudit $statusAudits)
    {
        $this->statusAudits->removeElement($statusAudits);
    }

    /**
     * Get statusAudits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStatusAudits()
    {
        return $this->statusAudits;
    }

    /**
     * Add metaData
     *
     * @param \TestBundle\Entity\MemberMeta $metaData
     * @return Member
     */
    public function addMetaDatum(\TestBundle\Entity\MemberMeta $metaData)
    {
        $this->metaData[] = $metaData;

        return $this;
    }

    /**
     * Remove metaData
     *
     * @param \TestBundle\Entity\MemberMeta $metaData
     */
    public function removeMetaDatum(\TestBundle\Entity\MemberMeta $metaData)
    {
        $this->metaData->removeElement($metaData);
    }

    /**
     * Get metaData
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMetaData()
    {
        return $this->metaData;
    }

    /**
     * Set type
     *
     * @param \TestBundle\Entity\AccountType $type
     * @return Member
     */
    public function setType(\TestBundle\Entity\AccountType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \TestBundle\Entity\AccountType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set originalEnroller
     *
     * @param \TestBundle\Entity\Member $originalEnroller
     * @return Member
     */
    public function setOriginalEnroller(\TestBundle\Entity\Member $originalEnroller = null)
    {
        $this->originalEnroller = $originalEnroller;

        return $this;
    }

    /**
     * Get originalEnroller
     *
     * @return \TestBundle\Entity\Member
     */
    public function getOriginalEnroller()
    {
        return $this->originalEnroller;
    }

    /**
     * Set highestRank
     *
     * @param \TestBundle\Entity\Rank $highestRank
     * @return Member
     */
    public function setHighestRank(\TestBundle\Entity\Rank $highestRank = null)
    {
        $this->highestRank = $highestRank;

        return $this;
    }

    /**
     * Get highestRank
     *
     * @return \TestBundle\Entity\Rank
     */
    public function getHighestRank()
    {
        return $this->highestRank;
    }

    /**
     * Set status
     *
     * @param \TestBundle\Entity\StatusType $status
     * @return Member
     */
    public function setStatus(\TestBundle\Entity\StatusType $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \TestBundle\Entity\StatusType
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Add users
     *
     * @param \TestBundle\Entity\User $users
     * @return Member
     */
    public function addUser(\TestBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \TestBundle\Entity\User $users
     */
    public function removeUser(\TestBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Get user
     *
     * @return User
     */
    public function getUser()
    {
        return $this->users->first();
    }

    /**
     * Add flags
     *
     * @param \TestBundle\Entity\FlagType $flags
     * @return Member
     */
    public function addFlag(\TestBundle\Entity\FlagType $flags)
    {
        $this->flags[] = $flags;

        return $this;
    }

    /**
     * Remove flags
     *
     * @param \TestBundle\Entity\FlagType $flags
     */
    public function removeFlag(\TestBundle\Entity\FlagType $flags)
    {
        $this->flags->removeElement($flags);
    }

    /**
     * Get flags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFlags()
    {
        return $this->flags;
    }
    /**
     * @var \TestBundle\Entity\Commission
     */
    private $commission;


    /**
     * Set commission
     *
     * @param \TestBundle\Entity\Commission $commission
     * @return Member
     */
    public function setCommission(\TestBundle\Entity\Commission $commission = null)
    {
        $this->commission = $commission;

        return $this;
    }

    /**
     * Get commission
     *
     * @return \TestBundle\Entity\Commission
     */
    public function getCommission()
    {
        return $this->commission;
    }
}
