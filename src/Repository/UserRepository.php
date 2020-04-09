<?php
namespace Repository;

use Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository {

    public function getByPassWord(string $pw): User {

        $qb = $this->em->createQueryBuilder();

        return $qb->select('u')
        ->from('Demo:User', 'u')
        ->where('u.password = :uPw')
        ->setParameter('uPw', $pw)
        ->getQuery()
        ->getOneOrNullResult()
        ;       
        
    }

}