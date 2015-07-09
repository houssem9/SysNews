<?php
namespace SN\SysNewsBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;
/**
 * NewsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */

class NewsRepository extends EntityRepository

{

 public function getNewss($page, $nbPerPage)

  {

    $query = $this->createQueryBuilder('n')

      ->leftJoin('n.image', 'i')

      ->addSelect('i')

      

      ->orderBy('n.dateajout', 'DESC')

      ->getQuery()

    ;

    $query

      // On d�finit l'annonce � partir de laquelle commencer la liste

      ->setFirstResult(($page-1) * $nbPerPage)

      // Ainsi que le nombre d'annonce � afficher sur une page

      ->setMaxResults($nbPerPage)

    ;

    // Enfin, on retourne l'objet Paginator correspondant � la requ�te construite

    // (n'oubliez pas le use correspondant en d�but de fichier)

    return new Paginator($query, true);

  }




}
