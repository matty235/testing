<?php

namespace Labtab\Entity;

/**
 * Specimen
 *
 * @Table(name="specimen")
 * @Entity
 */
class Specimen extends AbstractEntity
{
    /**
     * @var string $number
     *
     * @Column(name="number", type="string", length=30, nullable=false)
     * @Id
     */
    private $number;

    /**
     * @var string $from
     *
     * @Column(name="from", type="string", length=100, nullable=false)
     */
    private $from;

    /**
     * @var datetime $received
     *
     * @Column(name="received", type="datetime", nullable=true)
     */
    private $received;

    /**
     * @var date $date
     *
     * @Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var string $insBack
     *
     * @Column(name="ins_back", type="string", length=200, nullable=true)
     */
    private $insBack;

    /**
     * @var string $insFront
     *
     * @Column(name="ins_front", type="string", length=200, nullable=true)
     */
    private $insFront;

    /**
     * @var string $ins2Back
     *
     * @Column(name="ins2_back", type="string", length=200, nullable=true)
     */
    private $ins2Back;

    /**
     * @var string $ins2Front
     *
     * @Column(name="ins2_front", type="string", length=200, nullable=true)
     */
    private $ins2Front;

    /**
     * @var string $otherMedicines
     *
     * @Column(name="other_medicines", type="string", length=500, nullable=true)
     */
    private $otherMedicines;

    /**
     * @var string $insInfo
     *
     * @Column(name="ins_info", type="string", length=500, nullable=true)
     */
    private $insInfo;

    /**
     * @var string $tempOk
     *
     * @Column(name="temp_ok", type="string", length=100, nullable=true)
     */
    private $tempOk;

    /**
     * @var string $visitReason
     *
     * @Column(name="visit_reason", type="string", length=1000, nullable=true)
     */
    private $visitReason;

    /**
     * @var string $pocMethod
     *
     * @Column(name="poc_method", type="string", length=200, nullable=true)
     */
    private $pocMethod;

    /**
     * @var string $physician
     *
     * @Column(name="physician", type="string", length=200, nullable=true)
     */
    private $physician;

    /**
     * @var string $diagnoses
     *
     * @Column(name="diagnoses", type="string", length=1000, nullable=true)
     */
    private $diagnoses;

    /**
     * @var string $medicines
     *
     * @Column(name="medicines", type="string", length=1000, nullable=true)
     */
    private $medicines;

    /**
     * @var string $pocPositives
     *
     * @Column(name="poc_positives", type="string", length=1000, nullable=true)
     */
    private $pocPositives;

    /**
     * @var string $fromPending
     *
     * @Column(name="from_pending", type="string", length=500, nullable=true)
     */
    private $fromPending;

    /**
     * @var string $labelText
     *
     * @Column(name="label_text", type="string", length=1000, nullable=true)
     */
    private $labelText;

    /**
     * @var string $signature
     *
     * @Column(name="signature", type="string", length=10000, nullable=true)
     */
    private $signature;

    /**
     * @var string $empid
     *
     * @Column(name="empid", type="string", length=200, nullable=false)
     */
    private $empid;

    /**
     * @var boolean $finalized
     *
     * @Column(name="finalized", type="boolean", nullable=false)
     */
    private $finalized;

    /**
     * @var string $collectorName
     *
     * @Column(name="collector_name", type="string", length=200, nullable=false)
     */
    private $collectorName;

    /**
     * @var \DonorContactInfo
     * @ManyToMany(targetEntity="DonorContactInfo", inversedBy="specimens" )
     * @JoinTable(name="1m_donor_specimen",    		
     * 		joinColumns={@JoinColumn(name="number", referencedColumnName="number")},
		 * 		inverseJoinColumns={@JoinColumn(name="ssn", referencedColumnName="ssn")}     
     * )
     */
    private $donor;
    
    private $firstView;

    /**
     *  @OneToOne(targetEntity="PocPositives", mappedBy="specimen")
     */
    private $pocPositiveList;
        
    public function getPocPositiveList()
    {
    	return $this->pocPositiveList;
    }
    
    /**
     *  @OneToOne(targetEntity="SpecimenValidation", mappedBy="specimen")
     */
    private $validation;
    
    public function getValidation()
    {
    	return $this->validation;
    }
    
    /**
     *  @OneToOne(targetEntity="SpecimenScreen", mappedBy="specimen")
     */
    private $screen;
    
    public function getScreen()
    {
    	return $this->screen;
    }
    
    
    public function getDonor()
    {    	
    	return $this->donor->first();	
    }

		/** 
		 * Get first view
		 * @return \Labtab\Entity\SpecimenFirstView
		 */
    public function getFirstView()
    {
    	
    	$f =  $this->getEm()->getRepository('Labtab:SpecimenFirstView')->find($this->getNumber());
    	return ($f === null) ? false : $f; 
    	
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
     * Set received
     *
     * @param datetime $received
     */
    public function setReceived($received)
    {
        $this->received = $received;
    }

    /**
     * Get received
     *
     * @return datetime $received
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * Set date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return date $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set insBack
     *
     * @param string $insBack
     */
    public function setInsBack($insBack)
    {
        $this->insBack = $insBack;
    }

    /**
     * Get insBack
     *
     * @return string $insBack
     */
    public function getInsBack()
    {
        return $this->insBack;
    }

    /**
     * Set insFront
     *
     * @param string $insFront
     */
    public function setInsFront($insFront)
    {
        $this->insFront = $insFront;
    }

    /**
     * Get insFront
     *
     * @return string $insFront
     */
    public function getInsFront()
    {
        return $this->insFront;
    }

    /**
     * Set ins2Back
     *
     * @param string $ins2Back
     */
    public function setIns2Back($ins2Back)
    {
        $this->ins2Back = $ins2Back;
    }

    /**
     * Get ins2Back
     *
     * @return string $ins2Back
     */
    public function getIns2Back()
    {
        return $this->ins2Back;
    }

    /**
     * Set ins2Front
     *
     * @param string $ins2Front
     */
    public function setIns2Front($ins2Front)
    {
        $this->ins2Front = $ins2Front;
    }

    /**
     * Get ins2Front
     *
     * @return string $ins2Front
     */
    public function getIns2Front()
    {
        return $this->ins2Front;
    }

    /**
     * Set otherMedicines
     *
     * @param string $otherMedicines
     */
    public function setOtherMedicines($otherMedicines)
    {
        $this->otherMedicines = $otherMedicines;
    }

    /**
     * Get otherMedicines
     *
     * @return string $otherMedicines
     */
    public function getOtherMedicines()
    {
        return $this->otherMedicines;
    }

    /**
     * Set insInfo
     *
     * @param string $insInfo
     */
    public function setInsInfo($insInfo)
    {
        $this->insInfo = $insInfo;
    }

    /**
     * Get insInfo
     *
     * @return string $insInfo
     */
    public function getInsInfo()
    {
        return $this->insInfo;
    }

    /**
     * Set tempOk
     *
     * @param string $tempOk
     */
    public function setTempOk($tempOk)
    {
        $this->tempOk = $tempOk;
    }

    /**
     * Get tempOk
     *
     * @return string $tempOk
     */
    public function getTempOk()
    {
        return $this->tempOk;
    }

    /**
     * Set visitReason
     *
     * @param string $visitReason
     */
    public function setVisitReason($visitReason)
    {
        $this->visitReason = $visitReason;
    }

    /**
     * Get visitReason
     *
     * @return string $visitReason
     */
    public function getVisitReason()
    {
        return $this->visitReason;
    }

    /**
     * Set pocMethod
     *
     * @param string $pocMethod
     */
    public function setPocMethod($pocMethod)
    {
        $this->pocMethod = $pocMethod;
    }

    /**
     * Get pocMethod
     *
     * @return string $pocMethod
     */
    public function getPocMethod()
    {
        return $this->pocMethod;
    }

    /**
     * Set physician
     *
     * @param string $physician
     */
    public function setPhysician($physician)
    {
        $this->physician = $physician;
    }

    /**
     * Get physician
     *
     * @return string $physician
     */
    public function getPhysician()
    {
        return $this->physician;
    }

    /**
     * Set diagnoses
     *
     * @param string $diagnoses
     */
    public function setDiagnoses($diagnoses)
    {
        $this->diagnoses = $diagnoses;
    }

    /**
     * Get diagnoses
     *
     * @return string $diagnoses
     */
    public function getDiagnoses()
    {
        return $this->diagnoses;
    }

    /**
     * Set medicines
     *
     * @param string $medicines
     */
    public function setMedicines($medicines)
    {
        $this->medicines = $medicines;
    }

    /**
     * Get medicines
     *
     * @return string $medicines
     */
    public function getMedicines()
    {
        return $this->medicines;
    }

    /**
     * Set pocPositives
     *
     * @param string $pocPositives
     */
    public function setPocPositives($pocPositives)
    {
        $this->pocPositives = $pocPositives;
    }

    /**
     * Get pocPositives
     *
     * @return string $pocPositives
     */
    public function getPocPositives()
    {
        return $this->pocPositives;
    }

    /**
     * Set fromPending
     *
     * @param string $fromPending
     */
    public function setFromPending($fromPending)
    {
        $this->fromPending = $fromPending;
    }

    /**
     * Get fromPending
     *
     * @return string $fromPending
     */
    public function getFromPending()
    {
        return $this->fromPending;
    }

    /**
     * Set labelText
     *
     * @param string $labelText
     */
    public function setLabelText($labelText)
    {
        $this->labelText = $labelText;
    }

    /**
     * Get labelText
     *
     * @return string $labelText
     */
    public function getLabelText()
    {
        return $this->labelText;
    }

    /**
     * Set signature
     *
     * @param string $signature
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    /**
     * Get signature
     *
     * @return string $signature
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set empid
     *
     * @param string $empid
     */
    public function setEmpid($empid)
    {
        $this->empid = $empid;
    }

    /**
     * Get empid
     *
     * @return string $empid
     */
    public function getEmpid()
    {
        return $this->empid;
    }

    /**
     * Set finalized
     *
     * @param boolean $finalized
     */
    public function setFinalized($finalized)
    {
        $this->finalized = $finalized;
    }

    /**
     * Get finalized
     *
     * @return boolean $finalized
     */
    public function getFinalized()
    {
        return $this->finalized;
    }

    /**
     * Set collectorName
     *
     * @param string $collectorName
     */
    public function setCollectorName($collectorName)
    {
        $this->collectorName = $collectorName;
    }

    /**
     * Get collectorName
     *
     * @return string $collectorName
     */
    public function getCollectorName()
    {
        return $this->collectorName;
    }

    
    public function getSpecimensSearched($params)
    {
	    
	    $rsm = new \Doctrine\ORM\Query\ResultSetMapping;
	    //$rsm->addEntityResult('Labtab\Entity\Specimen', 's');
	    //$rsm->addEntityResult('Labtab\Entity\DonorContactInfo', 'c');
	    $rsm->addScalarResult('ssn','ssn');
	    $rsm->addScalarResult('id','id');
	    $rsm->addScalarResult('first_name','firstName');
	    $rsm->addScalarResult('last_name','lastName');
	    $rsm->addScalarResult('received','received');
	    $rsm->addScalarResult( 'number','number');
	    
	    $fromdate = date("Y/m/d", strtotime($params['fromdate']));
	    $todate = date("Y/m/d", strtotime($params['todate']));
	    $email = $_SESSION['email'];
	    $labtab_username = $_SESSION['from'];
	    
	    $query = "select donor_contact_info.ssn, donor_contact_info.id, donor_contact_info.first_name, donor_contact_info.last_name,
	    1m_donor_specimen.number , specimen.received
	    from 1m_donor_contact_info, donor_contact_info, 1m_donor_specimen, specimen
	    where 	1m_donor_contact_info.id = donor_contact_info.id
	    AND 	donor_contact_info.ssn = 1m_donor_specimen.ssn
	    AND 	1m_donor_specimen.number = specimen.number
	    AND     specimen.received >= '$fromdate'
	    AND     specimen.received <= '$todate'";	  
	    
	    if ($_SESSION['user_type'] == 'external')
	    {
	    	$query = $query . " AND specimen.from='$labtab_username' ";
	    }
	    
	    foreach ($params as $name => $value) {
	    	if ($value == '' || $name == 'ajax')
	    		continue;
	    	if ($name == "first_name") {
	    		$query = $query . " AND	donor_contact_info.first_name='" . $value . "'";
	    	} else if ($name == "last_name") {
	    		$query = $query . " AND	donor_contact_info.last_name='" . $value . "'";
	    	} else if ($name == "ssn") {
	    		$query = $query . " AND	donor_contact_info.ssn='" . $value . "'";
	    	} else if ($name == "number") {
	    		$query = $query . " AND specimen.number = '" . $value . "'";
	    	} else if ($name == "finalized") {
	    		$query = $query . " AND specimen.finalized = '" . $value . "'";
	    	} else if ($name == 'label_text') {
	    		$query = $query . " AND specimen.label_text = '" . $value . "'";
	    	}
	    }
	    $query = $query . " Limit 0, 30";
	    
	    $dql = $this->getEm()->createNativeQuery($query, $rsm);
	    
	    //var_dump($dql->getResult());No wor
	    
	    return $dql->getResult();
			
    }
    

    public function getImages()
    {
    	$images = array(
    		'insFront' => $this->getInsFront(),
    		'ins2Front' => $this->getIns2Front(),
    		'insBack' => $this->getInsBack(),
    		'ins2Back' => $this->getIns2Back(),
    	);
    	foreach ($images as $var => $val)
    		if ($val == '')
    			unset($images[$var]);
    	
    	return $images;
    }
    
    public function getImageUrls()
    {
    	$config = \Zend_Registry::get('config');
    	$tempFolder = $config['configurable']['tempImageFolder'] . "/";
    	$base = $_SERVER['DOCUMENT_ROOT'] . "/$tempFolder" ;
    	if (!file_exists($base))
    		mkdir($base);
    	
    	$folder = $base . $_SESSION['email'] . "/";
    	if (!file_exists($folder)) {
    		mkdir($folder);
    	}
    	
    	foreach ($this->getImages() as $iName => $iFile)
    	{
    		$source = $config['configurable']['serverImageFolder'] . "/" . str_replace("Z:/", "", $iFile);
    		
    		$newName = $this->camelToUnder($iName) . ".jpg";
    		$dest = $folder . $newName;
    		$url = "/$tempFolder" . $_SESSION['email'] . "/$newName";
//    		var_dump($source);
  //  		var_dump($dest);
    		copy( $source, $dest);
    		$images[$this->camelToUnder($iName)] = $url;    		
    	}

    	return $images;
    }

		public function getFiles()
		{
			$return = array();
			$config = \Zend_Registry::get('config');
			$uploadPath = $config['configurable']['uploadPath'] . "/" . $this->getFrom() . "/" . $this->getNumber() . "/";
			
			if (is_dir($uploadPath)) 
			{
				$dir = new \DirectoryIterator($uploadPath);
				foreach ($dir as $fileinfo) 
				{
					if (!$fileinfo->isDot()) 
					{
						$return []= array('path' => $fileinfo->getPathname(), 'file' => $fileinfo->getFilename());		
					}
				}
			}
			return $return;
		}
    
		public function finalize($post)
		{
//			$newFinalizedValue = (array_key_exists('finalize_changed_to', $post)) ? 0 : 1;	

			$this->setFinalized($post['finalize_changed_to']);	

			$final = new Finalized($post);


			$final->setDateTime(new \DateTime());
			$this->getEm()->persist($this);
			$this->getEm()->persist($final);
			$this->getEm()->flush();
			$specimen_finalized = array('specimen_number' => $this->getNumber(), 'finalized_id' => $final->getId());			
			$sf1m = new oneMSpecimenFinalized($specimen_finalized);
			$this->getEm()->persist($sf1m);
			$this->getEm()->flush();
			return;
		}
		
		
		public function unfinalize()
		{
			die('unfinalization');
		}
		
		
}
