<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="organisationID", columns={"organisationID"}), @ORM\Index(name="clientID", columns={"clientID"}), @ORM\Index(name="serviceID", columns={"serviceID"})})
 * @ORM\Entity
 */
class Reservation
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="resquestDate", type="date", nullable=false)
     */
    private $resquestdate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="date", nullable=false)
     */
    private $starttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="date", nullable=false)
     */
    private $endtime;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serviceID", referencedColumnName="id")
     * })
     */
    private $serviceid;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="organisationID", referencedColumnName="id")
     * })
     */
    private $organisationid;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="clientID", referencedColumnName="id")
     * })
     */
    private $clientid;



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
     * Set description
     *
     * @param string $description
     * @return Reservation
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set resquestdate
     *
     * @param \DateTime $resquestdate
     * @return Reservation
     */
    public function setResquestdate($resquestdate)
    {
        $this->resquestdate = $resquestdate;
    
        return $this;
    }

    /**
     * Get resquestdate
     *
     * @return \DateTime 
     */
    public function getResquestdate()
    {
        return $this->resquestdate;
    }

    /**
     * Set starttime
     *
     * @param \DateTime $starttime
     * @return Reservation
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;
    
        return $this;
    }

    /**
     * Get starttime
     *
     * @return \DateTime 
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Set endtime
     *
     * @param \DateTime $endtime
     * @return Reservation
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;
    
        return $this;
    }

    /**
     * Get endtime
     *
     * @return \DateTime 
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Reservation
     */
    public function setState($state)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Reservation
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set serviceid
     *
     * @param \OVT\GeneralBundle\Entity\Service $serviceid
     * @return Reservation
     */
    public function setServiceid(\OVT\GeneralBundle\Entity\Service $serviceid = null)
    {
        $this->serviceid = $serviceid;
    
        return $this;
    }

    /**
     * Get serviceid
     *
     * @return \OVT\GeneralBundle\Entity\Service 
     */
    public function getServiceid()
    {
        return $this->serviceid;
    }

    /**
     * Set organisationid
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $organisationid
     * @return Reservation
     */
    public function setOrganisationid(\OVT\GeneralBundle\Entity\Organisation $organisationid = null)
    {
        $this->organisationid = $organisationid;
    
        return $this;
    }

    /**
     * Get organisationid
     *
     * @return \OVT\GeneralBundle\Entity\Organisation 
     */
    public function getOrganisationid()
    {
        return $this->organisationid;
    }

    /**
     * Set clientid
     *
     * @param \OVT\GeneralBundle\Entity\Client $clientid
     * @return Reservation
     */
    public function setClientid(\OVT\GeneralBundle\Entity\Client $clientid = null)
    {
        $this->clientid = $clientid;
    
        return $this;
    }

    /**
     * Get clientid
     *
     * @return \OVT\GeneralBundle\Entity\Client 
     */
    public function getClientid()
    {
        return $this->clientid;
    }
}
