<?php

namespace Labtab\Entity;


/**
 * DonorContactInfo
 *
 * @Table(name="donor_contact_info")
 * @Entity
 
 */
class DonorContactInfo extends AbstractEntity
{
    /**
     * @var integer $id
     *
     * @Id @Column(name="id", type="integer", nullable=false) 
 		 * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $ssn
     *
     * @Column(name="ssn", type="string", length=20, nullable=false)
     */
    private $ssn;

    /**
     * @var datetime $dateTimeEntered
     *
     * @Column(name="date_time_entered", type="datetime", nullable=false)
     */
    private $dateTimeEntered;

    /**
     * @var date $dob
     *
     * @Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var string $firstName
     *
     * @Column(name="first_name", type="string", length=30, nullable=false)
     */
    private $firstName;

    /**
     * @var string $lastName
     *
     * @Column(name="last_name", type="string", length=50, nullable=false)
     */
    private $lastName;

    /**
     * @var string $address
     *
     * @Column(name="address", type="string", length=200, nullable=false)
     */
    private $address;

    /**
     * @var string $city
     *
     * @Column(name="city", type="string", length=200, nullable=false)
     */
    private $city;

    /**
     * @var string $state
     *
     * @Column(name="state", type="string", length=20, nullable=false)
     */
    private $state;

    /**
     * @var integer $zip
     *
     * @Column(name="zip", type="integer", nullable=false)
     */
    private $zip;

    /**
     * @var string $phone
     *
     * @Column(name="phone", type="string", length=30, nullable=false)
     */
    private $phone;

    /**
     * @var string $from
     *
     * @Column(name="from_org", type="string", length=200, nullable=false)
     */
    private $from;

    /**
     * @var integer $insertionMethod
     *
     * @Column(name="insertion_method", type="integer", nullable=false)
     */
    private $insertionMethod;
	
    /**
     * 
     * @var Collection
     * @ManyToMany(targetEntity="Specimen", mappedBy="donor")
		 *		@JoinTable(name="1m_donor_specimen",    		
     * 		joinColumns={@JoinColumn(name="ssn", referencedColumnName="ssn")},
     *    inverseJoinColumns={@JoinColumn(name="number", referencedColumnName="number")}  
     * )
     * 
     */
		private $specimens;
    	

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
     * Set dateTimeEntered
     *
     * @param datetime $dateTimeEntered
     */
    public function setDateTimeEntered($dateTimeEntered)
    {
        $this->dateTimeEntered = $dateTimeEntered;
    }

    /**
     * Get dateTimeEntered
     *
     * @return datetime $dateTimeEntered
     */
    public function getDateTimeEntered()
    {
        return $this->dateTimeEntered;
    }

    /**
     * Set dob
     *
     * @param date $dob
     */
    public function setDob($dob)
    {
        $this->dob = $dob;
    }

    /**
     * Get dob
     *
     * @return date $dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set address
     *
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Get address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return string $state
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param integer $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Get zip
     *
     * @return integer $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set phone
     *
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Get phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set from
     *
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * Get from
     *
     * @return string $from
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set insertionMethod
     *
     * @param integer $insertionMethod
     */
    public function setInsertionMethod($insertionMethod)
    {
        $this->insertionMethod = $insertionMethod;
    }

    /**
     * Get insertionMethod
     *
     * @return integer $insertionMethod
     */
    public function getInsertionMethod()
    {
        return $this->insertionMethod;
    }

    /**
     * Get insertionMethodName
     *
     * @return string
     */
    public function getInsertionMethodName()
    {
    	return Enum_InsertionMethod::$types[$this->insertionMethod];
    }
    
    public function getDonorsSearched($post)
    {
    	$rsm = new \Doctrine\ORM\Query\ResultSetMapping;
    	
    	$rsm->addScalarResult('first_name','first_name');
    	$rsm->addScalarResult('last_name','last_name');
    	$rsm->addScalarResult("dob",'dob');
    	$rsm->addScalarResult("phone",'phone');
    	$rsm->addScalarResult("address",'address');
    	$rsm->addScalarResult("city",'city');
    	$rsm->addScalarResult("state",'state');
    	$rsm->addScalarResult("zip",'zip');    	
    	
    	$first_name = $post['first_name'];
	    $last_name = $post['last_name'];
	    $labtab_username = $post['labtab_username'];
	    $fromdate = date("Y-m-d", strtotime($post['fromdate']));
	    $todate = date("Y-m-d", strtotime($post['todate']));
	    $insertion_method = $post['insertion_method'];
	    
	    $query = "  SELECT
	    *
	    FROM
	    donor_contact_info
	    WHERE
	    date(date_time_entered) >= '$fromdate' AND
	    date(date_time_entered) <= '$todate' ";
	    
	    if ($insertion_method != "all") {
	    	$query = $query . " AND insertion_method = '$insertion_method' ";
	    }
	    if ($first_name != "") {
	    	$query = $query . " AND first_name = '$first_name'  ";
	    }
	    if ($last_name != "") {
	    	$query = $query . " AND last_name = '$last_name'  ";
	    }
	    if ($labtab_username != "*") {
	    	$query = $query . " AND donor_contact_info.from = '$labtab_username' ";
	    }
	    $query = $query . " Limit 0, 30";
    
	    $dql = $this->getEm()->createNativeQuery($query, $rsm);	    
	    return $dql->getResult();
	    
    }
    
    public function writeJson()
    {
    
    	// Create donor JSON object
    	$donorArr = array(
    			'ssn' => $this->getSsn(),
    			'from' => $this->getFrom(),
    			'first_name' => $this->getFirstName(),
    			'last_name' => $this->getLastName(),
    			'address' => $this->getAddress(),
    			'city' => $this->getCity(),
    			'state' => $this->getState(),
    			'zip' => $this->getZip(),
    			'phone' => $this->getPhone(),
    			'dob' => $this->getDob(),
    			'pending' => 'false'
    	);
    	$donorJSON = json_encode($donorArr);
    	
    	// Check if path exists. If not, make it.
    	$config = \Zend_Registry::get('config');
    	$uploadPath = $config['configurable']['webDonorsPath'] . "/" . $this->getFrom() . "/";
    	if (!is_dir($uploadPath)) {
    		mkdir($uploadPath);
    	}
    	
    	// Get name of file
    	$t = new DonorWebTracker();
    	$this->getEm()->persist($t);
    	$this->getEm()->flush();

    	$id = sprintf( '%08d', $t->getDonorWebTracker());
    	$id = 'D' . $id . '.txt';
    	// Write the file to the correct folder
    	file_put_contents($uploadPath . $id, $donorJSON);
    	
    	return;
    	
    }

  /**
   * Check if ssn is in donor. If not in donor, insert 
   * @return void
   */
	public function insertSsn()
	{
		
		$ssnRepo = $this->getEm()->getRepository('Labtab:Donor');
   	$res = $ssnRepo->find($this->getSsn());
		if ($res === null)
		{
			// need to insert
			$ssn = new \Labtab\Entity\Donor;
			$ssn->setSsn($this->getSsn());
			$this->getEm()->persist($ssn);
			$this->getEm()->flush();		
		}
		return;
	}

	public function save1M()
	{
	
		$oneM = new \Labtab\Entity\oneMDonorContactInfo;
		$oneM->setSsn($this->getSsn());
		$oneM->setDonorContactInfoId($this->getId());
		$this->getEm()->persist($oneM);
		$this->getEm()->flush();
		return;
	}

}