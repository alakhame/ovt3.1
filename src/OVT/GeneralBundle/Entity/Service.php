<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Service
 *
 * @ORM\Table(name="service")
 * @ORM\Entity
 */
class Service
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
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Organisation", mappedBy="service")
     */
    private $organisation;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organisation = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString(){
        return $this->getName();
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
     * @return Service
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
     * Set description
     *
     * @param string $description
     * @return Service
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
     * Add organisation
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $organisation
     * @return Service
     */
    public function addOrganisation(\OVT\GeneralBundle\Entity\Organisation $organisation)
    {
        $this->organisation[] = $organisation;
    
        return $this;
    }

    /**
     * Remove organisation
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $organisation
     */
    public function removeOrganisation(\OVT\GeneralBundle\Entity\Organisation $organisation)
    {
        $this->organisation->removeElement($organisation);
    }

    /**
     * Get organisation
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrganisation()
    {
        return $this->organisation;
    }
}
