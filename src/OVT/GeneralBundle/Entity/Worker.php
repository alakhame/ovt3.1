<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;

/**
 * Worker
 *
 * @ORM\Table(name="worker", indexes={@ORM\Index(name="userID", columns={"userID"}), @ORM\Index(name="groupID", columns={"groupID"})})
 * @ORM\Entity
 */
class Worker
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
     * @var \Providerservicegroup
     *
     * @ORM\ManyToOne(targetEntity="Providerservicegroup")
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
     * @return Worker
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
     * Set groupid
     *
     * @param \OVT\GeneralBundle\Entity\Providerservicegroup $groupid
     * @return Worker
     */
    public function setGroupid(\OVT\GeneralBundle\Entity\Providerservicegroup $groupid = null)
    {
        $this->groupid = $groupid;
    
        return $this;
    }

    /**
     * Get groupid
     *
     * @return \OVT\GeneralBundle\Entity\Providerservicegroup 
     */
    public function getGroupid()
    {
        return $this->groupid;
    }

    /**
     * Set userid
     *
     * @param \OVT\UserBundle\Entity\User $userid
     * @return Worker
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
