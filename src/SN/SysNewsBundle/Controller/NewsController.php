<?php
namespace SN\SysNewsBundle\Controller;
use SN\SysNewsBundle\Entity\Comment;
use SN\SysNewsBundle\Form\CommentType;
use SN\SysNewsBundle\Form\NewsType;
use SN\SysNewsBundle\Form\NewsEditType;
use SN\SysNewsBundle\Form\CommentEditType;
use SN\SysNewsBundle\Entity\News;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
class NewsController extends Controller
{
public function indexAction($page)
 {
   if ($page < 1)
    { 
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }
   $nbPerPage = 5;

    // On récupère notre objet Paginator

    $listNews = $this->getDoctrine()

      ->getManager()

      ->getRepository('SNSysNewsBundle:News')

      ->getNewss($page, $nbPerPage)

    ;

    // On calcule le nombre total de pages grâce au count($listNews) qui retourne le nombre total d'annonces

     $nbPages = ceil(count($listNews)/$nbPerPage);

    // On donne toutes les informations nécessaires à la vue

    return $this->render('SNSysNewsBundle:News:index.html.twig', array(

      'listNews' => $listNews,

      'nbPages'     => $nbPages,

      'page'        => $page

    ));
   
   
 }

public function viewAction ($id, Request $request, $page)
 {
   $limit = 5;
   $em = $this->getDoctrine()->getManager();
   $news = $this->getDoctrine()->getRepository('SNSysNewsBundle:News')->find($id);
   $comment = new Comment();
   if ($news===null)
    {
      throw $this->createNotFoundException("La news d'id ".$id." n'existe pas.");
    }
   
   $listComment = $em->getRepository('SNSysNewsBundle:Comment')->getComments($id, $page, $limit);
   foreach ($listComment as $comment)
     {
       
       $news->addComment($comment);} 
   
    $nbPages = ceil(count($listComment)/$limit);
   return $this->render('SNSysNewsBundle:News:view.html.twig', array(
     
      'news' => $news,
      'listComment' => $listComment,
      'nbPages' => $nbPages,
      'page' => $page
    ));
 }
public function addAction(Request $request)

  {
      if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {

      // Sinon on déclenche une exception « Accès interdit »

      throw new AccessDeniedException('AccÃ©s limitÃ© aux auteurs.');

    }
      $news = new News();
      $news->setUser($this->getUser());
      $form = $this->createForm(new NewsType(), $news);
    if ($form->handleRequest($request)->isValid()) {
      $em = $this->getDoctrine()->getManager();
      $em->persist($news);
      
      $em->flush();
      // Ici, on s'occupera de la création et de la gestion du formulaire

      $request->getSession()->getFlashBag()->add('notice', 'news bien enregistrÃ©e.');

      // Puis on redirige vers la page de visualisation de cettte annonce

      return $this->redirect($this->generateUrl('sn_sys_news_view', array('id' => $news->getId())));

    }

    

    return $this->render('SNSysNewsBundle:News:add.html.twig', array('form'=>$form->createView(),));

  }

  public function editAction($id, Request $request)

  {
    
      if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {

      // Sinon on déclenche une exception « Accès interdit »

      throw new AccessDeniedException('AccÃ©s limitÃ© aux auteurs.');

    }
   $em = $this->getDoctrine()->getManager();
   $news = $this->getDoctrine()->getRepository('SNSysNewsBundle:News')->find($id);
   if ($news===null)
    {
      throw $this->createNotFoundException("La news d'id ".$id." n'existe pas.");
    }
   
   $form = $this->createForm(new NewsEditType(), $news);

    if ($form->handleRequest($request)->isValid()) {

      // Inutile de persister ici, Doctrine connait déjà notre annonce

      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'News bien modifiÃ©e.');

      return $this->redirect($this->generateUrl('sn_sys_news_view', array('id' => $news->getId())));

    }

    return $this->render('SNSysNewsBundle:News:edit.html.twig', array(

      'form'   => $form->createView(),

      'news' => $news // Je passe également l'annonce à la vue si jamais elle veut l'afficher

    ));

    }
   
    
  public function deleteAction($id, Request $request )

  {
    if (!$this->get('security.context')->isGranted('ROLE_ADMIN')) {

      // Sinon on déclenche une exception « Accès interdit »

      throw new AccessDeniedException('AccÃ©s limitÃ© aux auteurs.');

    }
    $em = $this->getDoctrine()->getManager();
   $news = $this->getDoctrine()->getRepository('SNSysNewsBundle:News')->find($id);
   if ($news===null)
    {
      throw $this->createNotFoundException("La news d'id ".$id." n'existe pas.");
    }
   $form = $this->createFormBuilder()->getForm();

    if ($form->handleRequest($request)->isValid()) {

      $em->remove($news);

      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "Le news a bien Ã©tÃ© supprimÃ©e.");

      return $this->redirect($this->generateUrl('sn_sys_news_home'));

    }

    // Si la requête est en GET, on affiche une page de confirmation avant de supprimer

    return $this->render('SNSysNewsBundle:News:delete.html.twig', array(

      'news' => $news,

      'form'   => $form->createView()

    ));
   
}
/**

 * @ParamConverter("news", options={"mapping": {"news_id": "id"}})

 */
 public function addcommentAction(News $news,   Request $req)
  {
    if (!$this->get('security.context')->isGranted('ROLE_USER')) {

      // Sinon on déclenche une exception « Accès interdit »

      throw new AccessDeniedException('Tu doit etre connecter pour pouvoir mettre un commentaire.');

    }
    $com = new Comment();
    
    $em = $this->getDoctrine()->getManager();
    $news = $this->getDoctrine()->getRepository('SNSysNewsBundle:News')->find($news->getId());
       
    
     $news->addComment($com);
      
    
    $form = $this->createForm(new CommentType(), $com);    
    if ($form->handleRequest($req)->isValid())     
     {       
       
       
       $com->setNews($news);
       
       $com->setUser($this->getUser());
       
       
       
       $em->persist($com);       
       $em->flush();
       $req->getSession()->getFlashBag()->add('notice', 'commentaire bien enregistrÃ©e.');
       return $this->redirect($this->generateUrl('sn_sys_news_view', array( 'id' => $news->getId())));}
     return $this->render('SNSysNewsBundle:News:addcomment.html.twig', array(

      

      'form'   => $form->createView()

    ));
}
/**

* @ParamConverter("news", options={"mapping": {"news_id": "id"}}) 
* @ParamConverter("com", options={"mapping": {"comment_id": "id"}})
 */
public function editcommentAction( News $news, Comment $com, Request $request)
{
  
  $em = $this->getDoctrine()->getManager();
   
   if ($com===null)
    {
      throw $this->createNotFoundException("Le commentaire d'id ".$id." n'existe pas.");
    }
   
   $form = $this->createForm(new CommentEditType(), $com);

    if ($form->handleRequest($request)->isValid()) {

      // Inutile de persister ici, Doctrine connait déjà notre annonce

      $em->flush();

      $request->getSession()->getFlashBag()->add('notice', 'commentaire bien modifiÃ©e.');

      return $this->redirect($this->generateUrl('sn_sys_news_view', array('id' => $news->getId())));

    }

    return $this->render('SNSysNewsBundle:News:editcomment.html.twig', array(

      'form'   => $form->createView(),

      'com' => $com 
      
    ));

    }
/**

* @ParamConverter("news", options={"mapping": {"news_id": "id"}}) 
* @ParamConverter("com", options={"mapping": {"comment_id": "id"}})
 */
public function deletecommentAction(News $news, Comment $com, Request $request )

  {
    
    
    $em = $this->getDoctrine()->getManager();
   
   
   if ($news===null)
    {
      throw $this->createNotFoundException("La news d'id ".$id." n'existe pas.");
    }
   $form = $this->createFormBuilder()->getForm();

    if ($form->handleRequest($request)->isValid()) {
      
      
      $news->removeComment($com);
      
      $em->remove($com);
      
      $em->flush();

      $request->getSession()->getFlashBag()->add('info', "Le commentaire a bien Ã©tÃ© supprimÃ©e.");

      return $this->redirect($this->generateUrl('sn_sys_news_view', array('id' => $news->getId())));

    }

    // Si la requête est en GET, on affiche une page de confirmation avant de supprimer

    return $this->render('SNSysNewsBundle:News:deletecomment.html.twig', array(

      
       'news' => $news,
       
       'com' => $com,
      'form'   => $form->createView()

    ));
   
}


}
