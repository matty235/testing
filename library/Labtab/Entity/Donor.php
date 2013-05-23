<?php

namespace Labtab\Entity;

/**
 * Donor
 *
 * @Table(name="donor")
 * @Entity
 */
class Donor extends AbstractEntity
{
    /**
     * @var string $ssn
     *
     * @Column(name="ssn", type="string", length=15, nullable=false)
     * @Id
     */
    private $ssn;



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
     * Get ssn
     *
     * @return string $ssn
     */
    public function setSsn($ssn)
    {
    	$this->ssn = $ssn;
    }    
}
