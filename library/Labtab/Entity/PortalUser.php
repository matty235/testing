<?php

namespace Labtab\Entity;

/**
 * PortalUser
 *
 * @Table(name="portal_user")
 * @Entity
 */
class PortalUser extends AbstractEntity
{
    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=100, nullable=false)
     * @Id
     */
    private $email;

    /**
     * @var string $userFname
     *
     * @Column(name="user_fname", type="string", length=100, nullable=false)
     */
    private $userFname;

    /**
     * @var string $userLname
     *
     * @Column(name="user_lname", type="string", length=100, nullable=false)
     */
    private $userLname;

    /**
     * @var string $pw
     *
     * @Column(name="pw", type="string", length=300, nullable=false)
     */
    private $pw;

    /**
     * @var int $userType
     *
     * @Column(name="user_type", type="integer", nullable=false)
     */
    private $userType;
    
    /**
    * ManyToOne(targetEntity="LabtabUser", inversedBy="portalUser" )
    * JoinTable(name="1m_labtab_portal",
   	* 		joinColumns={@JoinColumn(name="labtab_username", referencedColumnName="labtab_username")},
   	* 		inverseJoinColumns={@JoinColumn(name="portal_username", referencedColumnName="email")}
   	* )
   	*/    
    private $labtabUser;
    
    /**
     * Get email
     *
     * @return string $email
     */
    public function setEmail($data)
    {
    		if (!isset($this->email))
	        $this->email = $data;
        return $this;
    }
    
    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set userFname
     *
     * @param string $userFname
     */
    public function setUserFname($userFname)
    {
        $this->userFname = $userFname;
    }

    /**
     * Get userFname
     *
     * @return string $userFname
     */
    public function getUserFname()
    {
        return $this->userFname;
    }

    /**
     * Set userLname
     *
     * @param string $userLname
     */
    public function setUserLname($userLname)
    {
        $this->userLname = $userLname;
        return $this;
    }

    /**
     * Get userLname
     *
     * @return string $userLname
     */
    public function getUserLname()
    {
        return $this->userLname;
    }

    /**
     * Set pw
     *
     * @param string $pw
     */
    public function setPw($pw)
    {
        $this->pw = $pw;
        return $this;
    }

    /**
     * Get pw
     *
     * @return string $pw
     */
    public function getPw()
    {
        return $this->pw;
    }

    /**
     * Set userType
     *
     * @param int $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * Get userType
     *
     * @return int $userType
     */
    public function getUserType()
    {    
    	return (int)$this->userType;
    }    
       
    public function userExists($email)
    {
			return ($this->getEm()->find('Labtab\Entity\PortalUser', $email) === null) ? false : true;
		}  
        
		public function login()
		{
			$_SESSION['fname'] = $this->getUserFname();
			$_SESSION['lname'] = $this->getUserLname();
			$_SESSION['email'] =  $this->getEmail(); #'jlupi@usaccuscreen.com';
			$_SESSION['full_name'] = ucfirst($this->getUserFname() . ' ' . $this->getUserLname());			
			$_SESSION['from'] = $this->getLabtabUsername();
			$_SESSION['user_type'] = $this->getUserTypeName();
		}
		
    /**
     * Get userTypeName
     *
     * @return string
     */
    public function getUserTypeName()
    {    	    	    		
    	return User_Type::$types[$this->userType];
    }

    /**
     * Get oneM entity
     *
     * @return oneMLabtabPortal
     */
    public function get1M()
    {
    	$oneM = $this->getEm()->getRepository('Labtab\Entity\OneMLabtabPortal')->findOneBy(array('portalUsername' => $this->getEmail())); 
			return ($oneM);
    }  
        
    /**
     * Get LabtabUser entity
     *
     * @return LabtabUser
     */
    public function getLabtabUser()
    {
    	$oneM = $this->get1M();
    	$user = $this->getEm()->find('Labtab\Entity\LabtabUser', $oneM->getLabtabUsername());
    	//var_dump($user);
    	
    	return $user;
    	//return null;
			//return ($oneM !== null) ? $this->getEm()->find('Labtab\Entity\LabtabUser', $oneM->getLabtabUsername()) : null;
    }

    /**
     * Get LabtabUser entity
     *
     * @return string
     */
    public function getLabtabUsername()
    {
    	$oneM = $this->get1M();
    	return $oneM->getLabtabUsername();
    	//return null;
//    	return ($oneM !== null) ? $this->getEm()->find('Labtab\Entity\LabtabUser', $oneM->getLabtabUsername()) : null;
    }
    

    /**
     * Get Organization's UserType
     *
     * @return LabtabUser
     */
    public function getOrgUserType($orgName)
    {
    	$labtabOrg =  $this->getEm()->getRepository('Labtab\Entity\LabtabUser')->findOneBy(array('labtabUsername' => $orgName));
			return ($labtabOrg !== null) ? $labtabOrg->getUserType() : null;
    }

    /**
     * Create a user
     *
     * $newUser['org_name'] = $org_name;
		 * $newUser['first_name'] = $first_name;
		 * $newUser['last_name'] = $last_name;
		 * $newUser['email'] = $email;
     *
     * @return PortalUser
     */
    public function createUser($newUser)
    {
    	if ($this->userExists($newUser['email']))
    		die('failure');
    		
			$this->setUserType($this->getOrgUserType($newUser['org_name']));
			$this->setUserFname($newUser['first_name']);
			$this->setUserLname($newUser['last_name']);
			$this->setEmail($newUser['email']);
			$this->setPw('password');
			$this->getEm()->persist($this);
			
			$oneM = new OneMLabtabPortal();
			$oneM->setLabtabUsername($newUser['org_name']);
			$oneM->setPortalUsername($newUser['email']);
			$this->getEm()->persist($oneM);
			
			$this->getEm()->flush();
			return $this;
		}		
		

    /**
     * Delete record
     *
     * @return void
     */
		public function delete()
    {
    	$this->getEm()->remove($this->get1M());
    	$this->getEm()->remove($this);
			$this->getEm()->flush();
    }

}
