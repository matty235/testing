<?php

namespace Labtab\Entity;

/**
 * PwReset
 *
 * @Table(name="pw_reset")
 * @Entity
 */
class PwReset extends AbstractEntity
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=200, nullable=false)
     */
    private $email;

    /**
     * @var datetime $expDate
     *
     * @Column(name="exp_date", type="datetime", nullable=false)
     */
    private $expDate;

    /**
     * @var boolean $used
     *
     * @Column(name="used", type="boolean", nullable=false)
     */
    private $used = false;



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
     * Set id
     *
     * @param integer $id
     */
    public function setId($id)
    {
    	$this->id = $id;
    }
    

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
     * Set expDate
     *
     * @param datetime $expDate
     */
    public function setExpDate($expDate)
    {
        $this->expDate = $expDate;
    }

    /**
     * Get expDate
     *
     * @return datetime $expDate
     */
    public function getExpDate()
    {
        return $this->expDate;
    }

    /**
     * Set used
     *
     * @param boolean $used
     */
    public function setUsed($used)
    {
        $this->used = $used;
    }

    /**
     * Get used
     *
     * @return boolean $used
     */
    public function getUsed()
    {
        return $this->used;
    }

    public function __construct($email)
    {
    	    	
    	$tz = new \DateTimeZone(date_default_timezone_get());
    	$now = new \DateTime(null, $tz);
    	$oneh = new \DateInterval('PT1H');
    		
    	$rand = rand(0, 1000000000000000000);
	
    	$this->setId($rand);
    	$this->setEmail($email);
    	$this->setExpDate($now->add($oneh));

    	return $this;
    }
    
    public function send()
    {
    	$config = \Zend_Registry::get('config');
    	$site_url = $_SESSION['site_url'];
    	
    	$transport = new  \Zend_Mail_Transport_Smtp($config['smtp']['host'], $config['smtp']['config']);
 	   	$mail = new \Zend_Mail();
    	
    	$msg = "Recently you requested to have your Labtab Portal password reset. Click the link below to be redirected to the authentification process.
    	***Note: This link is only good for one hour after the form was first submitted.
    	$site_url/password/reset/key/" . $this->getId() . "/email/" . $this->getEmail();
    	
    	$mail->setBodyText($msg);
    	$mail->setFrom('the.web.bender@gmail.com', 'Admin');
    	$mail->addTo($this->getEmail());
    	$mail->setSubject("Reset Your Labtab Portal Password");
    	$mail->send($transport);
    }
    
    public function isExpired()
    {    
    	$tz = new \DateTimeZone(date_default_timezone_get());
    	$now = new \DateTime(null, $tz);
    	return ($now > $this->getExpDate());
    }
    
    public function activate($newpass)
    {
    	$this->setUsed(true);
    	$this->getEm()->persist($this);
    	    	
    	$user = $this->getEm()->find('Labtab\Entity\PortalUser',$this->getEmail());
    	$this->getEm()->persist($user->setPw($newpass));
    	
    	$this->getEm()->flush();    	    	
    }
    /***
     * Change a user from unverified to guest
     * this function is called from Auth Controller
     * @param unknown_type $hash
     * @return boolean
     */
    
    /*
    
    public function verifyEmail($hash)
    {
    	$sql = "select user_id from activation_hash where hash = '$hash' ";
    	$stmt = Zend_Registry::get('db')->query($sql);
    	$result = $stmt->fetchColumn();
    	if ($result)
    	{
    		// good hash bump user up to bending
    		$this->find($result)->setRoleId(GUEST_USER)->save();
    		Zend_Registry::get('db')->query("delete from activation_hash where hash = '$hash'");
    
    		return true;
    	}
    	else
    	{
    
    		return false;
    
    	}
    
    }
        
    public function sendPassword()
    {
    $config = Zend_Registry::get('config');
    $transport = new Zend_Mail_Transport_Smtp($config['smtp']['host'], $config['smtp']['config']);
    $mail = new Zend_Mail();
    $mail->setBodyText("Hi, here's your password: \n" . $this->getPassword());
    $mail->setFrom('mrkill123@gmail.com', 'Admin');
    $mail->addTo($this->getEmail(), 'San Elijo User');
    $mail->setSubject('Password Forgot');
    $mail->send($transport);
    }
    
    */
    

    
    
}
