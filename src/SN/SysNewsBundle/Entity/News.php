<?php
namespace SN\SysNewsBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * News
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SN\SysNewsBundle\Entity\NewsRepository")
 * @UniqueEntity(fields="titre", message="Un news existe déjà avec ce titre.") */

class News

{
  
/**

   * @ORM\Column(name="nb_comments", type="integer")

   */

  private $nbComments = 0;



 /**

   * @ORM\OneToMany(targetEntity="SN\SysNewsBundle\Entity\Comment", mappedBy="news", cascade = {"persist", "remove"})
   
   */

  private $comments; 

/**

   * @ORM\ManyToOne(targetEntity="SN\UserBundle\Entity\User", cascade={"persist"})

    * @ORM\JoinColumn(nullable=false)
   
   */

  protected $user;
/**

   * @ORM\OneToOne(targetEntity="SN\SysNewsBundle\Entity\Image", cascade={"persist", "remove"})
   * @Assert\Valid()
   */

  private $image; 
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
     * @ORM\Column(name="titre", type="string", length=255, unique=true)
  * @Assert\Length(min=10)   */
    
private $titre;

    
/**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
  * @Assert\NotBlank()   */
    
private $contenu;

    
/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateajout", type="date")
    * @Assert\DateTime() */
    
private $dateajout;

    
/**
     * @var \DateTime
     *
     * @ORM\Column(name="datemodif", type="date")
    * @Assert\DateTime() */
    
private $datemodif;


  
 public function __construct()

  {

    $this->dateajout = new\Datetime(); 
 
    $this->datemodif = new \Datetime();
    $this->comments = new ArrayCollection();

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
     * @return News
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
     * Set contenu
     *
     * @param string $contenu
     * @return News
     */
    
public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    
/**
     * Get contenu
     *
     * @return string 
     */
    
public function getContenu()
    {
        return $this->contenu;
    }

    
/**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     * @return News
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
     * Set datemodif
     *
     * @param \DateTime $datemodif
     * @return News
     */
    
public function setDatemodif($datemodif)
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    
/**
     * Get datemodif
     *
     * @return \DateTime 
     */
    
public function getDatemodif()
    {
        return $this->datemodif;
    }


/**
     * Set image
     *
     * @param \SN\SysNewsBundle\Entity\Image $image
     * @return News
     */
    
public function setImage(\SN\SysNewsBundle\Entity\Image $image = null)
    {
        $this->image = $image;

        return $this;
    }

    
/**
     * Get image
     *
     * @return \SN\SysNewsBundle\Entity\Image 
     */
    
public function getImage()
    {
        return $this->image;
    }


/**
     * Set user
     *
     * @param \sn\UserBundle\Entity\User $user
     * @return News
     */
    
public function setUser(\sn\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    
/**
     * Get user
     *
     * @return \sn\UserBundle\Entity\User 
     */
    
public function getUser()
    {
        return $this->user;
    }


/**
     * Add comments
     *
     * @param \SN\SysNewsBundle\Entity\Comment $comments
     * @return News
     */
    
public function addComment(\SN\SysNewsBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

       return $this;
    }

    
/**
     * Remove comments
     *
     * @param \SN\SysNewsBundle\Entity\Comment $comments
     */
    
public function removeComment(\SN\SysNewsBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    
/**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    
public function getComments()
    {
        return $this->comments;
    }

 public function increaseComment()

  {

    $this->nbComments++;

  }

  public function decreaseComment()

  {

    $this->nbComments--;

  }

   

    /**
     * Set nbComments
     *
     * @param integer $nbComments
     * @return News
     */
    public function setNbComments($nbComments)
    {
        $this->nbComments = $nbComments;

        return $this;
    }

    /**
     * Get nbComments
     *
     * @return integer 
     */
    public function getNbComments()
    {
        return $this->nbComments;
    }
}
