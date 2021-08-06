<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * theEndDecision
 *
 * @ORM\Table(name="the_end_decision")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\theEndDecisionRepository")
 */
class theEndDecision extends AbstractEntity
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
     * @ORM\Column(name="ZVASU", type="integer")
     */
    private $zVASU;

    /**
     * @var int
     *
     * @ORM\Column(name="KAS", type="integer")
     */
    private $kAS;

    /**
     * @var int
     *
     * @ORM\Column(name="VASU_NOT_DECISION", type="integer")
     */
    private $vASUNOTDECISION;

    /**
     * @var int
     *
     * @ORM\Column(name="KAS_NOT_DECISION", type="integer")
     */
    private $kASNOTDECISION;


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
     * @return theEndDecision
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

//    /**
//     * Set uSERID
//     *
//     * @param integer $uSERID
//     *
//     * @return theEndDecision
//     */
//    public function setUSERID($uSERID)
//    {
//        $this->uSERID = $uSERID;
//
//        return $this;
//    }
//
//    /**
//     * Get uSERID
//     *
//     * @return int
//     */
//    public function getUSERID()
//    {
//        return $this->uSERID;
//    }

    /**
     * Set rEALNAME
     *
     * @param string $rEALNAME
     *
     * @return theEndDecision
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
     * Set zVASU
     *
     * @param integer $zVASU
     *
     * @return theEndDecision
     */
    public function setZVASU($zVASU)
    {
        $this->zVASU = $zVASU;

        return $this;
    }

    /**
     * Get zVASU
     *
     * @return int
     */
    public function getZVASU()
    {
        return $this->zVASU;
    }

    /**
     * Set kAS
     *
     * @param integer $kAS
     *
     * @return theEndDecision
     */
    public function setKAS($kAS)
    {
        $this->kAS = $kAS;

        return $this;
    }

    /**
     * Get kAS
     *
     * @return int
     */
    public function getKAS()
    {
        return $this->kAS;
    }

    /**
     * Set vASUNOTDECISION
     *
     * @param integer $vASUNOTDECISION
     *
     * @return theEndDecision
     */
    public function setVASUNOTDECISION($vASUNOTDECISION)
    {
        $this->vASUNOTDECISION = $vASUNOTDECISION;

        return $this;
    }

    /**
     * Get vASUNOTDECISION
     *
     * @return int
     */
    public function getVASUNOTDECISION()
    {
        return $this->vASUNOTDECISION;
    }

    /**
     * Set kASNOTDECISION
     *
     * @param integer $kASNOTDECISION
     *
     * @return theEndDecision
     */
    public function setKASNOTDECISION($kASNOTDECISION)
    {
        $this->kASNOTDECISION = $kASNOTDECISION;

        return $this;
    }

    /**
     * Get kASNOTDECISION
     *
     * @return int
     */
    public function getKASNOTDECISION()
    {
        return $this->kASNOTDECISION;
    }

    public function getSumKASNOTDECISION()
    {
        return $this->getKASNOTDECISION();
    }
    
    public function getSumByWeight(){
        return $this->getZVASU()+$this->getKAS();
    }

    public function getSumPeredano(){
        return $this->getZVASU();
    }

    public function getSumPodano(){
        return $this->getKAS();
    }

    public function getSumOjidaetsya()
    { return $this->getKASNOTDECISION();

    }

}

