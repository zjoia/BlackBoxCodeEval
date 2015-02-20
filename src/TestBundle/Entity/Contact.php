<?php

namespace TestBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Debug\Exception\ContextErrorException;

/** Contact */
class Contact
{
    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Contact", "User"})
     */
    protected $id;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Contact"})
     */
    protected $salutation;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
     * @Serializer\Groups({"Contact"})
     */
    protected $dateOfBirth;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Contact"})
     */
    protected $taxNumber;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Contact"})
     */
    protected $firstName;

    /**
     * @var string
     * @Serializer\Type("string")
     * @Serializer\Groups({"Contact"})
     */
    protected $lastName;

    /**
     * @var \DateTime
     * @Serializer\Type("DateTime")
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
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ContactOrder>")
     * @Serializer\Exclude
     */
    protected $contactOrders;

    /**
     * @var \TestBundle\Entity\Language
     * @Serializer\Type("TestBundle\Entity\Language")
     * @Serializer\Groups({"Contact"})
     */
    protected $language;

    /**
     * @var \TestBundle\Entity\User
     * @Serializer\Type("TestBundle\Entity\User")
     * @Serializer\Groups({"Contact"})
     */
    protected $user;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ProductVariant>")
     * @Serializer\Exclude
     */
    protected $entitledProductVariants;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\CreditCard>")
     * @Serializer\Exclude
     */
    protected $creditCards;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Note>")
     * @Serializer\Exclude
     */
    protected $notes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\File>")
     * @Serializer\Exclude
     */
    protected $files;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Business>")
     * @Serializer\Groups({"Contact"})
     */
    protected $business;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Address>")
     * @Serializer\Groups({"Contact"})
     */
    protected $addresses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Email>")
     * @Serializer\Groups({"Contact"})
     */
    protected $emails;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\Phone>")
     * @Serializer\Groups({"Contact"})
     */
    protected $phones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\ContactType>")
     * @Serializer\Groups({"Contact"})
     */
    protected $types;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\AutoPay>")
     * @Serializer\Exclude
     */
    protected $autoPays;

    /**
     * @var \TestBundle\Entity\Wallet
     * @Serializer\Type("TestBundle\Entity\Wallet")
     * @Serializer\Exclude
     */
    protected $wallet;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\SubscriptionContactCredential>")
     * @Serializer\Exclude
     */
    protected $subscriptionContactCredentials;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscriptionFailures;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contactOrders = new \Doctrine\Common\Collections\ArrayCollection();
        $this->entitledProductVariants = new \Doctrine\Common\Collections\ArrayCollection();
        $this->creditCards = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->files = new \Doctrine\Common\Collections\ArrayCollection();
        $this->business = new \Doctrine\Common\Collections\ArrayCollection();
        $this->addresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emails = new \Doctrine\Common\Collections\ArrayCollection();
        $this->phones = new \Doctrine\Common\Collections\ArrayCollection();
        $this->types = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscriptionContactCredentials = new \Doctrine\Common\Collections\ArrayCollection();

        $this->createdAt = new \DateTime('now');

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
     * Set salutation
     *
     * @param string $salutation
     * @return Contact
     */
    public function setSalutation($salutation)
    {
        $this->salutation = $salutation;

        return $this;
    }

    /**
     * Get salutation
     *
     * @return string 
     */
    public function getSalutation()
    {
        return $this->salutation;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return Contact
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set taxNumber
     *
     * @param string $taxNumber
     * @return Contact
     */
    public function setTaxNumber($taxNumber)
    {
        $this->taxNumber = $this->encode($taxNumber);

        return $this;
    }

    /**
     * Get taxNumber
     *
     * @return string 
     */
    public function getTaxNumber()
    {
        return $this->decode($this->taxNumber);
    }

    /**
     * Get full name
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Contact
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Contact
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Contact
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
     * @return Contact
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
     * @return Contact
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
     * Add contactOrders
     *
     * @param \TestBundle\Entity\ContactOrder $contactOrders
     * @return Contact
     */
    public function addContactOrder(\TestBundle\Entity\ContactOrder $contactOrders)
    {
        $this->contactOrders[] = $contactOrders;

        return $this;
    }

    /**
     * Remove contactOrders
     *
     * @param \TestBundle\Entity\ContactOrder $contactOrders
     */
    public function removeContactOrder(\TestBundle\Entity\ContactOrder $contactOrders)
    {
        $this->contactOrders->removeElement($contactOrders);
    }

    /**
     * Get contactOrders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContactOrders()
    {
        return $this->contactOrders;
    }

    /**
     * Set language
     *
     * @param \TestBundle\Entity\Language $language
     * @return Contact
     */
    public function setLanguage(\TestBundle\Entity\Language $language = null)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return \TestBundle\Entity\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set user
     *
     * @param \TestBundle\Entity\User $user
     * @return Contact
     */
    public function setUser(\TestBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \TestBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add entitledProductVariants
     *
     * @param \TestBundle\Entity\ProductVariant $entitledProductVariants
     * @return Contact
     */
    public function addEntitledProductVariant(\TestBundle\Entity\ProductVariant $entitledProductVariants)
    {
        $this->entitledProductVariants[] = $entitledProductVariants;

        return $this;
    }

    /**
     * Remove entitledProductVariants
     *
     * @param \TestBundle\Entity\ProductVariant $entitledProductVariants
     */
    public function removeEntitledProductVariant(\TestBundle\Entity\ProductVariant $entitledProductVariants)
    {
        $this->entitledProductVariants->removeElement($entitledProductVariants);
    }

    /**
     * Get entitledProductVariants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEntitledProductVariants()
    {
        return $this->entitledProductVariants;
    }

    /**
     * Returns all packages the contact is entitled to
     *
     * @return ArrayCollection
     */
    public function getEntitledPackages()
    {
        $entitledPackages = new ArrayCollection();

        foreach ($this->getEntitledProductVariants() as $productVariant)
        {
            $product = $productVariant->getProduct();
            if ($product->isPackage())
            {
                $entitledPackages->add($product);
            }
        }

        return $entitledPackages;
    }

    /**
     * Add creditCards
     *
     * @param \TestBundle\Entity\CreditCard $creditCards
     * @return Contact
     */
    public function addCreditCard(\TestBundle\Entity\CreditCard $creditCards)
    {
        $this->creditCards[] = $creditCards;

        return $this;
    }

    /**
     * Remove creditCards
     *
     * @param \TestBundle\Entity\CreditCard $creditCards
     */
    public function removeCreditCard(\TestBundle\Entity\CreditCard $creditCards)
    {
        $this->creditCards->removeElement($creditCards);
    }

    /**
     * Get creditCards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCreditCards()
    {
        return $this->creditCards;
    }

    /**
     * Add notes
     *
     * @param \TestBundle\Entity\Note $notes
     * @return Contact
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
     * Add files
     *
     * @param \TestBundle\Entity\File $files
     * @return Contact
     */
    public function addFile(\TestBundle\Entity\File $files)
    {
        $this->files[] = $files;

        return $this;
    }

    /**
     * Remove files
     *
     * @param \TestBundle\Entity\File $files
     */
    public function removeFile(\TestBundle\Entity\File $files)
    {
        $this->files->removeElement($files);
    }

    /**
     * Get files
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * Add business
     *
     * @param \TestBundle\Entity\Business $business
     * @return Contact
     */
    public function addBusiness(\TestBundle\Entity\Business $business)
    {
        $this->business[] = $business;

        return $this;
    }

    /**
     * Remove business
     *
     * @param \TestBundle\Entity\Business $business
     */
    public function removeBusiness(\TestBundle\Entity\Business $business)
    {
        $this->business->removeElement($business);
    }

    /**
     * Get business
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBusiness()
    {
        return $this->business;
    }

    /**
     * Add addresses
     *
     * @param \TestBundle\Entity\Address $addresses
     * @return Contact
     */
    public function addAddress(\TestBundle\Entity\Address $addresses)
    {
        $this->addresses[] = $addresses;

        return $this;
    }

    /**
     * Remove addresses
     *
     * @param \TestBundle\Entity\Address $addresses
     */
    public function removeAddress(\TestBundle\Entity\Address $addresses)
    {
        $this->addresses->removeElement($addresses);
    }

    /**
     * Get addresses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAddresses()
    {
        return $this->addresses;
    }


    public function getPrimaryAddress()
    {
        /** @var Address $address */
        foreach($this->getAddresses() as $address)
        {
            /** @var AddressType $type */
            foreach($address->getTypes() as $type)
            {
                if($type->getName() == AddressType::PRIMARY)
                {
                    return $address;
                }
            }
        }

        return null;
    }

    /**
     * @param ArrayCollection $addresses
     * @return $this
     */
    public function setAddresses(ArrayCollection $addresses)
    {
        $this->addresses = $addresses;
        return $this;
    }

    /**
     * Add emails
     *
     * @param \TestBundle\Entity\Email $emails
     * @return Contact
     */
    public function addEmail(\TestBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \TestBundle\Entity\Email $emails
     */
    public function removeEmail(\TestBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add phones
     *
     * @param \TestBundle\Entity\Phone $phones
     * @return Contact
     */
    public function addPhone(\TestBundle\Entity\Phone $phones)
    {
        $this->phones[] = $phones;

        return $this;
    }

    /**
     * Remove phones
     *
     * @param \TestBundle\Entity\Phone $phones
     */
    public function removePhone(\TestBundle\Entity\Phone $phones)
    {
        $this->phones->removeElement($phones);
    }

    /**
     * Get phones
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add types
     *
     * @param \TestBundle\Entity\ContactType $types
     * @return Contact
     */
    public function addType(\TestBundle\Entity\ContactType $types)
    {
        $this->types[] = $types;

        return $this;
    }

    /**
     * Remove types
     *
     * @param \TestBundle\Entity\ContactType $types
     */
    public function removeType(\TestBundle\Entity\ContactType $types)
    {
        $this->types->removeElement($types);
    }

    /**
     * Get types
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * Returns a Contacts's Primary Email
     *
     * @return Email
     */
    public function getPrimaryEmail()
    {
        /** @var Email $email */
        foreach($this->getEmails() as $email)
        {
            /** @var EmailType $type */
            foreach($email->getTypes() as $type)
            {
                if($type->getName() == EmailType::PRIMARY)
                {
                    return $email;
                }
            }
        }
        return null;
    }


    /**
     * @param Email $primaryEmail
     * @deprecated This does NOT actually set the PRIMARY phone, it ASSUMES you are passing a primary phone
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setPrimaryEmail(Email $primaryEmail)
    {
        /*
         * primary Email will always be a single instance of an
         * Email with the type set to Primary, if not throw
         */

        //if(!is_null($primaryEmail->getTypes()->first()) && ($primaryEmail->getTypes()->first() === EmailType::PRIMARY))
        //{
            $this->addEmail($primaryEmail);
            return $this;
        //}

        //throw new \InvalidArgumentException("Email Type not set to Primary");
    }

    /**
     * Returns a Contacts's Primary Phone
     *
     * @return Phone
     */
    public function getPrimaryPhone()
    {
        /** @var Phone $phone */
        foreach($this->getPhones() as $phone)
        {
            /** @var PhoneType $type */
            foreach($phone->getTypes() as $type)
            {
                if($type->getName() == PhoneType::PRIMARY)
                {
                    return $phone;
                }
            }
        }
        return null;
    }

    /**
     * @param Phone $primaryPhone
     * @deprecated This does NOT actually set the PRIMARY phone, it ASSUMES you are passing a primary phone
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function setPrimaryPhone(Phone $primaryPhone)
    {
        /*
         * primary Phone will always be a single instance of an
         * Phone with the type set to Primary, if not throw
         */

        //if(!is_null($primaryPhone->getTypes()->first()) && ($primaryPhone->getTypes()->first() === phoneType::PRIMARY))
        //{
        $this->addPhone($primaryPhone);
        return $this;
       // }

        //throw new \InvalidArgumentException("Phone Type is not set to Primary");
    }

    /**
     * Returns a Contacts's Primary Phone
     *
     * @return Phone
     */
    public function getCellPhone()
    {
        /** @var Phone $phone */
        foreach($this->getPhones() as $phone)
        {
            /** @var PhoneType $type */
            foreach($phone->getTypes() as $type)
            {
                if($type->getName() == PhoneType::CELL)
                {
                    return $phone;
                }
            }
        }
        return null;
    }

    /**
     * Add autoPays
     *
     * @param \TestBundle\Entity\AutoPay $autoPays
     * @return Contact
     */
    public function addAutoPay(\TestBundle\Entity\AutoPay $autoPays)
    {
        $this->autoPays[] = $autoPays;

        return $this;
    }

    /**
     * Remove autoPays
     *
     * @param \TestBundle\Entity\AutoPay $autoPays
     */
    public function removeAutoPay(\TestBundle\Entity\AutoPay $autoPays)
    {
        $this->autoPays->removeElement($autoPays);
    }

    /**
     * Get autoPays
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAutoPays()
    {
        return $this->autoPays;
    }

    /**
     * Set wallet
     *
     * @param \TestBundle\Entity\Wallet $wallet
     * @return Contact
     */
    public function setWallet(\TestBundle\Entity\Wallet $wallet = null)
    {
        $this->wallet = $wallet;

        return $this;
    }

    /**
     * Get wallet
     *
     * @return \TestBundle\Entity\Wallet
     */
    public function getWallet()
    {
        return $this->wallet;
    }

    /**
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getSubscriptionContactCredentials()
    {
        return $this->subscriptionContactCredentials;
    }

    /**
     * @param \Doctrine\Common\Collections\ArrayCollection $subscriptionContactCredentials
     */
    public function setSubscriptionContactCredentials(ArrayCollection $subscriptionContactCredentials)
    {
        $this->subscriptionContactCredentials = $subscriptionContactCredentials;
    }

    public function getSubscriptionContactCredentialsByProviderName($providerName)
    {
        if (!$providerName)
            return new ArrayCollection();

        return $this->getSubscriptionContactCredentials()->filter(
            function($credential) use ($providerName)
            {
                /** @var SubscriptionContactCredential $credential */
                if($credential->getSubscriptionProvider()->getName() === $providerName)
                {
                    return true;
                }
                return false;
            }
        );
    }

    public function isSubscribed(SubscriptionProvider $provider)
    {
        $credentials = $this->getSubscriptionContactCredentialsByProviderName($provider->getName());

        $filteredCredentials = $credentials->filter(
            function($credential)
            {
                /** @var SubscriptionContactCredential $credential */
                if ($credential->getSubscriptionContactCredentialKey()->getName() === SubscriptionContactCredentialKey::SUBSCRIBED)
                    return true;
                return false;
            }
        );

        return ($filteredCredentials->count() > 0);
    }

    /**
     * Encode TaxNumber (copied from HUB)
     *
     * @param $string
     * @param string $key
     * @return string
     */
    private function encode($string, $key = "HFu8x0zw") {
        $hash = "";
        $j = 0;
        $key = sha1($key);
        $strLen = strlen($string);
        $keyLen = strlen($key);
        for ($i = 0; $i < $strLen; $i++) {
            $ordStr = ord(substr($string,$i,1));
            if ($j == $keyLen) $j = 0;
            $ordKey = ord(substr($key,$j,1));
            $j++;
            $hash .= strrev(base_convert(dechex($ordStr + $ordKey),16,36));
        }

        return $hash;
    }

    /**
     * Decode TaxNumber (copied from HUB)
     *
     * @param $string
     * @param string $key
     * @return string
     */
    private function decode($string, $key = "HFu8x0zw") {
        $key = sha1($key);
        $hash = "";
        $j = 0;
        $strLen = strlen($string);
        $keyLen = strlen($key);
        for ($i = 0; $i < $strLen; $i+=2) {
            $ordStr = hexdec(base_convert(strrev(substr($string, $i,2)),36,16));
            if ($j == $keyLen) $j = 0;
            $ordKey = ord(substr($key,$j,1));
            $j++;
            $hash .= chr($ordStr - $ordKey);
        }
        return $hash;
    }

    /**
     * Add subscriptionContactCredentials
     *
     * @param \TestBundle\Entity\SubscriptionContactCredential $subscriptionContactCredentials
     * @return Contact
     */
    public function addSubscriptionContactCredential(\TestBundle\Entity\SubscriptionContactCredential $subscriptionContactCredentials)
    {
        $this->subscriptionContactCredentials[] = $subscriptionContactCredentials;

        return $this;
    }

    /**
     * Remove subscriptionContactCredentials
     *
     * @param \TestBundle\Entity\SubscriptionContactCredential $subscriptionContactCredentials
     */
    public function removeSubscriptionContactCredential(\TestBundle\Entity\SubscriptionContactCredential $subscriptionContactCredentials)
    {
        $this->subscriptionContactCredentials->removeElement($subscriptionContactCredentials);
    }

    /**
     * Add subscriptionFailures
     *
     * @param \TestBundle\Entity\SubscriptionProvider $subscriptionFailures
     * @return Contact
     */
    public function addSubscriptionFailure(\TestBundle\Entity\SubscriptionProvider $subscriptionFailures)
    {
        $this->subscriptionFailures[] = $subscriptionFailures;

        return $this;
    }

    /**
     * Remove subscriptionFailures
     *
     * @param \TestBundle\Entity\SubscriptionProvider $subscriptionFailures
     */
    public function removeSubscriptionFailure(\TestBundle\Entity\SubscriptionProvider $subscriptionFailures)
    {
        $this->subscriptionFailures->removeElement($subscriptionFailures);
    }

    /**
     * Get subscriptionFailures
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptionFailures()
    {
        return $this->subscriptionFailures;
    }
}
