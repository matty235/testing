<?php

namespace Labtab\Entity;



/**
 * oneMSpecimenFinalized
 *
 * @Table(name="1m_specimen_finalized")
 * @Entity
 */
class oneMSpecimenFinalized extends AbstractEntity 

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
     * @var string $specimenNumber
     *
     * @Column(name="specimen_number", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $specimenNumber;

    /**
     * @var integer $finalizedId
     *
     * @Column(name="finalized_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $finalizedId;


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
     * Set specimenNumber
     *
     * @param string $specimenNumber
     */
    public function setSpecimenNumber($specimenNumber)
    {
        $this->specimenNumber = $specimenNumber;
    }

    /**
     * Get specimenNumber
     *
     * @return string $specimenNumber
     */
    public function getSpecimenNumber()
    {
        return $this->specimenNumber;
    }

    /**
     * Set finalizedId
     *
     * @param integer $finalizedId
     */
    public function setFinalizedId($finalizedId)
    {
        $this->finalizedId = $finalizedId;
    }

    /**
     * Get finalizedId
     *
     * @return integer $finalizedId
     */
    public function getFinalizedId()
    {
        return $this->finalizedId;
    }
}
