<?php


namespace SN\SysNewsBundle\Entity;


use Doctrine\ORM\EntityRepository;


/**
 * ConnecteRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class ConnecteRepository extends EntityRepository

{

  public function getcountnumbervisit()
   {
     $qb = $this->createQueryBuilder('c');
     $count = $qb->getQuery()->getScalarResult();

     return $count

  ;

}}
