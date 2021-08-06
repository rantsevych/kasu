<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract  class AbstractEntity {
    
   abstract public function getSumByWeight();
   abstract public function getSumPeredano();
   abstract public function getSumPodano();
   abstract public function getSumOjidaetsya();
}
