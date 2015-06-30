<?php


namespace SN\AnimeBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SN\AnimeBundle\Entity\Genres;

class LoadGenres implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    
    $names = array(
      'Action',
      'Aventure',
      'Amour & Amitie',
      'Combat',
      'Comedie', 'Contes & Recits', 'Cyber & Mecha', 'Dark Fantasy', 'Drame', 'Ecchi', 'Educatif', 'Enigme & Policier',
      'Epique & Heroique', 'Espace & Sci-Fiction', 'Familial & Jeunesse', 'Fantastique et Mythe', 'Historique', 'Horreur',
      'Magical Girl', 'Musical', 'Psychologique', 'Sport', 'Tranche de vie', 'Shojo Ai', 'Shonen Ai'
    );

    foreach ($names as $name) {
      
      $genre = new Genres();
      $genre->setName($name);

      // On la persiste
      $manager->persist($genre);
    }

    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}