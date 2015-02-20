<?php

namespace TestBundle\Tests;

use Doctrine\Common\Collections\ArrayCollection;

class BaseTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param mixed $class Namespace or Object
     * @param string $methodName
     * @param array $arguments
     * @return mixed Results of method call
     */
    protected function executePrivateMethod($class, $methodName, array $arguments = array())
    {
        $refClass = new \ReflectionClass($class);

        $method = $refClass->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($class, $arguments);
    }

    /**
     * @param $class
     * @param null $type
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getSimpleMock($class, $type = null)
    {
        if($type)
        {
            switch($type)
            {
                case 'Entity':
                    $namespace = "\\TestBundle\\Entity\\%s";
                    break;
                case 'Service':
                    $namespace = "\\TestBundle\\Service\\%sService";
                    break;
                default:
                    throw new \InvalidArgumentException("Simple mock of type '$type' not available");
            }

            $class = sprintf($namespace, $class);
        }

        if (!class_exists($class))
        {
            throw new \InvalidArgumentException("Could not mock $class");
        }

        return $this->getMockBuilder($class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @param $entity
     * @param array $methodArray
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockEntityRepository($entity, $methodArray = [])
    {
        $repoClass = '\\TestBundle\\Repository\\BaseRepository';
        $customRepoClass = '\\TestBundle\\Repository\\' . $entity . 'Repository';

        if (class_exists($customRepoClass))
        {
            $repoClass = $customRepoClass;
        }

        $mockBuilder =
            $this
                ->getMockBuilder($repoClass)
                ->disableOriginalConstructor();

        if (count($methodArray) > 0)
        {
            $mockBuilder->setMethods($methodArray);
        }

        return $mockBuilder->getMock();
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    protected function getMockEntityManager()
    {
        $mEm     = $this->getMock(
            '\Doctrine\ORM\EntityManager',
            array(
                'getRepository',
                'getClassMetadata',
                'persist',
                'flush',
                'getConfiguration',
                'find',
                'remove',
                'getFilters'
            ),
            array(),
            '',
            false
        );

        $mEm->expects($this->any())
            ->method('getClassMetadata')
            ->will($this->returnValue((object)array('name' => 'aClass')));

        $mEm->expects($this->any())
            ->method('persist')
            ->will($this->returnValue(null));

        $mEm->expects($this->any())
            ->method('flush')
            ->will($this->returnValue(null));

        $mEm->expects($this->any())
            ->method('remove')
            ->will($this->returnValue(null));

        return $mEm;
    }

    /**
     * @param $contents
     * @param int $count
     * @return ArrayCollection
     */
    protected function getMockArrayCollection($contents, $count = 0)
    {
        $ret = new ArrayCollection();

        for($i = 0; $i < $count; $i++)
        {
            $ret->add($contents);
        }

        return $ret;
    }
}
