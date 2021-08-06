<?php

namespace AdminBundle\Service\Menu;

use Symfony\Bundle\FrameworkBundle\Routing\Router;

class SupportMenu 
{
    
    const ADMIN_ADD_NEWS = 'admin_add_news';
    const ADMIN_LOGOUT = 'admin_logout';
    const  ADMIN_EDIT_NEWS = 'admin_edit_news';
    private $menu;
    private  $router;
    
    public function __construct(Router $router)
    {
        /** @var Router router */
        $this->router = $router;
        $this->setMenu();
    }

    public function setMenu()
    {
       $this->menu = [
           self::ADMIN_LOGOUT => [
               'title' => 'Logout',
               'link'  => $this->router->generate(self::ADMIN_LOGOUT),
               'class' => '',
           ],
           self::ADMIN_ADD_NEWS=> [
               'title' => 'Add news',
               'link'  => $this->router->generate(self::ADMIN_ADD_NEWS),
               'class' => '',
           ],
           self::ADMIN_EDIT_NEWS=> [
               'title' => 'Edit news',
               'link'  => $this->router->generate(self::ADMIN_EDIT_NEWS),
               'class' => '',
           ]
       ];
    }

   public  function  setCurrent($menuKey){
       if(!empty($menuKey)&& array_key_exists($menuKey,$this->menu)){
           $this->menu[$menuKey]['class'].= ' '. 'active';
       }
   }
    
    
    public function getMenu()
    {
        return $this->menu;
    }
}