<?php
namespace SN\SysNewsBundle\Beta;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
class BetaListener
{
  protected $betaHTML;

  // La date de fin de la version béta :
  // - Avant cette date, on affichera un compte à rebours (J-3 par exemple)
  // - Aprés cette date, on n'affichera plus le  beta 
  protected $endDate;

  public function __construct(BetaHTML $betaHTML, $endDate)
  {
    $this->betaHTML = $betaHTML;
    $this->endDate  = new \Datetime($endDate);
  }
  public function processBeta(FilterResponseEvent $event)
  {
    if (!$event->isMasterRequest()) {
      return;
    }

    $remainingDays = $this->endDate->diff(new \Datetime())->format('%d');

    // Si la date est depassée, on ne fait rien
    if ($remainingDays <= 0) {
      return;
    }

    // On utilise notre BetaHRML
    $response = $this->betaHTML->displayBeta($event->getResponse(), $remainingDays);
    // On met à jour la réponse avec la nouvelle valeur
    $event->setResponse($response);
  }
}
