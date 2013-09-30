<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdCategory
 *
 * @ORM\Table(name="crd_category")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\CategoryRepository")
 */
class Category
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
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=150, nullable=true)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_group", type="integer", nullable=true)
     */
    private $orderGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \CrdGroupCategory
     *
     * @ORM\ManyToOne(targetEntity="GroupCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_category_id", referencedColumnName="id")
     * })
     */
    private $groupCategory;

    public function getStatusDisplay(){
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
     * Set name
     *
     * @param string $name
     * @return Category
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
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Category
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
     * Set orderGroup
     *
     * @param boolean $orderGroup
     * @return Category
     */
    public function setOrderGroup($orderGroup)
    {
        $this->orderGroup = $orderGroup;
    
        return $this;
    }

    /**
     * Get orderGroup
     *
     * @return boolean 
     */
    public function getOrderGroup()
    {
        return $this->orderGroup;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Category
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Category
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
     * @return Category
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
     * Set groupCategory
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\GroupCategory $groupCategory
     * @return Category
     */
    public function setGroupCategory(\Upc\Cards\Bundle\CardsBundle\Entity\GroupCategory $groupCategory = null)
    {
        $this->groupCategory = $groupCategory;
    
        return $this;
    }

    /**
     * Get groupCategory
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\GroupCategory 
     */
    public function getGroupCategory()
    {
        return $this->groupCategory;
    }
}