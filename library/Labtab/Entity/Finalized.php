<?php

namespace Labtab\Entity;



/**
 * Finalized
 *
 * @Table(name="finalized")
 * @Entity
 */
class Finalized extends AbstractEntity
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $portalUser
     *
     * @Column(name="portal_user", type="string", length=100, nullable=false)
     */
    private $portalUser;

    /**
     * @var datetime $dateTime
     *
     * @Column(name="date_time", type="datetime", nullable=true)
     */
    private $dateTime;

    /**
     * @var integer $finalizeChangedTo
     *
     * @Column(name="finalize_changed_to", type="integer", nullable=false)
     */
    private $finalizeChangedTo;



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
     * Set portalUser
     *
     * @param string $portalUser
     */
    public function setPortalUser($portalUser)
    {
        $this->portalUser = $portalUser;
    }

    /**
     * Get portalUser
     *
     * @return string $portalUser
     */
    public function getPortalUser()
    {
        return $this->portalUser;
    }

    /**
     * Set dateTime
     *
     * @param datetime $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * Get dateTime
     *
     * @return datetime $dateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set finalizeChangedTo
     *
     * @param boolean $finalizeChangedTo
     */
    public function setFinalizeChangedTo($finalizeChangedTo)
    {
        $this->finalizeChangedTo = $finalizeChangedTo;
    }

    /**
     * Get finalizeChangedTo
     *
     * @return boolean $finalizeChangedTo
     */
    public function getFinalizeChangedTo()
    {
        return $this->finalizeChangedTo;
    }
}
