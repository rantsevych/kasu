<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CauseAssign;
use AppBundle\Entity\theEndDecision;
use AppBundle\Services\StatisticService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function getContentAction(Request $request){
        if ($request->isXmlHttpRequest()){
            /** @var StatisticService $statService */
            $statService = $this->get('statistic_service');
            
            $type = $request->get('type',null);

            $templateParams = [];
            $content = '';


            switch ($type){
                case 0:
                    $templateParams = [
                     'totalSum_sud' => $statService->getTotalSum($statService->getListOne()),
                      'ojidaetsya' => $statService->getOjidaetsya($statService->getListTwo()),
                      'totalSum_sud_2' => $statService->getTotalSum($statService->getListTwo()),
                      'totalSum_p1' => $statService->getTotalSum($statService->getPalataByID(1)),
                      'totalSum_p1_2' => $statService->getTotalSum($statService->getPalataByID2(1)),
                      'totalSum_p2' => $statService->getTotalSum($statService->getPalataByID(2)),
                      'totalSum_p2_2' => $statService->getTotalSum($statService->getPalataByID2(2)),
                      'totalSum_p3' => $statService->getTotalSum($statService->getPalataByID(3)),
                      'totalSum_p3_2' => $statService->getTotalSum($statService->getPalataByID2(3)),
                      'ojidaetsya_p1' => $statService->getOjidaetsya($statService->getPalataByID2(1)),
                      'ojidaetsya_p2' => $statService->getOjidaetsya($statService->getPalataByID2(2)),
                      'ojidaetsya_p3' => $statService->getOjidaetsya($statService->getPalataByID2(3)),
                    ];
                    $content = $this->renderView('ajax/sud.html.twig',$templateParams);
                    break;
                case 1:
                    $templateParams = [
                        'title'=> 'Судова палата з розгляду справ щодо податків, зборів та інших обов’язкових платежів',
                        'totalSum' => $statService->getTotalSum($statService->getPalataByID(1)),
                        'totalSum_roz_p1' => $statService->getTotalSum($statService->getPalataByID2(1)),
                        'totalSum_ojidaetsya' => $statService->getOjidaetsya($statService->getPalataByID2(1)),
                        'type'=>$type,
                        'judgeList'  => $statService->mergeJudgeList($statService->getPalataByID(1),$statService->getPalataByID2(1)),
                    ];
                    $content = $this->renderView('ajax/palata_1.html.twig',$templateParams);
                    break;

                case 2:
                    $templateParams = [
                        'title'=> 'Судова палата з розгляду справ щодо захисту соціальних прав',
                        'totalSum' => $statService->getTotalSum($statService->getPalataByID(2)),
                        'totalSum_roz_p1' => $statService->getTotalSum($statService->getPalataByID2(2)),
                        'totalSum_ojidaetsya' => $statService->getOjidaetsya($statService->getPalataByID2(2)),
                        'type'=>$type,
                        'judgeList'  => $statService->mergeJudgeList($statService->getPalataByID(2),$statService->getPalataByID2(2)),
                    ];
                    $content = $this->renderView('ajax/palata_1.html.twig',$templateParams);
                    break;
                case 3:
                    $templateParams = [
                        'title'=> 'Судова палата з розгляду справ щодо виборчого процесу та референдуму, а також захисту політичних прав громадян',
                        'totalSum' => $statService->getTotalSum($statService->getPalataByID(3)),
                        'totalSum_roz_p1' => $statService->getTotalSum($statService->getPalataByID2(3)),
                        'totalSum_ojidaetsya' => $statService->getOjidaetsya($statService->getPalataByID2(3)),
                        'type'=>$type,
                        'judgeList'  => $statService->mergeJudgeList($statService->getPalataByID(3),$statService->getPalataByID2(3)),
                    ];
                    $content = $this->renderView('ajax/palata_1.html.twig',$templateParams);
                    break;
            }

            $result = json_encode(
                [
                    'content' => $content,
                ]
            );

            $response = new Response();
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent($result);
            return $response;
        }
    }

    
}
