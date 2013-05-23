<?php

namespace Labtab\Entity;



/**
 * DonorWebTracker
 *
 * @Table(name="donor_web_tracker")
 * @Entity
 */
class DonorWebTracker extends AbstractEntity
{
    /**
     * @var integer $donorWebTracker
     *
     * @Column(name="donor_web_tracker", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $donorWebTracker;



    /**
     * Get donorWebTracker
     *
     * @return integer $donorWebTracker
     */
    public function getDonorWebTracker()
    {
        return $this->donorWebTracker;
    }
}
