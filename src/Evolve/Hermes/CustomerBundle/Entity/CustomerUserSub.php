<?php

namespace Evolve\Hermes\CustomerBundle\Entity;


use Doctrine\ORM\Mapping as ORM;
use Evolve\Hermes\UserBundle\Entity\User;


/**
 * @ORM\Entity
 * @ORM\AssociationOverrides(
 *  {
 *      @AssociationOverride(name="customers",
 *          joinTable=@JoinTable(
 *              name="user_customer",
 *              joinColumns=@JoinColumn(name="user_id"),
 *              inverseJoinColumns=@JoinColumn(name="customer_id")
 *          )
 *      )
 *  }
 * )
 */
class CustomerUserSub extends User
{
}