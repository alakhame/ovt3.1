<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;
use OVT\GeneralBundle\Entity\Reservation as Reservation;
/**
 * Session
 *
 * @ORM\Table(name="session", indexes={@ORM\Index(name="reservationID", columns={"reservationID"}), @ORM\Index(name="workerID", columns={"workerID"})})
 * @ORM\Entity
 */
class Session extends Reservation
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
     * @var \DateTime
     *
     * @ORM\Column(name="duration", type="time", nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="link", type="string", length=255, nullable=false)
     */
    private $link;

    /**
     * @var \Worker
     *
     * @ORM\ManyToOne(targetEntity="Worker")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workerID", referencedColumnName="id")
     * })
     */
    private $workerid;

    /**
     * @var \Reservation
     *
     * @ORM\ManyToOne(targetEntity="Reservation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="reservationID", referencedColumnName="id")
     * })
     */
    private $reservationid;

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
     * Set workerid
     *
     * @param \OVT\GeneralBundle\Entity\Worker $workerid
     * @return Session
     */
    public function setWorkerid(\OVT\GeneralBundle\Entity\Worker $workerid = null)
    {
        $this->workerid = $workerid;
    
        return $this;
    }

    /**
     * Get workerid
     *
     * @return \OVT\GeneralBundle\Entity\Worker 
     */
    public function getWorkerid()
    {
        return $this->workerid;
    }

    /**
     * Set reservationid
     *
     * @param \OVT\GeneralBundle\Entity\Reservation $reservationid
     * @return Session
     */
    public function setReservationid(\OVT\GeneralBundle\Entity\Reservation $reservationid = null)
    {
        $this->reservationid = $reservationid;
    
        return $this;
    }

    /**
     * Get reservationid
     *
     * @return \OVT\GeneralBundle\Entity\Reservation 
     */
    public function getReservationid()
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
}
