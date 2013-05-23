<?php

namespace Labtab\Entity;


/**
 * LabtabUser
 *
 * @Table(name="labtab_user")
 * @Entity
 */
class LabtabUser extends AbstractEntity 
{
	/**
     * @var string $labtabUsername
     *
     * @Column(name="labtab_username", type="string", length=100, nullable=false)
     * @Id
     */
    private $labtabUsername;

    /**
     * @var string $orgName
     *
     * @Column(name="org_name", type="string", length=500, nullable=false)
     */
    private $orgName;

    /**
     * @var integer $userType
     *
     * @Column(name="user_type", type="integer", nullable=false)
     */
    private $userType;

    /**
    * OneToMany(targetEntity="PortalUser", mappedBy="labtabUser" )
    * JoinTable(name="1m_labtab_portal",
    * 		joinColumns={@JoinColumn(name="portal_username", referencedColumnName="email")},
    * 		inverseJoinColumns={@JoinColumn(name="labtab_username", referencedColumnName="labtab_username")}
    * )
    */ 		
    private $portalUsers;
    
    

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
     * Set orgName
     *
     * @param string $orgName
     */
    public function setOrgName($orgName)
    {
        $this->orgName = $orgName;
    }

    /**
     * Get orgName
     *
     * @return string $orgName
     */
    public function getOrgName()
    {
        return $this->orgName;
    }

    /**
     * Set userType
     *
     * @param integer $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * Get userType
     *
     * @return integer $userType
     */
    public function getUserType()
    {
        return $this->userType;
    }

		/**
		 * Get oneM entity
		 *
		 * @return oneMLabtabPortal
		 */
		public function get1Ms()
		{
			$oneMRepo = $this->getEm()->getRepository('Labtab\Entity\OneMLabtabPortal');
			$all1Ms = $oneMRepo->findBy(array('labtabUsername' => $this->getLabtabUsername()));
			return ($all1Ms);
		}

		/**
		 * Get Portal users
		 * 
		 * @return array
		 */
		public function getPortalUsers()
		{
			$return = array();
			foreach ($this->get1Ms() as $row)
			{
				$return []= $this->getEm()->find('Labtab\Entity\PortalUser', $row->getPortalUsername());
			}
			return ($return);
		}
		
		

}
