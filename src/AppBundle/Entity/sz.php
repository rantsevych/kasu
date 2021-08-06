<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * sz
 *
 * @ORM\Table(name="sz")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\szRepository")
 */
class sz
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id

     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SZ", type="date")
     */
    private $sZ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="SZTIME", type="time")
     */
    private $sZTIME;

    /**
     * @var string
     *
     * @ORM\Column(name="PISMENNO", type="string", length=255)
     */
    private $pISMENNO;

    /**
     * @var string
     *
     * @ORM\Column(name="DECLINNUMBER", type="string", length=255)
     */
    private $dECLINNUMBER;

    /**
     * @var string
     *
     * @ORM\Column(name="CAUSEGNUM", type="string", length=255)
     */
    private $cAUSEGNUM;

    /**
     * @var string
     *
     * @ORM\Column(name="REALNAME", type="string", length=255)
     */
    private $rEALNAME;

    /**
     * @var string
     *
     * @ORM\Column(name="STORONU", type="text")
     */
    private $sTORONU;


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
     * Set sZ
     *
     * @param \DateTime $sZ
     *
     * @return sz
     */
    public function setSZ($sZ)
    {
        $this->sZ = $sZ;

        return $this;
    }

    /**
     * Get sZ
     *
     * @return \DateTime
     */
    public function getSZ()
    {
        return $this->sZ;
    }

    /**
     * Set sZTIME
     *
     * @param \DateTime $sZTIME
     *
     * @return sz
     */
    public function setSZTIME($sZTIME)
    {
        $this->sZTIME = $sZTIME;

        return $this;
    }

    /**
     * Get sZTIME
     *
     * @return \DateTime
     */
    public function getSZTIME()
    {
        return $this->sZTIME;
    }

    /**
     * Set pISMENNO
     *
     * @param string $pISMENNO
     *
     * @return sz
     */
    public function setPISMENNO($pISMENNO)
    {
        $this->pISMENNO = $pISMENNO;

        return $this;
    }

    /**
     * Get pISMENNO
     *
     * @return string
     */
    public function getPISMENNO()
    {
        return $this->pISMENNO;
    }

    /**
     * Set dECLINNUMBER
     *
     * @param string $dECLINNUMBER
     *
     * @return sz
     */
    public function setDECLINNUMBER($dECLINNUMBER)
    {
        $this->dECLINNUMBER = $dECLINNUMBER;

        return $this;
    }

    /**
     * Get dECLINNUMBER
     *
     * @return string
     */
    public function getDECLINNUMBER()
    {
        return $this->dECLINNUMBER;
    }

    /**
     * Set cAUSEGNUM
     *
     * @param string $cAUSEGNUM
     *
     * @return sz
     */
    public function setCAUSEGNUM($cAUSEGNUM)
    {
        $this->cAUSEGNUM = $cAUSEGNUM;

        return $this;
    }

    /**
     * Get cAUSEGNUM
     *
     * @return string
     */
    public function getCAUSEGNUM()
    {
        return $this->cAUSEGNUM;
    }

    /**
     * Set rEALNAME
     *
     * @param string $rEALNAME
     *
     * @return sz
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
     * Set sTORONU
     *
     * @param string $sTORONU
     *
     * @return sz
     */
    public function setSTORONU($sTORONU)
    {
        $this->sTORONU = $sTORONU;

        return $this;
    }

    /**
     * Get sTORONU
     *
     * @return string
     */
    public function getSTORONU()
    {
        $data = explode('  ',$this->sTORONU);
        array_diff($data,['']);
        $result = '';
        foreach ($data as $row){
              if(strlen($row) > 4 ){
                  $result.=$row.'<br>';
              }
        }
        return $result;
    }
}

