<?php

namespace Labtab\Entity;



/**
 * PocPositives
 *
 * @Table(name="poc_positives")
 * @Entity
 */
class PocPositives extends AbstractEntity
{
    /**
     * @var string $number
     *
     * @Column(name="number", type="string", length=50, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $number;

    /**
     * @var integer $amp
     *
     * @Column(name="amp", type="integer", nullable=false)
     */
    private $amp;

    /**
     * @var integer $bar
     *
     * @Column(name="bar", type="integer", nullable=false)
     */
    private $bar;

    /**
     * @var integer $bup
     *
     * @Column(name="bup", type="integer", nullable=false)
     */
    private $bup;

    /**
     * @var integer $bzdBzo
     *
     * @Column(name="bzd_bzo", type="integer", nullable=false)
     */
    private $bzdBzo;

    /**
     * @var integer $coc
     *
     * @Column(name="coc", type="integer", nullable=false)
     */
    private $coc;

    /**
     * @var integer $mdmaXtc
     *
     * @Column(name="mdma_xtc", type="integer", nullable=false)
     */
    private $mdmaXtc;

    /**
     * @var integer $met
     *
     * @Column(name="met", type="integer", nullable=false)
     */
    private $met;

    /**
     * @var integer $mtdMad
     *
     * @Column(name="mtd_mad", type="integer", nullable=false)
     */
    private $mtdMad;

    /**
     * @var integer $opiMopMor
     *
     * @Column(name="opi_mop_mor", type="integer", nullable=false)
     */
    private $opiMopMor;

    /**
     * @var integer $oxy
     *
     * @Column(name="oxy", type="integer", nullable=false)
     */
    private $oxy;

    /**
     * @var integer $pcp
     *
     * @Column(name="pcp", type="integer", nullable=false)
     */
    private $pcp;

    /**
     * @var integer $ppx
     *
     * @Column(name="ppx", type="integer", nullable=false)
     */
    private $ppx;

    /**
     * @var integer $tca
     *
     * @Column(name="tca", type="integer", nullable=false)
     */
    private $tca;

    /**
     * @var integer $thc
     *
     * @Column(name="thc", type="integer", nullable=false)
     */
    private $thc;

    /**
     * @var integer $bsalts
     *
     * @Column(name="bsalts", type="integer", nullable=false)
     */
    private $bsalts;

    /**
     * @var integer $etg
     *
     * @Column(name="etg", type="integer", nullable=false)
     */
    private $etg;

    /**
     * @var integer $k2
     *
     * @Column(name="k2", type="integer", nullable=false)
     */
    private $k2;

    /**
     *  @OneToOne(targetEntity="Specimen", inversedBy="pocPositiveList")
     *  @JoinColumn(name="number", referencedColumnName="number")
     */
    private $specimen;

    public $resultName;
    
    public function __construct()
    {
    	$this->resultName = new \Labtab\Entity\Enum_Result;
    }

    /**
     * Get specimen
     *
     * @return Specimen $specimen
     */
    public function getSpecimen()
    {
    	return $this->specimen;
    }
    
    
    
    /**
     * Get number
     *
     * @return string $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set amp
     *
     * @param integer $amp
     */
    public function setAmp($amp)
    {
        $this->amp = $amp;
    }

    /**
     * Get amp
     *
     * @return integer $amp
     */
    public function getAmp()
    {
        return $this->amp;
    }

    /**
     * Set bar
     *
     * @param integer $bar
     */
    public function setBar($bar)
    {
        $this->bar = $bar;
    }

    /**
     * Get bar
     *
     * @return integer $bar
     */
    public function getBar()
    {
        return $this->bar;
    }

    /**
     * Set bup
     *
     * @param integer $bup
     */
    public function setBup($bup)
    {
        $this->bup = $bup;
    }

    /**
     * Get bup
     *
     * @return integer $bup
     */
    public function getBup()
    {
        return $this->bup;
    }

    /**
     * Set bzdBzo
     *
     * @param integer $bzdBzo
     */
    public function setBzdBzo($bzdBzo)
    {
        $this->bzdBzo = $bzdBzo;
    }

    /**
     * Get bzdBzo
     *
     * @return integer $bzdBzo
     */
    public function getBzdBzo()
    {
        return $this->bzdBzo;
    }

    /**
     * Set coc
     *
     * @param integer $coc
     */
    public function setCoc($coc)
    {
        $this->coc = $coc;
    }

    /**
     * Get coc
     *
     * @return integer $coc
     */
    public function getCoc()
    {
        return $this->coc;
    }

    /**
     * Set mdmaXtc
     *
     * @param integer $mdmaXtc
     */
    public function setMdmaXtc($mdmaXtc)
    {
        $this->mdmaXtc = $mdmaXtc;
    }

    /**
     * Get mdmaXtc
     *
     * @return integer $mdmaXtc
     */
    public function getMdmaXtc()
    {
        return $this->mdmaXtc;
    }

    /**
     * Set met
     *
     * @param integer $met
     */
    public function setMet($met)
    {
        $this->met = $met;
    }

    /**
     * Get met
     *
     * @return integer $met
     */
    public function getMet()
    {
        return $this->met;
    }

    /**
     * Set mtdMad
     *
     * @param integer $mtdMad
     */
    public function setMtdMad($mtdMad)
    {
        $this->mtdMad = $mtdMad;
    }

    /**
     * Get mtdMad
     *
     * @return integer $mtdMad
     */
    public function getMtdMad()
    {
        return $this->mtdMad;
    }

    /**
     * Set opiMopMor
     *
     * @param integer $opiMopMor
     */
    public function setOpiMopMor($opiMopMor)
    {
        $this->opiMopMor = $opiMopMor;
    }

    /**
     * Get opiMopMor
     *
     * @return integer $opiMopMor
     */
    public function getOpiMopMor()
    {
        return $this->opiMopMor;
    }

    /**
     * Set oxy
     *
     * @param integer $oxy
     */
    public function setOxy($oxy)
    {
        $this->oxy = $oxy;
    }

    /**
     * Get oxy
     *
     * @return integer $oxy
     */
    public function getOxy()
    {
        return $this->oxy;
    }

    /**
     * Set pcp
     *
     * @param integer $pcp
     */
    public function setPcp($pcp)
    {
        $this->pcp = $pcp;
    }

    /**
     * Get pcp
     *
     * @return integer $pcp
     */
    public function getPcp()
    {
        return $this->pcp;
    }

    /**
     * Set ppx
     *
     * @param integer $ppx
     */
    public function setPpx($ppx)
    {
        $this->ppx = $ppx;
    }

    /**
     * Get ppx
     *
     * @return integer $ppx
     */
    public function getPpx()
    {
        return $this->ppx;
    }

    /**
     * Set tca
     *
     * @param integer $tca
     */
    public function setTca($tca)
    {
        $this->tca = $tca;
    }

    /**
     * Get tca
     *
     * @return integer $tca
     */
    public function getTca()
    {
        return $this->tca;
    }

    /**
     * Set thc
     *
     * @param integer $thc
     */
    public function setThc($thc)
    {
        $this->thc = $thc;
    }

    /**
     * Get thc
     *
     * @return integer $thc
     */
    public function getThc()
    {
        return $this->thc;
    }

    /**
     * Set bsalts
     *
     * @param integer $bsalts
     */
    public function setBsalts($bsalts)
    {
        $this->bsalts = $bsalts;
    }

    /**
     * Get bsalts
     *
     * @return integer $bsalts
     */
    public function getBsalts()
    {
        return $this->bsalts;
    }

    /**
     * Set etg
     *
     * @param integer $etg
     */
    public function setEtg($etg)
    {
        $this->etg = $etg;
    }

    /**
     * Get etg
     *
     * @return integer $etg
     */
    public function getEtg()
    {
        return $this->etg;
    }

    /**
     * Set k2
     *
     * @param integer $k2
     */
    public function setK2($k2)
    {
        $this->k2 = $k2;
    }

    /**
     * Get k2
     *
     * @return integer $k2
     */
    public function getK2()
    {
        return $this->k2;
    }
}
