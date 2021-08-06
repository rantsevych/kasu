<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CauseAssign
 *
 * @ORM\Table(name="cause_assign")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CauseAssignRepository")
 */
class CauseAssign extends AbstractEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="USERID", type="integer")
     * @ORM\Id
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="NAME", type="string", length=50)
     */
    private $nAME;

//    /**
//     * @var int
//     *
//     * @ORM\Column(name="USERID", type="integer")
//     */
//    private $uSERID;

    /**
     * @var string
     *
     * @ORM\Column(name="REALNAME", type="string", length=63)
     */
    private $rEALNAME;

    /**
     * @var int
     *
     * @ORM\Column(name="ZPSVASU", type="integer")
     */
    private $zPSVASU;


    /**
     * @var int
     *
     * @ORM\Column(name="AVASU", type="integer")
     */
    private $aVASU;

    /**
     * @var int
     *
     * @ORM\Column(name="ZNVASU", type="integer")
     */
    private $zNVASU;

    /**
     * @var int
     *
     * @ORM\Column(name="ZIVASU", type="integer")
     */
    private $zIVASU;

    /**
     * @var int
     *
     * @ORM\Column(name="PVASU", type="integer")
     */
    private $pVASU;

    /**
     * @var int
     *
     * @ORM\Column(name="KVASU", type="integer")
     */
    private $kVASU;

    /**
     * @var int
     *
     * @ORM\Column(name="ZPS", type="integer")
     */
    private $zPS;

    /**
     * @var int
     *
     * @ORM\Column(name="A", type="integer")
     */
    private $a;

    /**
     * @var int
     *
     * @ORM\Column(name="ZN", type="integer")
     */
    private $zN;

    /**
     * @var int
     *
     * @ORM\Column(name="ZI", type="integer")
     */
    private $zI;

    /**
     * @var int
     *
     * @ORM\Column(name="PZ", type="integer")
     */
    private $pZ;

    /**
     * @var int
     *
     * @ORM\Column(name="P", type="integer")
     */
    private $p;

    /**
     * @var int
     *
     * @ORM\Column(name="K", type="integer")
     */
    private $k;

    /**
     * @var int
     *
     * @ORM\Column(name="ZP", type="integer")
     */
    private $zP;

    /**
     * @var int
     *
     * @ORM\Column(name="ZV", type="integer")
     */
    private $zV;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nAME
     *
     * @param string $nAME
     *
     * @return CauseAssign
     */
    public function setNAME($nAME)
    {
        $this->nAME = $nAME;

        return $this;
    }

    /**
     * Get nAME
     *
     * @return string
     */
    public function getNAME()
    {
        return $this->nAME;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set rEALNAME
     *
     * @param string $rEALNAME
     *
     * @return CauseAssign
     */
    public function setREALNAME($rEALNAME)
    {
        $this->rEALNAME = $rEALNAME;

        return $this;
    }

    /**
     * Get rEALNAME
     *
     * @return string
     */
    public function getREALNAME()
    {
        return $this->rEALNAME;
    }

    /**
     * Set zPSVASU
     *
     * @param integer $zPSVASU
     *
     * @return CauseAssign
     */
    public function setZPSVASU($zPSVASU)
    {
        $this->zPSVASU = $zPSVASU;

        return $this;
    }

    /**
     * Get zPSVASU
     *
     * @return int
     */
    public function getZPSVASU()
    {
        return $this->zPSVASU;
    }


    /**
     * Set aVASU
     *
     * @param integer $aVASU
     *
     * @return CauseAssign
     */
    public function setAVASU($aVASU)
    {
        $this->aVASU = $aVASU;

        return $this;
    }

    /**
     * Get aVASU
     *
     * @return int
     */
    public function getAVASU()
    {
        return $this->aVASU;
    }

    /**
     * Set zNVASU
     *
     * @param integer $zNVASU
     *
     * @return CauseAssign
     */
    public function setZNVASU($zNVASU)
    {
        $this->zNVASU = $zNVASU;

        return $this;
    }

    /**
     * Get zNVASU
     *
     * @return int
     */
    public function getZNVASU()
    {
        return $this->zNVASU;
    }

    /**
     * Set zIVASU
     *
     * @param integer $zIVASU
     *
     * @return CauseAssign
     */
    public function setZIVASU($zIVASU)
    {
        $this->zIVASU = $zIVASU;

        return $this;
    }

    /**
     * Get zIVASU
     *
     * @return int
     */
    public function getZIVASU()
    {
        return $this->zIVASU;
    }

    /**
     * Set pVASU
     *
     * @param integer $pVASU
     *
     * @return CauseAssign
     */
    public function setPVASU($pVASU)
    {
        $this->pVASU = $pVASU;

        return $this;
    }

    /**
     * Get pVASU
     *
     * @return int
     */
    public function getPVASU()
    {
        return $this->pVASU;
    }

    /**
     * Set kVASU
     *
     * @param integer $kVASU
     *
     * @return CauseAssign
     */
    public function setKVASU($kVASU)
    {
        $this->kVASU = $kVASU;

        return $this;
    }

    /**
     * Get kVASU
     *
     * @return int
     */
    public function getKVASU()
    {
        return $this->kVASU;
    }

    /**
     * Set zPS
     *
     * @param integer $zPS
     *
     * @return CauseAssign
     */
    public function setZPS($zPS)
    {
        $this->zPS = $zPS;

        return $this;
    }

    /**
     * Get zPS
     *
     * @return int
     */
    public function getZPS()
    {
        return $this->zPS;
    }

    /**
     * Set a
     *
     * @param integer $a
     *
     * @return CauseAssign
     */
    public function setA($a)
    {
        $this->a = $a;

        return $this;
    }

    /**
     * Get a
     *
     * @return int
     */
    public function getA()
    {
        return $this->a;
    }

    /**
     * Set zN
     *
     * @param integer $zN
     *
     * @return CauseAssign
     */
    public function setZN($zN)
    {
        $this->zN = $zN;

        return $this;
    }

    /**
     * Get zN
     *
     * @return int
     */
    public function getZN()
    {
        return $this->zN;
    }

    /**
     * Set zI
     *
     * @param integer $zI
     *
     * @return CauseAssign
     */
    public function setZI($zI)
    {
        $this->zI = $zI;

        return $this;
    }

    /**
     * Get zI
     *
     * @return int
     */
    public function getZI()
    {
        return $this->zI;
    }

    /**
     * Set pZ
     *
     * @param integer $pZ
     *
     * @return CauseAssign
     */
    public function setPZ($pZ)
    {
        $this->pZ = $pZ;

        return $this;
    }

    /**
     * Get pZ
     *
     * @return int
     */
    public function getPZ()
    {
        return $this->pZ;
    }

    /**
     * Set p
     *
     * @param integer $p
     *
     * @return CauseAssign
     */
    public function setP($p)
    {
        $this->p = $p;

        return $this;
    }

    /**
     * Get p
     *
     * @return int
     */
    public function getP()
    {
        return $this->p;
    }

    /**
     * Set k
     *
     * @param integer $k
     *
     * @return CauseAssign
     */
    public function setK($k)
    {
        $this->k = $k;

        return $this;
    }

    /**
     * Get k
     *
     * @return int
     */
    public function getK()
    {
        return $this->k;
    }

    /**
     * Set zP
     *
     * @param integer $zP
     *
     * @return CauseAssign
     */
    public function setZP($zP)
    {
        $this->zP = $zP;

        return $this;
    }

    /**
     * Get zP
     *
     * @return int
     */
    public function getZP()
    {
        return $this->zP;
    }

    /**
     * Set zV
     *
     * @param integer $zV
     *
     * @return CauseAssign
     */
    public function setZV($zV)
    {
        $this->zV = $zV;

        return $this;
    }

    /**
     * Get zV
     *
     * @return int
     */
    public function getZV()
    {
        return $this->zV;
    }

    public function getSumByWeight()
    {
        return $this->getZPSVASU() + $this->getAVASU() + $this->getZNVASU() + $this->getPVASU() + $this->getKVASU() + $this->getZPS() + $this->getA() + $this->getZN() + $this->getPZ() + $this->getP() + $this->getK() + $this->getZP() + $this->getZV();
    }

    public function getSumPeredano()
    {
        return $this->getZPSVASU() + $this->getAVASU() + $this->getZNVASU() + $this->getPVASU() + $this->getKVASU();
    }

    public function getSumPodano()
    {
        return $this->getZPS() + $this->getA() + $this->getZN() + $this->getPZ() + $this->getP() + $this->getK() + $this->getZP() + $this->getZV();
    }

    public function getSumOjidaetsya()
    {

    }

    /**
     * @return int
     */
    public function getPalataStringNameToInt()
    {
        switch ($this->nAME) {
            case 'Перша судова палата';
                return 1;
                break;
            case 'Друга судова палата';
                return 2;
                break;
            case 'Третя судова палата';
                return 3;
                break;
        }
    }

}

