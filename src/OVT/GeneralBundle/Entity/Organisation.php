<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use OVT\UserBundle\Entity\User as User;

/**
 * Organisation
 *
 * @ORM\Table(name="organisation")
 * @ORM\Entity
 */
class Organisation
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phoneNumber", type="string", length=255, nullable=false)
     */
    private $phonenumber;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=false)
     */
    private $address;

     /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;


    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="hashLink", type="string", length=255, nullable=false)
     */
    private $hashlink;

     /**
     *  
     * @ORM\OneToMany(targetEntity="OVT\UserBundle\Entity\User", mappedBy="organisation")
     */
    
    private $admins;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Clientservicegroup", mappedBy="organisation")
     */
    private $clientservicegroup;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Service", inversedBy="organisation")
     * @ORM\JoinTable(name="organisation_service",
     *   joinColumns={
     *     @ORM\JoinColumn(name="organisation_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="service_id", referencedColumnName="id")
     *   }
     * )
     */
    private $service;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=true) 
     */
    private $isActive;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clientservicegroup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
        $this->admins= new   \Doctrine\Common\Collections\ArrayCollection();
        $this->isActive=1;
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
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set isActive
     * @param  integer $isActive 
     * @return Organisation 
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive ;
        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Organisation
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set phonenumber
     *
     * @param string $phonenumber
     * @return Organisation
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;
    
        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return string 
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Organisation
     */
    public function setAddress($address)
    {
        $this->address = $address;
    
        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Organisation
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Organisation
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
     * Set hashlink
     *
     * @param string $hashlink
     * @return Organisation
     */
    public function setHashlink($hashlink)
    {
        $this->hashlink = $hashlink;
    
        return $this;
    }

    /**
     * Get hashlink
     *
     * @return string 
     */
    public function getHashlink()
    {
        return $this->hashlink;
    }

   

    

    /**
     * Add clientservicegroup
     *
     * @param \OVT\GeneralBundle\Entity\Clientservicegroup $clientservicegroup
     * @return Organisation
     */
    public function addClientservicegroup(\OVT\GeneralBundle\Entity\Clientservicegroup $clientservicegroup)
    {
        $this->clientservicegroup[] = $clientservicegroup;
    
        return $this;
    }

    /**
     * Remove clientservicegroup
     *
     * @param \OVT\GeneralBundle\Entity\Clientservicegroup $clientservicegroup
     */
    public function removeClientservicegroup(\OVT\GeneralBundle\Entity\Clientservicegroup $clientservicegroup)
    {
        $this->clientservicegroup->removeElement($clientservicegroup);
    }

    /**
     * Get clientservicegroup
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClientservicegroup()
    {
        return $this->clientservicegroup;
    }

    /**
     * Add service
     *
     * @param \OVT\GeneralBundle\Entity\Service $service
     * @return Organisation
     */
    public function addService(\OVT\GeneralBundle\Entity\Service $service)
    {
        $this->service[] = $service;
    
        return $this;
    }

    /**
     * Remove service
     *
     * @param \OVT\GeneralBundle\Entity\Service $service
     */
    public function removeService(\OVT\GeneralBundle\Entity\Service $service)
    {
        $this->service->removeElement($service);
    }

    /**
     * Get service
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getService()
    {
        return $this->service;
    }

     /**
     * Add admin
     *
     * @param \OVT\UserBundle\Entity\User $user
     * @return Organisation
     */
    public function addAdmin(\OVT\UserBundle\Entity\User $user)
    {
        $this->admins[] = $user;
    
        return $this;
    }

    /**
     * Remove admin
     *
     * @param \OVT\UserBundle\Entity\User $user
     */
    public function removeAdmin(\OVT\UserBundle\Entity\User $user)
    {
        $this->admins->removeElement($user);
    }

    /**
     * Get admins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdmins()
    {
        return $this->admins;
    }
}
