<?php

namespace OVT\GeneralBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clientservicegroup
 *
 * @ORM\Table(name="clientservicegroup")
 * @ORM\Entity
 */
class Clientservicegroup
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
     * @var integer
     *
     * @ORM\Column(name="moneyLimit", type="integer", nullable=false)
     */
    private $moneylimit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Organisation", inversedBy="clientservicegroup")
     * @ORM\JoinTable(name="clientservicegroup_organisation",
     *   joinColumns={
     *     @ORM\JoinColumn(name="clientservicegroup_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="organisation_id", referencedColumnName="id")
     *   }
     * )
     */
    private $organisation;



    /**
     * @var OVT\GeneralBundle\Entity\Organisation
     *
     * @ORM\ManyToOne(targetEntity="OVT\GeneralBundle\Entity\Organisation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner", referencedColumnName="id")
     * })
     */
    private $orgClientOwner;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->organisation = new \Doctrine\Common\Collections\ArrayCollection();
    }


     /**
     * Set orgClientOwner
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $org
     * @return Providerservicegroup
     */
    public function setOrgClientOwner(\OVT\GeneralBundle\Entity\Organisation $org = null)
    {
        $this->orgClientOwner = $org;
    
        return $this;
    }

    /**
     * Get orgClientOwner
     *
     * @return \OVT\GeneralBundle\Entity\Organisation 
     */
    public function getOrgClientOwner()
    {
        return $this->orgClientOwner;
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
     * @return Clientservicegroup
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
     * @return Clientservicegroup
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
     * Set moneylimit
     *
     * @param integer $moneylimit
     * @return Clientservicegroup
     */
    public function setMoneylimit($moneylimit)
    {
        $this->moneylimit = $moneylimit;
    
        return $this;
    }

    /**
     * Get moneylimit
     *
     * @return integer 
     */
    public function getMoneylimit()
    {
        return $this->moneylimit;
    }

    /**
     * Add organisation
     *
     * @param \OVT\GeneralBundle\Entity\Organisation $organisation
     * @return Clientservicegroup
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
