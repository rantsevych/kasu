<?php

namespace AdminBundle\EventListener;


use AdminBundle\Controller\AdminController;
use AdminBundle\Controller\AuthController;
use AdminBundle\Controller\SupportController;
use AdminBundle\Service\Auth\LoginService;
use AdminBundle\Service\Auth\Support;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\Routing\Router;

class AuthListener
{
    /** @var  Container */
    private $container;
    /** @var Session  */
    private $session;
    /** @var \Symfony\Bundle\FrameworkBundle\Routing\Router  */
    private  $router;

    public function __construct(Container $container)
    {
        /** @var Container container */
        $this->container = $container;
        /** @var Session session */
        $this->session = $this->container->get('session');
        /** @var Router router */
        $this->router = $this->container->get('router');

    }

    /**
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
//        $controller = $event->getController();
//        $url = null;
//        if (!is_array($controller)) {
//            return;
//        }
//
//        if($controller[0] instanceof AdminController && $controller[1] != 'LoginAction'){
//           $result =  $this->session->get(AdminController::LOGGED);
//            if($result !== 'admin'){
//                $url = $this->router->generate('admin_login',[]);
//            }
//        }
//        
//        
//        if(!empty($url)) {
//            $event->setController(
//                function () use ($url) {
//                    return new RedirectResponse($url);
//                }
//            );
//        }

    }
}