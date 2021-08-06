<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CauseAssign;
use AppBundle\Entity\SzAll;
use AppBundle\Services\StatisticService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        /** @var StatisticService $statService */
        $statService = $this->get('statistic_service');
        $podano2 = $statService->getPodano($statService->getListTwo());
        $podano = $statService->getPodano($statService->getListOne());
        $totalSum2 = $statService->getTotalSum($statService->getListTwo());
        $totalSum = $statService->getTotalSum($statService->getListOne());
        $peredano = $statService->getPeredano($statService->getListOne());
        $peredano2 = $statService->getPeredano($statService->getListTwo());
        $templateParams = [
            'list' => $statService->getListOne(),
            'totalSum' => $statService->getTotalSum($statService->getListOne()),
            'totalSum2' => $statService->getTotalSum($statService->getListTwo()),
            'podano' => $statService->getPodano($statService->getListOne()),
            'peredano' => $statService->getPeredano($statService->getListOne()),
            'podano2' => $statService->getPodano($statService->getListTwo()),
            'peredano2' => $statService->getPeredano($statService->getListTwo()),
            'currentTime' => $statService->getDate(),
            'procent_podano1' => $statService->getProcent($statService->getPodano($statService->getListOne()), $statService->getTotalSum($statService->getListOne())),
            'procent_peredano1' => $statService->getProcent($statService->getPeredano($statService->getListOne()), $statService->getTotalSum($statService->getListOne())),
            'procent_podano2' => $statService->getProcent($statService->getPodano($statService->getListTwo()), $statService->getTotalSum($statService->getListTwo())),
            'procent_peredano2' => $statService->getProcent($statService->getPeredano($statService->getListTwo()), $statService->getTotalSum($statService->getListTwo())),
            'procent_podano3' => $statService->getProcent(($podano - $podano2), ($totalSum - $totalSum2)),
            'procent_peredano3' => $statService->getProcent(($peredano - $peredano2), ($totalSum - $totalSum2)),
        ];

        return $this->render('base.html.twig', $templateParams);
    }


    public function zmistAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/zmist.html.twig', $templateParams);
    }

    public function nadhodzeniaAction(Request $request)
    {

        /** @var StatisticService $statService */
        $statService = $this->get('statistic_service');

        $templateParams = [
            'currentTime' => $statService->getDate(),
            'totalSum' => $statService->getTotalSum($statService->getPalataByID(1)),
            'totalSum2' => $statService->getTotalSum($statService->getPalataByID(2)),
            'totalSum3' => $statService->getTotalSum($statService->getPalataByID(3)),
        ];
        return $this->render('default/nadhodzenia.html.twig', $templateParams);
    }

    public function dorozglyaduAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
            'dorozglyadu' => $statService->getListThree(),
            'dateMaxMin' => $statService->getMaxMinDate($statService->getListThree()),
            'total' => count($statService->getListThree()),
        ];
        return $this->render('default/dorozglyadu.html.twig', $templateParams);
    }

    public function rozkladAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
            'allPalats' => $statService->getDataForRozklad(),

        ];
        return $this->render('default/rozklad.htm.twig', $templateParams);
    }


    public function calendarAction(Request $request, $id)
    {

        $sort = $request->get('sort',0);

        $judje = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->findOneBy(['iDSUDDOCL'=>$id]);
        $szallData = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeOccasionsById($id,false,$sort);
        $sorted = [];
        $error = false;
        if (!$szallData) {
            $error = 'Не призначалися справи до розгляду';

        } else {
            /** @var SzAll $szall */
            foreach ($szallData as $key => $szall) {
                $sorted[$key]['szall'] = $szall;
                $sorted[$key]['reletedJ'] = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeReportedById($id, $szall->getDECLINNUMBER(),false);
            }
          //  var_dump($sorted);
        }
        
        //****************************
        $szallData2 = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeOccasionsById($id,true,$sort);
        $sorted2 = [];
        $error2 = false;
        if (!$szallData2) {
            $error2 = ' Нема судових засідань';
        } else {
            /** @var SzAll $szall */
            foreach ($szallData2 as $key => $szall) {
                $sorted2[$key]['szall'] = $szall;
                $sorted2[$key]['reletedJ'] = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeReportedById($id, $szall->getDECLINNUMBER(),true);
            }
            //  var_dump($sorted);
        }

        $templateParams = [
            'sortedCount'=>count($sorted),
            'sortedCount2'=>count($sorted2),
            'judjeMemberCount'=>count($this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeMemberById($id,false,$sort)),
            'judjeMemberCount2'=>count($this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeMemberById($id,true,$sort)),
            'sorted' => $sorted,
            'sorted2' => $sorted2,
            'error' => $error,
            'judje'=>$judje,
            'judjeMember'=>$this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeMemberById($id,false,$sort),
            'judjeMember2'=>$this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeMemberById($id,true,$sort),
        ];

        return $this->render('default/calendar.htm.twig', $templateParams);
    }
    
    

    public function allcalendarAction(Request $request, $id)
    {
        $palata = '';
        switch ($id){
            case 1:
                $palata = 'Перша судова палата';
                break;
            case 2:
                $palata = 'Друга судова палата';
                break;
            case 3:
                $palata = 'Третя судова палата';
                break;
        }


        $judejesData = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeDataSortById($id);
        $judjesInPalata = $this->get('doctrine.orm.entity_manager')->getRepository('AppBundle:CauseAssign')->findBy(['nAME'=>$palata]);
        $result = [];
        $sorted = [];
        /** @var CauseAssign $row */
        foreach ($judjesInPalata as $key=>$row){
            $id = $row->getId();
            $szallData = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeOccasionsById($id,false);

            /** @var SzAll $szall */
            foreach ($szallData as $key2 => $szall) {
                $sorted[$key][$key2]['szall'] = $szall;
                $sorted[$key][$key2]['reletedJ'] = $this->get('doctrine.orm.default_entity_manager')->getRepository('AppBundle:SzAll')->getJudgeReportedById($id, $szall->getDECLINNUMBER());
            }


        }


        /** @var StatisticService $statService */
        $statService = $this->get('statistic_service');
        $sorted = $statService->sortJudgesByDate($sorted);

        return $this->render('default/allcalendar.htm.twig', ['sorted'=>$sorted, 'judejesData'=>$judejesData]);
    }

    public function onlinedocAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/onlinedoc.html.twig', $templateParams);
    }

    public function pokaznikiAction(Request $request)
{
    $statService = $this->get('statistic_service');
    $templateParams = [
        'currentTime' => $statService->getDate(),
    ];
    return $this->render('default/pokazniki.html.twig', $templateParams);
}
    public function court_adressAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/court_adress.html.twig', $templateParams);
    }

    public function ideasAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/ideas.html.twig', $templateParams);
    }

    public function instrukciyaAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/instrukciya.html.twig', $templateParams);
    }

    public function linkAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/link.html.twig', $templateParams);
    }

    public function adressAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/adress.html.twig', $templateParams);
    }

    public function employeeAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/employee.html.twig', $templateParams);
    }

    public function calendar_infoAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/calendar_info.html.twig', $templateParams);
    }
	public function zahodyAction(Request $request)
    {
        $statService = $this->get('statistic_service');
        $templateParams = [
            'currentTime' => $statService->getDate(),
        ];
        return $this->render('default/zahody.html.twig', $templateParams);
    }
}



