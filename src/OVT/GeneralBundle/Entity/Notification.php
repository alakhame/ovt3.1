<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="notifierID", columns={"notifierID"})})
 * @ORM\Entity
 */
class Notification
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
     * @var integer
     *
     * @ORM\Column(name="seen", type="integer", nullable=false)
     */
    private $seen;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="OVT\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="notifierID", referencedColumnName="id")
     * })
     */
    private $notifierid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="OVT\UserBundle\Entity\User", inversedBy="notification")
     * @ORM\JoinTable(name="notification_user",
     *   joinColumns={
     *     @ORM\JoinColumn(name="notification_id", referencedColumnName="id")
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
        $this->seen = 0;
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
     * Set message
     *
     * @param string $message
     * @return Notification
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
    *Get seen
    *
    *@return seen
    */
    public function getSeen(){
        return $this->seen;
    } 

    /**
    *Set seen
    *
    *@param integer $seen
    *@return Notification
    */
    public function setSeen($seen){
        $this->seen = $seen;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set notifierid
     *
     * @param \OVT\UserBundle\Entity\User $notifierid
     * @return Notification
     */
    public function setNotifierid(User $notifierid = null)
    {
        $this->notifierid = $notifierid;
    
        return $this;
    }

    /**
     * Get notifierid
     *
     * @return \OVT\UserBundle\Entity\User 
     */
    public function getNotifierid()
    {
        return $this->notifierid;
    }

    /**
     * Add user
     *
     * @param \OVT\UserBundle\Entity\User $user
     * @return Notification
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
