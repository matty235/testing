<?php

namespace Labtab\Entity;



/**
 * SpecimenFirstView
 *
 * @Table(name="specimen_first_view")
 * @Entity
 */
class SpecimenFirstView extends AbstractEntity
{
    /**
     * @var string $number
     *
     * @Column(name="number", type="string", length=200, nullable=false)
     * @Id
     */
    private $number;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=200, nullable=true)
     */
    private $email;

    /**
     * @var datetime $dateTimeSealResponse
     *
     * @Column(name="date_time_seal_response", type="datetime", nullable=true)
     */
    private $dateTimeSealResponse;

    /**
     * @var integer $sealCondition
     *
     * @Column(name="seal_condition", type="integer", nullable=true)
     */
    private $sealCondition;

    /**
     * @var integer $orgContacted
     *
     * @Column(name="org_contacted", type="integer", nullable=true)
     */
    private $orgContacted;

    /**
     * @var datetime $dateTimeOrgContacted
     *
     * @Column(name="date_time_org_contacted", type="datetime", nullable=true)
     */
    private $dateTimeOrgContacted;

    /**
     * @var string $emailOrgContacted
     *
     * @Column(name="email_org_contacted", type="string", length=200, nullable=true)
     */
    private $emailOrgContacted;


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
    public function getNumber()
    {
        return $this->number;
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
     * Set dateTimeSealResponse
     *
     * @param datetime $dateTimeSealResponse
     */
    public function setDateTimeSealResponse($dateTimeSealResponse)
    {
        $this->dateTimeSealResponse = $dateTimeSealResponse;
    }

    /**
     * Get dateTimeSealResponse
     *
     * @return datetime $dateTimeSealResponse
     */
    public function getDateTimeSealResponse()
    {
        return $this->dateTimeSealResponse;
    }

    /**
     * Set sealCondition
     *
     * @param integer $sealCondition
     */
    public function setSealCondition($sealCondition)
    {
        $this->sealCondition = $sealCondition;
    }

    /**
     * Get sealCondition
     *
     * @return integer $sealCondition
     */
    public function getSealCondition()
    {
        return $this->sealCondition;
    }

    /**
     * Set orgContacted
     *
     * @param integer $orgContacted
     */
    public function setOrgContacted($orgContacted)
    {
        $this->orgContacted = $orgContacted;
    }

    /**
     * Get orgContacted
     *
     * @return integer $orgContacted
     */
    public function getOrgContacted()
    {
        return $this->orgContacted;
    }

    /**
     * Set dateTimeOrgContacted
     *
     * @param datetime $dateTimeOrgContacted
     */
    public function setDateTimeOrgContacted($dateTimeOrgContacted)
    {
        $this->dateTimeOrgContacted = $dateTimeOrgContacted;
    }

    /**
     * Get dateTimeOrgContacted
     *
     * @return datetime $dateTimeOrgContacted
     */
    public function getDateTimeOrgContacted()
    {
        return $this->dateTimeOrgContacted;
    }

    /**
     * Set emailOrgContacted
     *
     * @param string $emailOrgContacted
     */
    public function setEmailOrgContacted($emailOrgContacted)
    {
        $this->emailOrgContacted = $emailOrgContacted;
    }

    /**
     * Get emailOrgContacted
     *
     * @return string $emailOrgContacted
     */
    public function getEmailOrgContacted()
    {
        return $this->emailOrgContacted;
    }
    
    /**
     * Get getSealConditionName
     *
     * @return string
     */
    public function getSealConditionName()
    {
    	return Enum_Seal::$types[$this->sealCondition];
    }
    
}
