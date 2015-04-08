<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="userID", columns={"userID"}), @ORM\Index(name="groupID", columns={"groupID"})})
 * @ORM\Entity
 */
class Client
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
     * @ORM\Column(name="language", type="string", length=255, nullable=false)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="equipements", type="string", length=255, nullable=false)
     */
    private $equipements;

    /**
     * @var \Clientservicegroup
     *
     * @ORM\ManyToOne(targetEntity="Clientservicegroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupID", referencedColumnName="id")
     * })
     */
    private $groupid;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="OVT\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userID", referencedColumnName="id")
     * })
     */
    private $userid;



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
     * Set language
     *
     * @param string $language
     * @return Client
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set equipements
     *
     * @param string $equipements
     * @return Client
     */
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;
    
        return $this;
    }

    /**
     * Get equipements
     *
     * @return string 
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set groupid
     *
     * @param \OVT\GeneralBundle\Entity\Clientservicegroup $groupid
     * @return Client
     */
    public function setGroupid(\OVT\GeneralBundle\Entity\Clientservicegroup $groupid = null)
    {
        $this->groupid = $groupid;
    
        return $this;
    }

    /**
     * Get groupid
     *
     * @return \OVT\GeneralBundle\Entity\Clientservicegroup 
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Set userid
     *
     * @param \OVT\UserBundle\Entity\User $userid
     * @return Client
     */
    public function setUserid(User $userid = null)
    {
        $this->userid = $userid;
    
        return $this;
    }

    /**
     * Get userid
     *
     * @return \OVT\UserBundle\Entity\User 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
