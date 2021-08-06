<?php

namespace AppBundle\Services;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Routing\Router;


/**
 * Class StatisticService
 * @package AppBundle\Services
 */
class Menu 
{

    protected $entityManager;
    
    protected  $router;
    
    protected $menu = [];


    /**
     * ServiceManager constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager,Router $router)
    {
        $this->entityManager = $manager;
        $this->route = $router;
    }
    
    
    public function getMenu($routeId,$id=0){
       $this->menu = [
            'page_add'=>[
                'url'=>$this->route->generate('page_add',[]),
                'class'=>'',
                'title'=>'add page'
            ],
           'page_edit'=>[
               'url'=>$this->route->generate('page_edit',[]),
               'class'=>'',
               'title'=>'edit page'
           ],
//           'page_edit_item'=>[
//               'url'=>$this->route->generate('page_item_edit',['id'=>$id]),
//               'class'=>'',
//               'title'=>'edit Item page'
//           ]
        ];
        $this->setActiveMenu($routeId);
        return $this->menu;
    }
    
    private function setActiveMenu($routerId){
        try{
            $this->menu[$routerId]['class'] = 'active';
        }catch (\Exception $e){
            
        }
    } 
    
}