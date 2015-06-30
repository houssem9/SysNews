<?php



namespace SN\SysNewsBundle\Entity;



use Doctrine\ORM\Mapping as ORM;



/**
 * Comment
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SN\SysNewsBundle\Entity\CommentRepository")
 
* @ORM\HasLifecycleCallbacks()
*/


class Comment


{
   



/**

   * @ORM\ManyToOne(targetEntity="SN\SysNewsBundle\Entity\News", inversedBy="comments",cascade={"persist"})

    * @ORM\JoinColumn(nullable=false)  
   */

  
private $news; 

/**

   * @ORM\ManyToOne(targetEntity="SN\UserBundle\Entity\User", cascade={"persist"})
   
   * @ORM\JoinColumn(nullable=false)   
   */

  
private $user;

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
     * @ORM\Column(name="contenu", type="text")
     */
    

private $contenu;

    

/**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    

private $date;


  
 
public function __construct()

{
$this->date = new \Datetime();
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
     * Set contenu
     *
     * @param string $contenu
     * @return Comment
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
     * Set date
     *
     * @param \DateTime $date
     * @return Comment
     */
    

public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    

/**
     * Get date
     *
     * @return \DateTime 
     */
    

public function getDate()
    {
        return $this->date;
    }



/**
     * Set news
     *
     * @param \SN\SNSysNewsBundle\Entity\News $news
     * @return Comment
     */
    

public function setNews(News $news  )
    {
        $this->news = $news;

        return $this;
    }

    

/**
     * Get news
     *
     * @return \SN\SNSysNewsBundle\Entity\News 
     */
    

public function getNews()
    {
        return $this->news;
    }

    

/**
     * Set user
     *
     * @param \SN\UserBundle\Entity\User $user
     * @return Comment
     */
    

public function setUser(\SN\UserBundle\Entity\User $user )
    {
        $this->user = $user;

        return $this;
    }

    

/**
     * Get user
     *
     * @return \SN\UserBundle\Entity\User 
     */
   
 
public function getUser()
    {
        return $this->user;
    }



/**

   * @ORM\PrePersist

   */

  public function increase()

  {

    $this->getNews()->increaseComment();

  }

  /**

   * @ORM\PreRemove

   */

  public function decrease()

  {

    $this->getNews()->decreaseComment();

  }}
