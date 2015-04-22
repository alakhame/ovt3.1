<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;

/**
 * Worker
 *
 * @ORM\Table(name="worker" )
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
     *   @ORM\JoinColumn(name="group", referencedColumnName="id")
     * })
     */
    private $group;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="OVT\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;
    


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
     * Set group
     *
     * @param \OVT\GeneralBundle\Entity\Providerservicegroup $group
     * @return Worker
     */
    public function setGroup(\OVT\GeneralBundle\Entity\Providerservicegroup $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \OVT\GeneralBundle\Entity\Providerservicegroup 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set user
     *
     * @param \OVT\UserBundle\Entity\User $user
     * @return Worker
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \OVT\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
