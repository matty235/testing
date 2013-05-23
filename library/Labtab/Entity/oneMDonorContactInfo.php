<?php

namespace Labtab\Entity;



/**
 * oneMDonorContactInfo
 *
 * @Table(name="1m_donor_contact_info")
 * @Entity
 */
class oneMDonorContactInfo extends AbstractEntity
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
     * @Column(name="ssn", type="string", length=15, precision=0, scale=0, nullable=false, unique=false)
     */
    private $ssn;

    /**
     * @var integer $donorContactInfoId
     *
     * @Column(name="donor_contact_info_id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $donorContactInfoId;


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
     * Set donorContactInfoId
     *
     * @param integer $donorContactInfoId
     */
    public function setDonorContactInfoId($donorContactInfoId)
    {
        $this->donorContactInfoId = $donorContactInfoId;
    }

    /**
     * Get donorContactInfoId
     *
     * @return integer $donorContactInfoId
     */
    public function getDonorContactInfoId()
    {
        return $this->donorContactInfoId;
    }
}
