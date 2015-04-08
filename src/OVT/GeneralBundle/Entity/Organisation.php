<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use OVT\UserBundle\Entity\User as User;

/**
 * Organisation
 *
 * @ORM\Table(name="organisation", indexes={@ORM\Index(name="adminID", columns={"adminID"})})
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="OVT\UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="adminID", referencedColumnName="id")
     * })
     */
    private $adminid;

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
     * Constructor
     */
    public function __construct()
    {
        $this->clientservicegroup = new \Doctrine\Common\Collections\ArrayCollection();
        $this->service = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set adminid
     *
     * @param \OVT\UserBundle\Entity\User $adminid
     * @return Organisation
     */
    public function setAdminid(User $adminid = null)
    {
        $this->adminid = $adminid;
    
        return $this;
    }

    /**
     * Get adminid
     *
     * @return \OVT\UserBundle\Entity\User 
     */
    public function getAdminid()
    {
        return $this->adminid;
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
}
