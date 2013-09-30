<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdCard
 *
 * @ORM\Table(name="crd_card")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\CardRepository")
 */
class Card
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
     * @ORM\Column(name="title", type="string", length=90, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=254, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="postal_type", type="integer", nullable=true)
     */
    private $postalType;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=150, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="name_file", type="string", length=30, nullable=true)
     */
    private $file;

    /**
     * @var string
     *
     * @ORM\Column(name="card_path", type="string", length=255, nullable=true)
     */
    private $cardPath;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gender", type="boolean", nullable=true)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available_guest", type="boolean", nullable=true)
     */
    private $availableGuest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \CrdUser
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="crd_user_id", referencedColumnName="id")
     * })
     */
    private $user;

    public function getEstadoDisplay(){
        return \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS[$this->getStatus()];
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
     * Set title
     *
     * @param string $title
     * @return Card
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Card
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
     * Set postalType
     *
     * @param integer $postalType
     * @return Card
     */
    public function setPostalType($postalType)
    {
        $this->postalType = $postalType;
    
        return $this;
    }

    /**
     * Get postalType
     *
     * @return integer 
     */
    public function getPostalType()
    {
        return $this->postalType;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Card
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    
        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Card
     */
    public function setFile($file)
    {
        $this->file = $file;
    
        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set path
     *
     * @param string $cardPath
     * @return Card
     */
    public function setCardPath($cardPath)
    {
        $this->cardPath = $path;
    
        return $this;
    }

    /**
     * Get cardPath
     *
     * @return string 
     */
    public function getCardPath()
    {
        return $this->cardPath;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     * @return Card
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Card
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set availableGuest
     *
     * @param boolean $availableGuest
     * @return Card
     */
    public function setAvailableGuest($availableGuest)
    {
        $this->availableGuest = $availableGuest;
    
        return $this;
    }

    /**
     * Get availableGuest
     *
     * @return boolean 
     */
    public function getAvailableGuest()
    {
        return $this->availableGuest;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Card
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Card
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\User $user
     * @return Card
     */
    public function setUser(\Upc\Cards\Bundle\CardsBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
    
}