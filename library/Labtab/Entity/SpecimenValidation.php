<?php

namespace Labtab\Entity;



/**
 * SpecimenValidation
 *
 * @Table(name="specimen_validation")
 * @Entity
 */
class SpecimenValidation extends AbstractEntity
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
     * @var integer $ph
     *
     * @Column(name="ph", type="integer", nullable=false)
     */
    private $ph;

    /**
     * @var integer $creatinine
     *
     * @Column(name="creatinine", type="integer", nullable=false)
     */
    private $creatinine;

    /**
     * @var integer $specificgravity
     *
     * @Column(name="specificgravity", type="integer", nullable=false)
     */
    private $specificgravity;

    /**
     * @var integer $oxidants
     *
     * @Column(name="Oxidants", type="integer", nullable=false)
     */
    private $oxidants;

    /**
     * @var integer $chromates
     *
     * @Column(name="Chromates", type="integer", nullable=false)
     */
    private $chromates;

    /**
     * @var integer $nitrates
     *
     * @Column(name="Nitrates", type="integer", nullable=false)
     */
    private $nitrates;

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
    public function getNumber($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->ph];
			else
    		return $this->number;
    }

    /**
     * Set ph
     *
     * @param integer $ph
     */
    public function setPh($ph)
    {
        $this->ph = $ph;
    }

    /**
     * Get ph
     *
     * @return integer $ph
     */
    public function getPh($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->ph];
			else
    		return $this->ph;
    }

    /**
     * Set creatinine
     *
     * @param integer $creatinine
     */
    public function setCreatinine($creatinine)
    {
        $this->creatinine = $creatinine;
    }

    /**
     * Get creatinine
     *
     * @return integer $creatinine
     */
    public function getCreatinine($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->creatinine];
			else
    		return $this->creatinine;
    }

    /**
     * Set specificgravity
     *
     * @param integer $specificgravity
     */
    public function setSpecificgravity($specificgravity)
    {
        $this->specificgravity = $specificgravity;
    }

    /**
     * Get specificgravity
     *
     * @return integer $specificgravity
     */
    public function getSpecificgravity($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->specificgravity];
			else
    		return $this->specificgravity;
    }

    /**
     * Set oxidants
     *
     * @param integer $oxidants
     */
    public function setOxidants($oxidants)
    {
        $this->oxidants = $oxidants;
    }

    /**
     * Get oxidants
     *
     * @return integer $oxidants
     */
    public function getOxidants($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->oxidants];
			else
    		return $this->oxidants;
    }

    /**
     * Set chromates
     *
     * @param integer $chromates
     */
    public function setChromates($chromates)
    {
        $this->chromates = $chromates;
    }

    /**
     * Get chromates
     *
     * @return integer $chromates
     */
    public function getChromates($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->chromates];
			else
    		return $this->chromates;
    }

    /**
     * Set nitrates
     *
     * @param integer $nitrates
     */
    public function setNitrates($nitrates)
    {
        $this->nitrates = $nitrates;
    }

    /**
     * Get nitrates
     *
     * @return integer $nitrates
     */
    public function getNitrates($text = false)
    {
    	if ($text)
    		return Enum_Validation::$types[$this->nitrates];
			else
    		return $this->nitrates;
    }
    
    public function getColor($num)
    {
    	return Enum_Validation::$colors[$num];
    }
}
