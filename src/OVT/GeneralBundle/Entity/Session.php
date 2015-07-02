<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;
/**
 * Session
 *
 * @ORM\Table(name="session" )
 * @ORM\Entity
 */
class Session 
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="duration", type="time", nullable=true)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=true)
     */
    private $link;
 

    /**
     * @var \Worker
     *
     * @ORM\ManyToOne(targetEntity="Worker")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Worker", referencedColumnName="id")
     * })
     */
    private $worker;

    /**
     * @var \Document
     *
     * @ORM\ManyToOne(targetEntity="Document")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document", referencedColumnName="id")
     * })
     */
    private $document;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservationID", referencedColumnName="id")
     * })
     */
    /********************************private $reservationid;
    ******************************/

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OVT\UserBundle\Entity\User", inversedBy="session")
     * @ORM\JoinTable(name="session_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="session_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *   }
     * )
     */
    private $user;




    /**
     * @var \Service
     *
     * @ORM\ManyToOne(targetEntity="Service")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Service", referencedColumnName="id")
     * })
     */
    private $service;

    /**
     * @var \Organisation
     *
     * @ORM\ManyToOne(targetEntity="Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Organisation", referencedColumnName="id")
     * })
     */
    private $organisation;

    /**
     * @var \Client
     *
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Client", referencedColumnName="id")
     * })
     */
    private $client;



    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requestDate", type="datetime", nullable=true)
     */
    private $requestdate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startTime", type="datetime", nullable=true)
     */
    private $starttime;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endTime", type="datetime", nullable=true)
     */
    private $endtime;
    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=true)
     */
    private $state;
    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;





    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set duration
     *
     * @param \DateTime $duration
     * @return Session
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    
        return $this;
    }

    /**
     * Get duration
     *
     * @return \DateTime 
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Session
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Session
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

 

    /**
     * Set title
     *
     * @param string $title
     * @return Session
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }



    /**
     * Set worker
     *
     * @param \OVT\GeneralBundle\Entity\Worker $worker
     * @return Session
     */
    public function setWorker(\OVT\GeneralBundle\Entity\Worker $worker = null)
    {
        $this->worker = $worker;
    
        return $this;
    }

    /**
     * Get worker
     *
     * @return \OVT\GeneralBundle\Entity\Worker 
     */
    public function getWorker()
    {
        return $this->worker;
    }


     /**
     * Set Document
     *
     * @param \OVT\GeneralBundle\Entity\Document $document
     * @return Session
     */
    public function setDocument(\OVT\GeneralBundle\Entity\Document $document = null)
    {
        $this->document = $document;
    
        return $this;
    }

    /**
     * Get document
     *
     * @return \OVT\GeneralBundle\Entity\Document 
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * Set reservationid
     *
     * @param \OVT\GeneralBundle\Entity\Reservation $reservationid
     * @return Session
     */
    /******************public function setReservationid(\OVT\GeneralBundle\Entity\Reservation $reservationid = null)
    {
        $this->reservationid = $reservationid;
    
        return $this;
    }

    /**
     * Get reservationid
     *
     * @return \OVT\GeneralBundle\Entity\Reservation 
     */
   /********************* public function getReservationid()
    {
        return $this->reservationid;
    }

    /**
     * Add user
     *
     * @param \OVT\UserBundle\Entity\User $user
     * @return Session
     */
    public function addUser(User $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \OVT\UserBundle\Entity\User $user
     */
    public function removeUser(User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }


    /**
     * Set service
     *
     * @param \OVT\GeneralBundle\Entity\Service $service
     * @return Reservation
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
     * @return Reservation
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
     * Set client
     *
     * @param \OVT\GeneralBundle\Entity\Client $client
     * @return Reservation
     */
    public function setClient(\OVT\GeneralBundle\Entity\Client $client = null)
    {
        $this->client = $client;
    
        return $this;
    }

    /**
     * Get client
     *
     * @return \OVT\GeneralBundle\Entity\Client 
     */
    public function getClient()
    {
        return $this->client;
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
     * Set requestdate
     *
     * @param \DateTime $requestdate
     * @return Reservation
     */
    public function setRequestdate($requestdate)
    {
        $this->requestdate = $requestdate;
    
        return $this;
    }
    /**
     * Get requestdate
     *
     * @return \DateTime 
     */
    public function getRequestdate()
    {
        return $this->requestdate;
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
}
