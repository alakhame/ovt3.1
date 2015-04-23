<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OVT\UserBundle\Entity\User as User;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="user", columns={"user"}), @ORM\Index(name="group", columns={"clientGroup"})})
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
     *   @ORM\JoinColumn(name="clientGroup", referencedColumnName="id")
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
     * Set group
     *
     * @param \OVT\GeneralBundle\Entity\Clientservicegroup $group
     * @return Client
     */
    public function setGroup(\OVT\GeneralBundle\Entity\Clientservicegroup $group = null)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \OVT\GeneralBundle\Entity\Clientservicegroup 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set user
     *
     * @param \OVT\UserBundle\Entity\User $user
     * @return Client
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
