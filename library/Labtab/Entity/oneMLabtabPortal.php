<?php

namespace Labtab\Entity;


/**
 * oneMLabtabPortal
 *
 * @Table(name="1m_labtab_portal")
 * @Entity
 */     
class OneMLabtabPortal extends AbstractEntity
{
    /** 
     *  @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $labtabUsername
     *
     * @Column(name="labtab_username", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $labtabUsername;

    /**
     * @var string $portalUsername
     *
     * @Column(name="portal_username", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $portalUsername;

		private $portalUser;
		private $labtabUser;


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
     * Set labtabUsername
     *
     * @param string $labtabUsername
     */
    public function setLabtabUsername($labtabUsername)
    {
        $this->labtabUsername = $labtabUsername;
    }

    /**
     * Get labtabUsername
     *
     * @return string $labtabUsername
     */
    public function getLabtabUsername()
    {
        return $this->labtabUsername;
    }

    /**
     * Set portalUsername
     *
     * @param string $portalUsername
     */
    public function setPortalUsername($portalUsername)
    {
        $this->portalUsername = $portalUsername;
    }

    /**
     * Get portalUsername
     *
     * @return string $portalUsername
     */
    public function getPortalUsername()
    {
        return $this->portalUsername;
    }

    public function getLabtabUser()
    {
        return $this->labtabUser;
    }

    public function getPortalUser()
    {
        return $this->portalUser;
    }

}
