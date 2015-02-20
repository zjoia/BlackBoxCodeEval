<?php

namespace TestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Gateway
 *
 * @Serializer\ExclusionPolicy("all")
 */
class Gateway
{
    const GPG        = 'Gpg';
    const WALLET     = 'Wallet';
    const SAFETY_PAY = 'SafetyPay';
    const WUN        = 'Wun';
    const CASH       = 'Cash';
    const CMS        = 'Cms';

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
     * @var \Doctrine\Common\Collections\Collection
     * @Serializer\Type("ArrayCollection<TestBundle\Entity\GatewaysCredentialType>")
     */
    protected $credentials;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $gatewaySettingTypeValues;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->credentials = new \Doctrine\Common\Collections\ArrayCollection();
        $this->gatewaySettingTypeValues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return string
     */
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
     * @return Gateway
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
     * Add credentials
     *
     * @param \TestBundle\Entity\GatewayCredential $credentials
     * @return Gateway
     */
    public function addCredential(\TestBundle\Entity\GatewayCredential $credentials)
    {
        $this->credentials[] = $credentials;

        return $this;
    }

    /**
     * Remove credentials
     *
     * @param \TestBundle\Entity\GatewayCredential $credentials
     */
    public function removeCredential(\TestBundle\Entity\GatewayCredential $credentials)
    {
        $this->credentials->removeElement($credentials);
    }

    /**
     * Get credentials
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCredentials()
    {
        return $this->credentials;
    }

    public function getSandboxCredentials()
    {
        return $this->getCredentials()->filter(
            function($credential)
            {
                /** @var GatewayCredential $credential */
                return $credential->getType()->getName() === CredentialType::SANDBOX;
            }
        );
    }

    public function getProductionCredentials()
    {
        return $this->getCredentials()->filter(
            function($credential)
            {
                return $credential->getType()->getName() === CredentialType::PRODUCTION;
            }
        );
    }


    /**
     * Add gatewaySettingTypeValues
     *
     * @param \TestBundle\Entity\GatewaySettingTypeValue $gatewaySettingTypeValues
     * @return Gateway
     */
    public function addGatewaySettingTypeValue(\TestBundle\Entity\GatewaySettingTypeValue $gatewaySettingTypeValues)
    {
        $this->gatewaySettingTypeValues[] = $gatewaySettingTypeValues;

        return $this;
    }

    /**
     * Remove gatewaySettingTypeValues
     *
     * @param \TestBundle\Entity\GatewaySettingTypeValue $gatewaySettingTypeValues
     */
    public function removeGatewaySettingTypeValue(\TestBundle\Entity\GatewaySettingTypeValue $gatewaySettingTypeValues)
    {
        $this->gatewaySettingTypeValues->removeElement($gatewaySettingTypeValues);
    }

    /**
     * Get gatewaySettingTypeValues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGatewaySettingTypeValues()
    {
        return $this->gatewaySettingTypeValues;
    }

    /**
     * @param $gatewaySettingTypeName
     * @return GatewaySettingTypeValue
     */
    public function getSettingTypeValueByName($gatewaySettingTypeName)
    {
        $gatewaySettingTypeValues = $this->getGatewaySettingTypeValues()->filter(
            function(GatewaySettingTypeValue $gatewaySettingTypeValue) use ($gatewaySettingTypeName) {
                return $gatewaySettingTypeValue->getGatewaySettingType()->getName() == $gatewaySettingTypeName;
            }
        );

        if($gatewaySettingTypeValues->count() != 1)
        {
            throw new \LengthException('getSettingTypeValueBySettingTypeName count mismatch');
        }

        return $gatewaySettingTypeValues
            ->first();
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $gatewayCriteria;


    /**
     * Add gatewayCriteria
     *
     * @param \TestBundle\Entity\GatewayCriterion $gatewayCriteria
     * @return Gateway
     */
    public function addGatewayCriterion(\TestBundle\Entity\GatewayCriterion $gatewayCriteria)
    {
        $this->gatewayCriteria[] = $gatewayCriteria;

        return $this;
    }

    /**
     * Remove gatewayCriteria
     *
     * @param \TestBundle\Entity\GatewayCriterion $gatewayCriteria
     */
    public function removeGatewayCriterion(\TestBundle\Entity\GatewayCriterion $gatewayCriteria)
    {
        $this->gatewayCriteria->removeElement($gatewayCriteria);
    }

    /**
     * Get gatewayCriteria
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGatewayCriteria()
    {
        return $this->gatewayCriteria;
    }

    /**
     * @param $gatewayCriterionTypeName
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGatewayCriterionByCriterionTypeName($gatewayCriterionTypeName)
    {
        return $this->getGatewayCriteria()->filter(
            function(GatewayCriterion $gatewayCriterion) use ($gatewayCriterionTypeName) {
                return $gatewayCriterion->getGatewayCriterionType()->getName() == $gatewayCriterionTypeName;
            }
        );
    }
}
