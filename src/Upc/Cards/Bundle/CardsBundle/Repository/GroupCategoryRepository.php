<?php

namespace Upc\Cards\Bundle\CardsBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * GroupCategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GroupCategoryRepository extends EntityRepository {

    public function getCategoriesHome() {

        $status = 1;

        $qb = $this->createQueryBuilder('cg')
                ->select('cg, c')
                ->innerJoin('cg.categories', 'c')
                ->where('cg.status = :c_status')
                ->andWhere('c.status = :c_status')
                ->setParameter('c_status', $status);;

        return $qb->getQuery()->getResult();

    }

}
