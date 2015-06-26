<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message" )
 * @ORM\Entity
 */
class Message
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
     * @ORM\Column(name="content", type="text",   nullable=true)
     */
    private $content;

     /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="OVT\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sender", referencedColumnName="id")
     * })
     */
    private $sender ;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="OVT\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="receiver", referencedColumnName="id")
     * })
     */
    private $receiver ;

    /**
     * @var \Session
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Session")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="session", referencedColumnName="id")
     * })
     */
    private $session ;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date ;

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
     * Set content
     *
     * @param string $content
     * @return Message
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Message
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set sender
     *
     * @param \OVT\UserBundle\Entity\User $sender
     * @return Message
     */
    public function setSender(\OVT\UserBundle\Entity\User $sender = null)
    {
        $this->sender = $sender;
    
        return $this;
    }

    /**
     * Get sender
     *
     * @return \OVT\UserBundle\Entity\User 
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set receiver
     *
     * @param \OVT\UserBundle\Entity\User $receiver
     * @return Message
     */
    public function setReceiver(\OVT\UserBundle\Entity\User $receiver = null)
    {
        $this->receiver = $receiver;
    
        return $this;
    }

    /**
     * Get receiver
     *
     * @return \OVT\UserBundle\Entity\User 
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Set session
     *
     * @param \OVT\GeneralBundle\Entity\Session $session
     * @return Message
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
}
