<?php


namespace SN\AnimeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;


use Doctrine\ORM\Mapping as ORM;


/**
 * Genres
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SN\AnimeBundle\Entity\GenresRepository")
 */

class Genres

{
  
  /**

* @ORM\ManyToMany(targetEntity="anime", mappedBy="genres")

*/

private $animes;
/**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    
private $id;

    
/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
   
private $name;


  
public function __construct()
{
  $this->animes = new ArrayCollection();
}
/**
     * Get id
     *
     * @return integer 
     */
    
public function getId()
    {
        return $this->id;
    }

    
/**
     * Set name
     *
     * @param string $name
     * @return Genres
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
     * Add animes
     *
     * @param \SN\AnimeBundle\Entity\anime $animes
     * @return Genres
     */
    
public function addAnime(\SN\AnimeBundle\Entity\anime $animes)
    {
        $this->animes[] = $animes;

        return $this;
    }

    
/**
     * Remove animes
     *
     * @param \SN\AnimeBundle\Entity\anime $animes
     */
    
public function removeAnime(\SN\AnimeBundle\Entity\anime $animes)
    {
        $this->animes->removeElement($animes);
    }

    
/**
     * Get animes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    
public function getAnimes()
    {
        return $this->animes;
    }
}
