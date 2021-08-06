<?php

namespace AppBundle\Services;

use AppBundle\Entity\CauseAssign;
use AppBundle\Entity\Dbase;
use AppBundle\Entity\sz;
use AppBundle\Entity\SzAll;
use AppBundle\Entity\theEndDecision;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Class StatisticService
 * @package AppBundle\Services
 */
class StatisticService
{
    protected $entityManager;

    /**
     * ServiceManager constructor.
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->entityManager = $manager;
    }
    
    public function getListOne(){
       $list = $this->entityManager->getRepository('AppBundle:CauseAssign')->findAll();
       return $list;
    }

    public function getListTwo(){
        $list2 = $this->entityManager->getRepository('AppBundle:theEndDecision')->findAll();
        return $list2;
    }

    public function getListThree(){
        $list3 = $this->entityManager->getRepository('AppBundle:sz')->findAll();
        return $list3;
    }



    public function getMaxMinDate(array $list){
        $max = 0;
        $min = 0;
        /* @var sz $item */
        foreach ($list as $item){
        $min = $item->getSZ()->getTimestamp();
        $max = $item->getSZ()->getTimestamp();
        $timeStamp = $item->getSZ()->getTimestamp();
        if($timeStamp <= $min){
        $min = $item->getSZ()->format('d.m.Y');
        }
        if($timeStamp >= $max){
        $max = $item->getSZ()->format('d.m.Y');
        }
        }
        return ['max'=>$max,'min'=>$min];
   }

    /**
     * @param $list
     * @return int
     */
    public  function getTotalSum($list){
        $total = 0;
        /** @var CauseAssign $item */
        foreach ($list as $item){
            $total+= $item->getSumByWeight();
        }
        return $total;
    }

    
    public function getPodano($list){
        $total = 0;
        /** @var CauseAssign $item */
        foreach ($list as $item){
            $total+= $item->getSumPodano();
        }
         return $total;
    }

    public function getOjidaetsya($list){
        $total = 0;
        /** @var CauseAssign $item */
        foreach ($list as $item){
            $total+= $item->getSumOjidaetsya();
        }
        return $total;
    }

    public function getPeredano($list){
        $total = 0;
        /** @var CauseAssign $item */
        foreach ($list as $item){
            $total+= $item->getSumPeredano();
        }
        return $total;

    }

    public function getPalataByID($id){

        $name = [];

        switch ($id){
            case 1:
                $name = 'Перша судова палата';
                break;
            case  2:
                $name = 'Друга судова палата';
                break;
            case  3:
                $name = 'Третя судова палата';
                break;
        }

       return $this->entityManager->getRepository('AppBundle:CauseAssign')->findBy(['nAME'=>$name]);
    }


    public function getPalataByID2($id){

        $name = [];

        switch ($id){
            case 1:
                $name = 'Перша судова палата';
                break;
            case  2:
                $name = 'Друга судова палата';
                break;
            case  3:
                $name = 'Третя судова палата';
                break;
        }

        return $this->entityManager->getRepository('AppBundle:theEndDecision')->findBy(['nAME'=>$name]);
    }


    /**
     *   (8/80)*100
     * @param $arg1
     * @param $arg2
     * @return float|int
     */
   public function getProcent($arg1,$arg2){
       
       if($arg2 == 0) return 0;
       
       $num = ($arg1/$arg2)*100;
       $procent = round($num, 1);
       return $procent;
   }

    /**
     * @desc Слияние массиво 2-х сушностей
     * @param array $list / CauseAssign
     * @param array $list2 / theEndDecision
     * @return array
     */
    public function mergeJudgeList(array $list,array $list2){
        $mergedList = [];
        /** @var CauseAssign $row */
        foreach ($list as $row){
            $judjeId = $row->getId();
            /** @var theEndDecision $row2 */
            foreach ($list2 as $row2){
                $judjeId2 = $row2->getId();
                if($judjeId == $judjeId2){
                    $mergedList[$judjeId]['sum_row_1'] = $row;
                    $mergedList[$judjeId]['sum_row_2'] = $row2;
                    $mergedList[$judjeId]['sum_row_3'] = $row->getSumByWeight() - $row2->getSumByWeight();
                    $mergedList[$judjeId]['sum_row_4'] = $row2->getKASNOTDECISION();
                }
            }
        }

        return $mergedList;
    }

    /**@desc get current date in format d.m.Y
     * @return string
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getDate(){
     $sql = 'SELECT * FROM dbase';
     $resultData = $this->entityManager->getConnection()->query($sql)->fetchAll();
     $date = new \DateTime(date($resultData[0]['DATEBASE']));
     $date->modify('-1 day');
     return $date->format('d.m.Y');
    }

    
    public  function getDataForRozklad(){
      $result = $this->entityManager->getRepository('AppBundle:CauseAssign')->findAll();
      $result = $this->sortDataForRozklad($result);
     // var_dump($result);
      return $result;
    }

   private function  sortDataForRozklad(array $data){
        $fillter = [1008954,1008972,1009340,1008958];
        $sorderData = [];
        foreach ($data as $row){
            if($row instanceof CauseAssign){
                /** @var CauseAssign $object2 */
                $object2 = $row;
                if(!in_array($object2->getId(), $fillter)){
                    $sorderData[$object2->getId()]['cause'] = $object2;
                }
            }

        }
        return $sorderData;
    }


    /**@desc Сортировка по дате (пузырьком)
     * @param $data
     * @return array
     */
    public function sortJudgesByDate($data){
        $data = array_values($data);
        $date = null;
        // Подготовки масива к сортировке
        $data = $this->cutOff($data);
        
        for($i=0;$i<count($data);$i++){
            for($j=$i+1;$j<count($data);$j++){

               /** @var SzAll $sz1 */
               $sz1 = $data[$i]['szall'];
               /** @var SzAll $sz2 */
               $sz2 = $data[$j]['szall'];

               if($sz1->getTimestamFromString() > $sz2->getTimestamFromString()){
                   $temp = $data[$j];
                   $data[$j] = $data[$i];
                   $data[$i] = $temp;
               }

            }

        }
        return $data;
    }

    /**@desc Вырезаем лишний массив, для сортировки
     * @param $arr
     * @return array
     */
    public function cutOff($arr){
       $data = [];
        $count = 0;
        foreach ($arr as $row){
           foreach ($row as $item){
               $data[$count]['szall'] = $item['szall'];
               $data[$count]['reletedJ'] = $item['reletedJ'];
               $count++;
           }
       }
        return $data;
    }

}