<?php
namespace SN\SysNewsBundle\Count;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use SN\SysNewsBundle\Entity\Connecte;
use Symfony\Bundle\DoctrineBundle\Registry;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CountListener
{
  protected $counthtml;
  protected $doctrine;
  
  public function __construct(ContainerInterface $container, CountHtml $counthtml, EntityManager $doctrine)
  {
    $this->counthtml = $counthtml;
    $this->doctrine = $doctrine;
    $this->container = $container;
   }
    public function processCount(FilterResponseEvent $event)

  {

    if (!$event->isMasterRequest()) {

      return;

    }
  $connecte = new Connecte();
  $ip = $this->container->get('request')->getClientIp();
  $times = time();
  $doctrine = $this->container->get('doctrine.orm.entity_manager');
  $listIp = $this->doctrine->getRepository('SNSysNewsBundle:Connecte')->findAll();
  if(!in_array($ip, $listIp))
   {
     $connecte->setIp($ip);
     $connecte->setTimes($times);
     $doctrine->persist($connecte);
     $doctrine->flush();
    }
   else
    {
      $times = time();
      $connecte->setTimes($times);
      $doctrine->persist($connecte);
      $doctrine->flush();
    }
   $time_5 = time()-(60*5);
   if ($times < $time_5)
   {
     $connecte = $this->doctrine->getRepository('SNSysNewsBundle:Connecte')->findOneByTimes($times);
     $doctrine->remove($connecte);
     $doctrine->flush();
   }
  $nbvisit = $doctrine->getRepository('SNSysNewsBundle:Connecte')->getcountnumbervisit();
  $rep = $this->counthtml->viewNbVisit($event->getResponse(), $nbvisit);
  $event->setResponse($rep);
}}  
   