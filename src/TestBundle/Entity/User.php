<?php

namespace TestBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Security\Core\User\UserInterface;
use TestBundle\Component\Authentication\Encoder\LegacyEncoder;

/** User */
class User implements UserInterface, \Serializable
{
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
    protected $username;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    protected $password;

    /**
     * @var string
     * @Serializer\Type("string")
     */
    private $salt;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     */
    protected $deletedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Note>")
     */
    protected $notes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Contact>")
     */
    protected $contacts;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Member>")
     */
    protected $members;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\UserFlagType>")
     */
    protected $flags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\RoleType>")
     */
    protected $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\TimedToken>")
     * @Serializer\Exclude
     */
    protected $timedTokens;

    /**
     * @var \Wun\Iris\WalletBundle\Entity\Members
     * @Serializer\Type("ArrayCollection<Wun\Iris\WalletBundle\Entity\Members>")
     * @Serializer\Exclude
     *
     */
    protected $legacyMember;

    /**
     * @var \TestBundle\Entity\RegionZone
     * @Serializer\Type("TestBundle\Entity\RegionZone")
     */
    protected $regionZone;

    /**
     * @var \TestBundle\Entity\Notification
     * @Serializer\Type("TestBundle\Entity\Notification")
     */
    protected $notifications;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->contacts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->members = new \Doctrine\Common\Collections\ArrayCollection();
        $this->flags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->roles = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @todo Migrate this functionality to a listener
     * @see https://doctrine-orm.readthedocs.org/en/latest/reference/change-tracking-policies.html#notify
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $encoder = new LegacyEncoder();

        if(!$this->getSalt())
        {
            $this->setSalt();
        }

        $this->password = $encoder->encodePassword($password, $this->getSalt());

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     * @return User
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
     * Add notes
     *
     * @param \TestBundle\Entity\Note $notes
     * @return User
     */
    public function addNote(\TestBundle\Entity\Note $notes)
    {
        $this->notes[] = $notes;

        return $this;
    }

    /**
     * Remove notes
     *
     * @param \TestBundle\Entity\Note $notes
     */
    public function removeNote(\TestBundle\Entity\Note $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Add contacts
     *
     * @param \TestBundle\Entity\Contact $contacts
     * @return User
     */
    public function addContact(\TestBundle\Entity\Contact $contacts)
    {
        $this->contacts[] = $contacts;

        return $this;
    }

    /**
     * Remove contacts
     *
     * @param \TestBundle\Entity\Contact $contacts
     */
    public function removeContact(\TestBundle\Entity\Contact $contacts)
    {
        $this->contacts->removeElement($contacts);
    }

    /**
     * Get contacts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param ArrayCollection $contacts
     * @return $this
     */
    public function setContacts(ArrayCollection $contacts)
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * Returns a User's Primary Contact
     *
     * @return Contact
     */
    public function getPrimaryContact()
    {
        /** @var Contact $contact */
        foreach($this->getContacts() as $contact)
        {
            /** @var ContactType $type */
            foreach($contact->getTypes() as $type)
            {
                if($type->getName() == ContactType::PRIMARY)
                {
                    return $contact;
                }
            }
        }
        return null;
    }

    /**
     * Set members
     *
     * @param array $members
     * @return User
     */
    public function setMembers($members = null)
    {
        $this->members = $members;
        if (is_array($members) || $members instanceof Collection) {
            foreach ($members as $member) {
                $member->addUser($this);
            }
        }


        return $this;
    }

    /**
     * Add members
     *
     * @param \TestBundle\Entity\Member $members
     * @return User
     */
    public function addMember(\TestBundle\Entity\Member $members)
    {
        $this->members[] = $members;
        $members->addUser($this);

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
     * Get member
     *
     * @return \TestBundle\Entity\Member
     */
    public function getMember()
    {
        return $this->members->first();
    }

    /**
     * Add flags
     *
     * @param \TestBundle\Entity\UserFlagType $flags
     * @return User
     */
    public function addFlag(\TestBundle\Entity\UserFlagType $flags)
    {
        $this->flags[] = $flags;

        return $this;
    }

    /**
     * Remove flags
     *
     * @param \TestBundle\Entity\UserFlagType $flags
     */
    public function removeFlag(\TestBundle\Entity\UserFlagType $flags)
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
     * @inheritDoc
     */
    public function getRoles()
    {
        return $this->roles->toArray();
    }

    /**
     * Add roles
     *
     * @param \TestBundle\Entity\RoleType $roles
     * @return User
     */
    public function addRole(\TestBundle\Entity\RoleType $roles)
    {
        $this->roles[] = $roles;

        return $this;
    }

    /**
     * Remove roles
     *
     * @param \TestBundle\Entity\RoleType $roles
     */
    public function removeRole(\TestBundle\Entity\RoleType $roles)
    {
        $this->roles->removeElement($roles);
    }

    /**
     * @inheritDoc
     */
    public function getNotifications()
    {
        return $this->notifications;
    }

    /**
     * Add notification
     *
     * @param \TestBundle\Entity\Notification $notification
     * @return User
     */
    public function addNotification(\TestBundle\Entity\Notification $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \TestBundle\Entity\Notification $notification
     */
    public function removeNotification(\TestBundle\Entity\Notification $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Add timedTokens
     *
     * @param \TestBundle\Entity\TimedToken $timedTokens
     * @return User
     */
    public function addTimedToken(\TestBundle\Entity\TimedToken $timedTokens)
    {
        $this->timedTokens[] = $timedTokens;

        return $this;
    }

    /**
     * Remove timedTokens
     *
     * @param \TestBundle\Entity\TimedToken $timedTokens
     */
    public function removeTimedToken(\TestBundle\Entity\TimedToken $timedTokens)
    {
        $this->timedTokens->removeElement($timedTokens);
    }

    /**
     * Get timedTokens
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTimedTokens()
    {
        return $this->timedTokens;
    }

    /**
     * Set salt
     *
     * @return User
     */
    public function setSalt()
    {
        $this->salt = substr(md5(uniqid(rand(), true)), 0, 4);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {

    }

    /**
     * Set legacyMember
     *
     * @param \Wun\Iris\WalletBundle\Entity\Members $legacyMember
     * @return User
     */
    public function setLegacyMember($legacyMember = null)
    {
        $this->legacyMember = $legacyMember;

        return $this;
    }

    /**
     * Get legacyMember
     *
     * @return \Wun\Iris\WalletBundle\Entity\Members
     */
    public function getLegacyMember()
    {
        return $this->legacyMember;
    }

    /**
     * Set regionZone
     *
     * @param \TestBundle\Entity\RegionZone $regionZone
     * @return User
     */
    public function setRegionZone(\TestBundle\Entity\RegionZone $regionZone = null)
    {
        $this->regionZone = $regionZone;

        return $this;
    }

    /**
     * Get regionZone
     *
     * @return \TestBundle\Entity\RegionZone
     */
    public function getRegionZone()
    {
        return $this->regionZone;
    }

    /**
     * @see \Serializable::serialize()
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
        ));
    }

    /**
     * @see \Serializable::unserialize()
     */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password
            ) = unserialize($serialized);
    }
}
