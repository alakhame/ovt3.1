<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SessionOffer
 *
 * @ORM\Table(name="session_offer")
 * @ORM\Entity
 */
class SessionOffer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var Session
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Session")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sessionID", referencedColumnName="id")
     * })
     */    
    private $session;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serviceID", referencedColumnName="id")
     * })
     */
    private $service;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisationID", referencedColumnName="id")
     * })
     */
    private $organisation;

    /**
     * @var \Worker
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Worker")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workerID", referencedColumnName="id")
     * })
     */
    private $worker;

    /**
     * @var integer
     *
     * @ORM\Column(name="decision", type="integer", nullable=false)
     */
    private $decision;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->decision=0;    
    }
 
     

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set decision
     *
     * @param integer $decision
     * @return SessionOffer
     */
    public function setDecision($decision)
    {
        $this->decision = $decision;
    
        return $this;
    }

    /**
     * Get decision
     *
     * @return integer 
     */
    public function getDecision()
    {
        return $this->decision;
    }

    /**
     * Set session
     *
     * @param \OVT\GeneralBundle\Entity\Session $session
     * @return SessionOffer
     */
    public function setSession(\OVT\GeneralBundle\Entity\Session $session = null)
    {
        $this->session = $session;
    
        return $this;
    }

    /**
     * Get session
     *
     * @return \OVT\GeneralBundle\Entity\Session 
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set service
     *
     * @param \OVT\GeneralBundle\Entity\Service $service
     * @return SessionOffer
     */
    public function setService(\OVT\GeneralBundle\Entity\Service $service = null)
    {
        $this->service = $service;
    
        return $this;
    }

    /**
     * Get service
     *
     * @return \OVT\GeneralBundle\Entity\Service 
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set organisation
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $organisation
     * @return SessionOffer
     */
    public function setOrganisation(\OVT\GeneralBundle\Entity\Organisation $organisation = null)
    {
        $this->organisation = $organisation;
    
        return $this;
    }

    /**
     * Get organisation
     *
     * @return \OVT\GeneralBundle\Entity\Organisation 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }

    /**
     * Set worker
     *
     * @param \OVT\GeneralBundle\Entity\Worker $worker
     * @return SessionOffer
     */
    public function setWorker(\OVT\GeneralBundle\Entity\Worker $worker = null)
    {
        $this->worker = $worker;
    
        return $this;
    }

    /**
     * Get Worker
     *
     * @return \OVT\GeneralBundle\Entity\Worker 
     */
    public function getWorker()
    {
        return $this->worker;
    }
}