<?php

namespace TestBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BaseRepository extends EntityRepository
{
    public function persist($entity)
    {
        $this->_em->persist($entity);
    }

    public function flush()
    {
        $this->getEntityManager()->flush();
    }

    public function remove($entity)
    {
        $this->getEntityManager()->remove($entity);
    }

    public function detach($entity)
    {
        $this->getEntityManager()->detach($entity);
    }
}
