<?php

namespace AdminBundle\Controller;

use AdminBundle\Service\Menu\SupportMenu;
use PageBundle\Entity\Page;
use PageBundle\Forms\PageForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class AdminController extends Controller
{
    const LOGGED = 'admin';

    public function loginAction(Request $request)
    {
        $login = $request->get('login');
        $pass = $request->get('pass');
        $isLogged = '';
        if ($login == 'admin' && $pass == 'admin') {
//            /** @var Session $session */
//            $session = $this->get('session');
//            $session->set('LOGGED','admin');
            return $this->redirectToRoute('admin_edit_news');
        }
        return $this->render('@Admin/auth/login.html.twig', []);
    }

    public function LogoutAction(Request $request)
    {
        return $this->redirectToRoute('admin_login');
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function AddNewsAction(Request $request)
    {
        /** @var SupportMenu $menu */
        $menu = $this->get('admin_menu');
        $menu->setCurrent($request->get('_route'));

        $page = new Page();
        $form = $this->createForm(PageForm::class, $page);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($page);
            $em->flush($page);
        }

        $templateParams = [
            'menu' => $menu->getMenu(),
            'form' => $form->createView(),
        ];

        return $this->render('@Admin/news_edit/add_news.html.twig', $templateParams);

    }


    /**
     * @param Request $request
     * @return Response
     */
    public function editNewsAction(Request $request)
    {
        // id news
        $id = (int)$request->get('id', false);
        $del = (int)$request->get('del',0);

        $em = $this->get('doctrine.orm.entity_manager');
        // Delete news by id
        if($del == 1){
            $page = $em->getRepository('PageBundle:Page')->find($id);
            $em->remove($page);
            $em->flush();
            return $this->redirectToRoute('admin_edit_news');
        }


        /** @var SupportMenu $menu */
        $menu = $this->get('admin_menu');
        $menu->setCurrent($request->get('_route'));


        $allNews = [];
        $templateParams = [];
        if ($id) {
            $page = $em->getRepository('PageBundle:Page')->find($id);
            $form = $this->createForm(PageForm::class, $page);
            $form->handleRequest($request);
            if ($form->isSubmitted()) {
                $em->persist($page);
                $em->flush($page);
            }
            $templateParams['form'] = $form->createView();
        } else {
            $allNews = $em->getRepository('PageBundle:Page')->findAll();
        }

        $templateParams['menu'] = $menu->getMenu();
        $templateParams['allNews'] = $allNews;
        $templateParams['id'] = $id;

        return $this->render('@Admin/news_edit/news_edit.html.twig', $templateParams);

    }
}
