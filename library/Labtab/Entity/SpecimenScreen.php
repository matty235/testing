<?php

namespace Labtab\Entity;



/**
 * SpecimenScreen
 *
 * @Table(name="specimen_screen")
 * @Entity
 */
class SpecimenScreen extends AbstractEntity
{
    /**
     * @var string $number
     *
     * @Column(name="number", type="string", length=200, nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $number;

    /**
     * @var integer $amphetamines
     *
     * @Column(name="Amphetamines", type="integer", nullable=false)
     */
    private $amphetamines;

    /**
     * @var integer $barbituates
     *
     * @Column(name="Barbituates", type="integer", nullable=false)
     */
    private $barbituates;

    /**
     * @var integer $benzodiazepines
     *
     * @Column(name="Benzodiazepines", type="integer", nullable=false)
     */
    private $benzodiazepines;

    /**
     * @var integer $cocaine
     *
     * @Column(name="Cocaine", type="integer", nullable=false)
     */
    private $cocaine;

    /**
     * @var integer $methadone
     *
     * @Column(name="Methadone", type="integer", nullable=false)
     */
    private $methadone;

    /**
     * @var integer $phencyclidine
     *
     * @Column(name="Phencyclidine", type="integer", nullable=false)
     */
    private $phencyclidine;

    /**
     * @var integer $mdma
     *
     * @Column(name="MDMA", type="integer", nullable=false)
     */
    private $mdma;

    /**
     * @var integer $opiates
     *
     * @Column(name="Opiates", type="integer", nullable=false)
     */
    private $opiates;

    /**
     * @var integer $oxycodone
     *
     * @Column(name="Oxycodone", type="integer", nullable=false)
     */
    private $oxycodone;

    /**
     * @var integer $cannabinoids
     *
     * @Column(name="Cannabinoids", type="integer", nullable=false)
     */
    private $cannabinoids;

    /**
     * @var integer $ethylGlucuronide
     *
     * @Column(name="Ethyl_Glucuronide", type="integer", nullable=false)
     */
    private $ethylGlucuronide;

    /**
     *  @OneToOne(targetEntity="Specimen")
     *  @JoinColumn(name="number", referencedColumnName="number")
     */   
		private $specimen;


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
     * Set amphetamines
     *
     * @param integer $amphetamines
     */
    public function setAmphetamines($amphetamines)
    {
        $this->amphetamines = $amphetamines;
    }

    /**
     * Get amphetamines
     *
     * @return integer $amphetamines
     */
    public function getAmphetamines()
    {
        return $this->amphetamines;
    }

    /**
     * Set barbituates
     *
     * @param integer $barbituates
     */
    public function setBarbituates($barbituates)
    {
        $this->barbituates = $barbituates;
    }

    /**
     * Get barbituates
     *
     * @return integer $barbituates
     */
    public function getBarbituates()
    {
        return $this->barbituates;
    }

    /**
     * Set benzodiazepines
     *
     * @param integer $benzodiazepines
     */
    public function setBenzodiazepines($benzodiazepines)
    {
        $this->benzodiazepines = $benzodiazepines;
    }

    /**
     * Get benzodiazepines
     *
     * @return integer $benzodiazepines
     */
    public function getBenzodiazepines()
    {
        return $this->benzodiazepines;
    }

    /**
     * Set cocaine
     *
     * @param integer $cocaine
     */
    public function setCocaine($cocaine)
    {
        $this->cocaine = $cocaine;
    }

    /**
     * Get cocaine
     *
     * @return integer $cocaine
     */
    public function getCocaine()
    {
        return $this->cocaine;
    }

    /**
     * Set methadone
     *
     * @param integer $methadone
     */
    public function setMethadone($methadone)
    {
        $this->methadone = $methadone;
    }

    /**
     * Get methadone
     *
     * @return integer $methadone
     */
    public function getMethadone()
    {
        return $this->methadone;
    }

    /**
     * Set phencyclidine
     *
     * @param integer $phencyclidine
     */
    public function setPhencyclidine($phencyclidine)
    {
        $this->phencyclidine = $phencyclidine;
    }

    /**
     * Get phencyclidine
     *
     * @return integer $phencyclidine
     */
    public function getPhencyclidine()
    {
        return $this->phencyclidine;
    }

    /**
     * Set mdma
     *
     * @param integer $mdma
     */
    public function setMdma($mdma)
    {
        $this->mdma = $mdma;
    }

    /**
     * Get mdma
     *
     * @return integer $mdma
     */
    public function getMdma()
    {
        return $this->mdma;
    }

    /**
     * Set opiates
     *
     * @param integer $opiates
     */
    public function setOpiates($opiates)
    {
        $this->opiates = $opiates;
    }

    /**
     * Get opiates
     *
     * @return integer $opiates
     */
    public function getOpiates()
    {
        return $this->opiates;
    }

    /**
     * Set oxycodone
     *
     * @param integer $oxycodone
     */
    public function setOxycodone($oxycodone)
    {
        $this->oxycodone = $oxycodone;
    }

    /**
     * Get oxycodone
     *
     * @return integer $oxycodone
     */
    public function getOxycodone()
    {
        return $this->oxycodone;
    }

    /**
     * Set cannabinoids
     *
     * @param integer $cannabinoids
     */
    public function setCannabinoids($cannabinoids)
    {
        $this->cannabinoids = $cannabinoids;
    }

    /**
     * Get cannabinoids
     *
     * @return integer $cannabinoids
     */
    public function getCannabinoids()
    {
        return $this->cannabinoids;
    }

    /**
     * Set ethylGlucuronide
     *
     * @param integer $ethylGlucuronide
     */
    public function setEthylGlucuronide($ethylGlucuronide)
    {
        $this->ethylGlucuronide = $ethylGlucuronide;
    }

    /**
     * Get ethylGlucuronide
     *
     * @return integer $ethylGlucuronide
     */
    public function getEthylGlucuronide()
    {
        return $this->ethylGlucuronide;
    }
    
    /**
     * Get specimen entity
     *
     * @return Labtab_Entity_Specimen
     */
  //  public function getSpecimen()
    //{
//        return $this->specimen;
   // }    
}
