<?php

namespace TestBundle\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class TypeService
{
    const BASE_NAMESPACE = "TestBundle\\Entity\\";

    /** @var  EntityManager */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getType($typeName)
    {
        // 0 = full string, 1 = Base class name, 2 = constant name
        $found = [];

        preg_match('/^(\w+)::(\w+)$/', $typeName, $found);

        if(count($found) != 3)
        {
            throw new \InvalidArgumentException("'$typeName' doesn't appear to be a valid type name");
        }

        $className = $found[1];
        $constantName = $found[2];
        $fqClass = self::BASE_NAMESPACE . $className;

        if (!class_exists($fqClass))
        {
            throw new \InvalidArgumentException("'$fqClass' doesn't exist");
        }

        $reflectedClass = new \ReflectionClass($fqClass);
        $constants = $reflectedClass->getConstants();

        if (!array_key_exists($constantName, $constants))
        {
            throw new \InvalidArgumentException("'$constantName' doesn't exist in $className");
        }

        $repoName = 'TestBundle:' . $className;
        /** @var EntityRepository $repo */
        $repo = $this->entityManager->getRepository($repoName);
        $type = $repo->findOneBy(['name' => $constants[$constantName]]);

        if (is_null($type))
        {
            throw new \InvalidArgumentException(
                "Could not find '$typeName' in db. Value is "
                . $reflectedClass->getConstant($constantName)
            );
        }

        return $type;
    }
}
