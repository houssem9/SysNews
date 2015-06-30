<?php
namespace SN\SysNewsBundle\Count;
use Symfony\Component\HttpFoundation\Response;
class CountHtml
{
  public function viewNbVisit( Response $rep, $nbvisit)
   {
     $content = $rep->getContent();
     $html = 'Nombre de visit actuel en ligne est :'.(int)$nbvisit;
     $contenu = preg_replace('#<h5>(.*?)</h5>#iU', '<h5>$1'.$html.'</h5>', $content, 1);
     $rep->setContent($contenu);
     return $rep;
   }
}