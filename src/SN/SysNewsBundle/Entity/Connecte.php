<?php


namespace SN\SysNewsBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Connecte
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="SN\SysNewsBundle\Entity\ConnecteRepository")
 */

class Connecte

{
    
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
     * @ORM\Column(name="ip", type="string", length=255)
     */
    
private $ip;

    
/**
     * @var integer
     *
     * @ORM\Column(name="times", type="integer")
     */
    
private $times;


    
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
     * Set ip
     *
     * @param string $ip
     * @return Connecte
     */
    
public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    
/**
     * Get ip
     *
     * @return string 
     */
    
public function getIp()
    {
        return $this->ip;
    }

    
/**
     * Set times
     *
     * @param integer $times
     * @return Connecte
     */
    
public function setTimes($times)
    {
        $this->times = $times;

        return $this;
    }

    
/**
     * Get times
     *
     * @return integer 
     */
    
public function getTimes()
    {
        return $this->times;
    }

}
