<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collaboration
 *
 * @ORM\Table(name="collaboration")
 * @ORM\Entity
 */
class Collaboration
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
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="service", referencedColumnName="id")
     * })
     */
    private $service;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="provider", referencedColumnName="id")
     * })
     */
    private $provider;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="org_client", referencedColumnName="id")
     * })
     */
    private $orgClient;
 


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
     * Set service
     *
     * @param \OVT\GeneralBundle\Entity\Service $service
     * @return Collaboration
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
     * Set provider
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $provider
     * @return Collaboration
     */
    public function setProvider(\OVT\GeneralBundle\Entity\Organisation $provider = null)
    {
        $this->provider = $provider;
    
        return $this;
    }

    /**
     * Get provider
     *
     * @return \OVT\GeneralBundle\Entity\Organisation 
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Set orgClient
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $orgClient
     * @return Collaboration
     */
    public function setOrgClient(\OVT\GeneralBundle\Entity\Organisation $orgClient = null)
    {
        $this->orgClient = $orgClient;
    
        return $this;
    }

    /**
     * Get orgClient
     *
     * @return \OVT\GeneralBundle\Entity\Organisation 
     */
    public function getOrgClient()
    {
        return $this->orgClient;
    }

   
}
