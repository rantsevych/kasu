<?php
/**
 * Created by PhpStorm.
 * User: RantsevychYV
 * Date: 27.03.2019
 * Time: 19:08
 */

namespace PageBundle\Controller;

use PageBundle\Forms\PageDeleteForm;
use PageBundle\Forms\PageForm;
use PageBundle\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class PageController extends Controller
{
    public function listAction(){
        $pageRepo = $this->getDoctrine()->getRepository('PageBundle:Page');
        $pages = $pageRepo->findAll();
        return $this->render('PageBundle:Page:list.html.twig',[
            'pages' => $pages
        ]);
    }

    public function viewAction($id){
        $pageRepo = $this->getDoctrine()->getRepository('PageBundle:Page');
        /** @var Page $page */
        $page = $pageRepo->find($id);
        if(!$page){
            throw $this->createNotFoundException('The page does not exist');
        }
        return $this->render('PageBundle:Page:view.html.twig',[
            'page' => $page
        ]);
    }

    public function addAction( Request $request ){
        
        // Вызываем сервис авторизации
//        $authService = $this->get('auth_service');
//        $result =  $authService->login($userName,$pass);

//        if(!$result){
//            $this->redirectToRoute('login',[]);
//        }
        $routerId = $request->get('_route');
        $menu =  $this->get('menu')->getMenu($routerId);
        
        $page = new Page();
        $form = $this->createForm(PageForm::class, $page );
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);
            $em->flush();
            return $this->redirectToRoute('page_list');
        }
        return $this->render('@Page/Page/add.html.twig', [
            'form' => $form->createView(),
            'menu'=> $menu
        ]);
    }

    public function editAction($id=0, Request $request){

//    $request = $this->get('request_stack')->getCurrentRequest();
        $routerId = $request->get('_route');
        $menu =  $this->get('menu')->getMenu($routerId,$id);

        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('PageBundle:Page');
        $page = $repo->find($id);
        if(!$page)
            return $this->redirectToRoute('page_list');

        $form = $this->createForm(PageForm::class, $page );
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($page);
            $em->flush();
            return $this->redirectToRoute('page_view', [ 'id' => $page->getId() ]);
        }
        return $this->render('@Page/Page/edit.html.twig', [
            'form' => $form->createView(),
            'menu'=> $menu
        ]);
    }

    public function removeAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('PageBundle:Page');
        $page = $repo->find($id);
        if(!$page)
            return $this->redirectToRoute('page_list');

        $form = $this->createForm(PageDeleteForm::class, null, [
            'delete_id' => $page->getId()
        ] );

        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->remove($page);
            $em->flush();

            return $this->redirectToRoute('page_list');
        }
        return $this->render('@Page/Page/delete.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
