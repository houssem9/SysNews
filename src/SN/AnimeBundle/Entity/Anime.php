<?php


namespace SN\AnimeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Anime
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SN\AnimeBundle\Entity\AnimeRepository")
 */

class Anime

{
 
/**
   * @ORM\ManyToMany(targetEntity="SN\AnimeBundle\Entity\Genres", inversedBy="animes",  cascade={"persist"})
    * @ORM\JoinTable(name="anime_genres")
   */
  private $genres;
/**
   * @ORM\OneToOne(targetEntity="SN\AnimeBundle\Entity\Imageanime", cascade={"persist"})
   */
  private $image;   
/**
   * @ORM\Column(name="dateajout", type="date")
   */
private $dateajout;
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    
private $titre;

    
/**
     * @var string
     *
     * @ORM\Column(name="auteur", type="string", length=255)
     */
    
private $auteur;

    
/**
     * @var \DateTime
     *
     * @ORM\Column(name="sortieinitial", type="date")
     */
    
private $sortieinitial;

    
/**
     * @var integer
     *
     * @ORM\Column(name="nbEpisodes", type="integer")
     */
    
private $nbEpisodes;

    
/**
     * @var string
     *
     * @ORM\Column(name="synopsis", type="text")
     */
    
private $synopsis;

    
/**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean")
     */
    
private $etat;



public function __construct()
  {
    $this->dateajout = new \Datetime();
    $this->sortieinitiale = new\Datetime();
    $this->genres = new ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     * @return Anime
     */
    
public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    
/**
     * Get titre
     *
     * @return string 
     */
    
public function getTitre()
    {
        return $this->titre;
    }

    
/**
     * Set auteur
     *
     * @param string $auteur
     * @return Anime
     */
    
public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    
/**
     * Get auteur
     *
     * @return string 
     */
    
public function getAuteur()
    {
        return $this->auteur;
    }

    
/**
     * Set sortieinitial
     *
     * @param \DateTime $sortieinitial
     * @return Anime
     */
    
public function setSortieinitial($sortieinitial)
    {
        $this->sortieinitial = $sortieinitial;

        return $this;
    }

    
/**
     * Get sortieinitial
     *
     * @return \DateTime 
     */
    
public function getSortieinitial()
    {
        return $this->sortieinitial;
    }

    
/**
     * Set nbEpisodes
     *
     * @param integer $nbEpisodes
     * @return Anime
     */
    
public function setNbEpisodes($nbEpisodes)
    {
        $this->nbEpisodes = $nbEpisodes;

        return $this;
    }

    
/**
     * Get nbEpisodes
     *
     * @return integer 
     */
    
public function getNbEpisodes()
    {
        return $this->nbEpisodes;
    }

    
/**
     * Set synopsis
     *
     * @param string $synopsis
     * @return Anime
     */
    
public function setSynopsis($synopsis)
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    
/**
     * Get synopsis
     *
     * @return string 
     */
    
public function getSynopsis()
    {
        return $this->synopsis;
    }

    
/**
     * Set etat
     *
     * @param boolean $etat
     * @return Anime
     */
    
public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    
/**
     * Get etat
     *
     * @return boolean 
     */
    
public function getEtat()
    {
        return $this->etat;
    }

/**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     * @return Anime
     */
    
public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    
/**
     * Get dateajout
     *
     * @return \DateTime 
     */
    
public function getDateajout()
 {
        return $this->dateajout;
    }

    
/**
     * Add genres
     *
     * @param \SN\AnimeBundle\Entity\Genres $genres
     * @return Anime
     */
    
public function addGenre(\SN\AnimeBundle\Entity\Genres $genres)
    {
        if(!$this->genres->contains($genres)){$this->genres[] = $genres;

 }       return $this;
    }

    
/**
     * Remove genres
     *
     * @param \SN\AnimeBundle\Entity\Genres $genres
     */
    
public function removeGenre(\SN\AnimeBundle\Entity\Genres $genres)
    {
        $this->genres->removeElement($genres);
    }

    
/**
     * Get genres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    
public function getGenres()
    {
        return $this->genres;
    }

    
/**
     * Set image
     *
     * @param \SN\AnimeBundle\Entity\Imageanime $image
     * @return Anime
     */
    
public function setImage(\SN\AnimeBundle\Entity\Imageanime $image = null)
    {
        $this->image = $image;

        return $this;
    }

    
/**
     * Get image
     *
     * @return \SN\AnimeBundle\Entity\Imageanime 
     */
    
public function getImage()
    {
        return $this->image;
    }

}
