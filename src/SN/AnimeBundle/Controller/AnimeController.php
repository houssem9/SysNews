<?php
namespace SN\AnimeBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use SN\AnimeBundle\Entity\Anime;
use SN\AnimeBundle\Form\AnimeType;
use SN\AnimeBundle\Form\AnimeEditType;
use SN\AnimeBundle\Entity\Genres;
use SN\AnimeBundle\Entity\Imageanime;
class AnimeController extends Controller
{
  public function indexAction($page)
   {
     $nbPerPage = 5;
     $listanime = $this->getDoctrine()->getManager()->getRepository('SNAnimeBundle:Anime')->getAnimes($page, $nbPerPage);
     if ($page < 1) {
      
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
   $nbPages = ceil(count($listanime)/$nbPerPage);
     return $this->render('SNAnimeBundle:Anime:index.html.twig', array( 'listanime' => $listanime, 'nbPages' => $nbPages, 'page' => $page));
   }
  public function viewAction($id)
  {
     $em = $this->getDoctrine()->getManager();
   $anime = $this->getDoctrine()->getRepository('SNAnimeBundle:Anime')->find($id);
   
   if ($anime===null)
    {
      throw $this->createNotFoundException("La news d'id ".$id." n'existe pas.");
    }
  foreach($anime->getGenres() as $genres)
    {
      $anime->addGenre($genres);}
   return $this->render('SNAnimeBundle:Anime:view.html.twig', array(
      'anime' => $anime
      
      ));
  }
public function addAction(Request $request)
  {
    $anime = new Anime();
    $form = $this->get('form.factory')->create(new AnimeType(), $anime);
    if ($form->handleRequest($request)->isValid()) {
     
      $em = $this->getDoctrine()->getManager();
      $em->persist($anime);
      $em->flush();
      $request->getSession()->getFlashBag()->add('notice', 'Anime bien enregistrée.');

      
      return $this->redirect($this->generateUrl('sn_anime_view', array('id' => $anime->getId())));
    }

    
    return $this->render('SNAnimeBundle:Anime:add.html.twig', array('form' => $form->createView()));
  }

  public function editAction($id, Request $request)
  {
    $em = $this->getDoctrine()->getManager();
    $anime = $em->getRepository('SNAnimeBundle:Anime')->find($id);
    if ($anime===null)
    {
      throw $this->createNotFoundException("L'anime d'id ".$id." n'existe pas.");
    }
    $form = $this->createForm(new AnimeEditType(), $anime);
    if ($form->handleRequest($request)->isValid()) {
      $em->flush();
      $request->getSession()->getFlashBag()->add('notice', 'Anime bien modifiée.');

      return $this->redirect($this->generateUrl('sn_anime_view', array('id' => $anime->getId())));
    }

    return $this->render('SNAnimeBundle:Anime:edit.html.twig', array('form' => $form->createView(), 'anime' => $anime));
  }

  public function deleteAction($id)
  {
    

    return $this->render('AnimeBundle:Anime:delete.html.twig');
  }
}