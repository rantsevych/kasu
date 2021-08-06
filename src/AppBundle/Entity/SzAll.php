<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SzAll
 *
 * @ORM\Table(name="szall")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SzAllRepository")
 */
class SzAll
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \string
     *
     * @ORM\Column(name="SZ", type="string", length=255)
    
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
     * @ORM\Column(name="PISMOVO", type="string", length=255)
     */
    private $pISMOVO;

    /**
     * @var string
     *
     * @ORM\Column(name="DATEPOPERED", type="string", length=255)
     */
    private $dATEPOPERED;

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
     * @ORM\Column(name="SUDDOCL", type="string", length=255)
     */
    private $sUDDOCL;

    /**
     * @var int
     *
     * @ORM\Column(name="IDSUDDOCL", type="integer")
     */
    private $iDSUDDOCL;

    /**
     * @var string
     *
     * @ORM\Column(name="STORONU", type="text")
     */
    private $sTORONU;

    /**
     * @var string
     *
     * @ORM\Column(name="SUDKOL", type="string", length=255)
     */
    private $sUDKOL;

    /**
     * @var int
     *
     * @ORM\Column(name="IDSUDKOL", type="integer")
     */
    private $iDSUDKOL;


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
     * @return SzAll
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
     * @return SzAll
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

    public function getSZTIMEToString()
    {
        return $this->sZTIME->format('H:i');
    }

    /**
     * Set pISMOVO
     *
     * @param string $pISMOVO
     *
     * @return SzAll
     */
    public function setPISMOVO($pISMOVO)
    {
        $this->pISMOVO = $pISMOVO;

        return $this;
    }

    /**
     * Get pISMOVO
     *
     * @return string
     */
    public function getPISMOVO()
    {
        return $this->pISMOVO;
    }

    /**
     * Set dATEPOPERED
     *
     * @param string $dATEPOPERED
     *
     * @return SzAll
     */
    public function setDATEPOPERED($dATEPOPERED)
    {
        $this->dATEPOPERED = $dATEPOPERED;

        return $this;
    }

    /**
     * Get dATEPOPERED
     *
     * @return string
     */
    public function getDATEPOPERED()
    {
        return $this->dATEPOPERED;
    }

    /**
     * Set dECLINNUMBER
     *
     * @param string $dECLINNUMBER
     *
     * @return SzAll
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
     * @return SzAll
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
     * Set sUDDOCL
     *
     * @param string $sUDDOCL
     *
     * @return SzAll
     */
    public function setSUDDOCL($sUDDOCL)
    {
        $this->sUDDOCL = $sUDDOCL;

        return $this;
    }

    /**
     * Get sUDDOCL
     *
     * @return string
     */
    public function getSUDDOCL()
    {
        return $this->sUDDOCL;
    }

    /**
     * Set iDSUDDOCL
     *
     * @param integer $iDSUDDOCL
     *
     * @return SzAll
     */
    public function setIDSUDDOCL($iDSUDDOCL)
    {
        $this->iDSUDDOCL = $iDSUDDOCL;

        return $this;
    }

    /**
     * Get iDSUDDOCL
     *
     * @return int
     */
    public function getIDSUDDOCL()
    {
        return $this->iDSUDDOCL;
    }

    /**
     * Set sTORONU
     *
     * @param string $sTORONU
     *
     * @return SzAll
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

    /**
     * Set sUDKOL
     *
     * @param string $sUDKOL
     *
     * @return SzAll
     */
    public function setSUDKOL($sUDKOL)
    {
        $this->sUDKOL = $sUDKOL;

        return $this;
    }

    /**
     * Get sUDKOL
     *
     * @return string
     */
    public function getSUDKOL()
    {
        return $this->sUDKOL;
    }

    /**
     * Set iDSUDKOL
     *
     * @param integer $iDSUDKOL
     *
     * @return SzAll
     */
    public function setIDSUDKOL($iDSUDKOL)
    {
        $this->iDSUDKOL = $iDSUDKOL;

        return $this;
    }

    /**
     * Get iDSUDKOL
     *
     * @return int
     */
    public function getIDSUDKOL()
    {
        return $this->iDSUDKOL;
    }

    /**
     * @return int
     */
    public function getTimestamFromString(){
        $d = new \DateTime(date($this->sZ.' '.$this->getSZTIMEToString()));
        return $d->getTimestamp();
    }
}

