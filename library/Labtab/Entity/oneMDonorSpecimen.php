<?php

namespace Labtab\Entity;



/**
 * oneMDonorSpecimen
 *
 * @Table(name="1m_donor_specimen")
 * @Entity
 */
class oneMDonorSpecimen extends AbstractEntity 
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $ssn
     *
     * @Column(name="ssn", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $ssn;

    /**
     * @var string $number
     *
     * @Column(name="number", type="string", length=30, precision=0, scale=0, nullable=false, unique=false)
     */
    private $number;


    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ssn
     *
     * @param string $ssn
     */
    public function setSsn($ssn)
    {
        $this->ssn = $ssn;
    }

    /**
     * Get ssn
     *
     * @return string $ssn
     */
    public function getSsn()
    {
        return $this->ssn;
    }

    /**
     * Set number
     *
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
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
}
