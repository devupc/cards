<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdRate
 *
 * @ORM\Table(name="crd_rate")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\RateRepository")
 */
class Rate
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
     * @var integer
     *
     * @ORM\Column(name="shipping_account", type="integer", nullable=true)
     */
    private $shippingAccount;

    /**
     * @var integer
     *
     * @ORM\Column(name="like_account", type="integer", nullable=true)
     */
    private $likeAccount;

    /**
     * @var integer
     *
     * @ORM\Column(name="recommend_account", type="integer", nullable=true)
     */
    private $recommendAccount;

    /**
     * @var integer
     *
     * @ORM\Column(name="man1", type="integer", nullable=true)
     */
    private $man1;

    /**
     * @var integer
     *
     * @ORM\Column(name="man2", type="integer", nullable=true)
     */
    private $man2;

    /**
     * @var integer
     *
     * @ORM\Column(name="man3", type="integer", nullable=true)
     */
    private $man3;

    /**
     * @var integer
     *
     * @ORM\Column(name="man4", type="integer", nullable=true)
     */
    private $man4;

    /**
     * @var integer
     *
     * @ORM\Column(name="man5", type="integer", nullable=true)
     */
    private $man5;

    /**
     * @var integer
     *
     * @ORM\Column(name="woman1", type="integer", nullable=true)
     */
    private $woman1;

    /**
     * @var integer
     *
     * @ORM\Column(name="woman2", type="integer", nullable=true)
     */
    private $woman2;

    /**
     * @var integer
     *
     * @ORM\Column(name="woman3", type="integer", nullable=true)
     */
    private $woman3;

    /**
     * @var integer
     *
     * @ORM\Column(name="woman4", type="integer", nullable=true)
     */
    private $woman4;

    /**
     * @var integer
     *
     * @ORM\Column(name="woman5", type="integer", nullable=true)
     */
    private $woman5;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_modified", type="datetime", nullable=true)
     */
    private $lastModified;

    /**
     * @var boolean
     *
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    private $status;

    /**
     * @var \CrdCard
     *
     * @ORM\ManyToOne(targetEntity="Card")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="card_id", referencedColumnName="id")
     * })
     */
    private $card;

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
     * Set shippingAccount
     *
     * @param integer $shippingAccount
     * @return Rate
     */
    public function setShippingAccount($shippingAccount)
    {
        $this->shippingAccount = $shippingAccount;
    
        return $this;
    }

    /**
     * Get shippingAccount
     *
     * @return integer 
     */
    public function getShippingAccount()
    {
        return $this->shippingAccount;
    }

    /**
     * Set likeAccount
     *
     * @param integer $likeAccount
     * @return Rate
     */
    public function setLikeAccount($likeAccount)
    {
        $this->likeAccount = $likeAccount;
    
        return $this;
    }

    /**
     * Get likeAccount
     *
     * @return integer 
     */
    public function getLikeAccount()
    {
        return $this->likeAccount;
    }

    /**
     * Set recommendAccount
     *
     * @param integer $recommendAccount
     * @return Rate
     */
    public function setRecommendAccount($recommendAccount)
    {
        $this->recommendAccount = $recommendAccount;
    
        return $this;
    }

    /**
     * Get recommendAccount
     *
     * @return integer 
     */
    public function getRecommendAccount()
    {
        return $this->recommendAccount;
    }

    /**
     * Set man1
     *
     * @param integer $man1
     * @return Rate
     */
    public function setMan1($man1)
    {
        $this->man1 = $man1;
    
        return $this;
    }

    /**
     * Get man1
     *
     * @return integer 
     */
    public function getMan1()
    {
        return $this->man1;
    }

    /**
     * Set man2
     *
     * @param integer $man2
     * @return Rate
     */
    public function setMan2($man2)
    {
        $this->man2 = $man2;
    
        return $this;
    }

    /**
     * Get man2
     *
     * @return integer 
     */
    public function getMan2()
    {
        return $this->man2;
    }

    /**
     * Set man3
     *
     * @param integer $man3
     * @return Rate
     */
    public function setMan3($man3)
    {
        $this->man3 = $man3;
    
        return $this;
    }

    /**
     * Get man3
     *
     * @return integer 
     */
    public function getMan3()
    {
        return $this->man3;
    }

    /**
     * Set man4
     *
     * @param integer $man4
     * @return Rate
     */
    public function setMan4($man4)
    {
        $this->man4 = $man4;
    
        return $this;
    }

    /**
     * Get man4
     *
     * @return integer 
     */
    public function getMan4()
    {
        return $this->man4;
    }

    /**
     * Set man5
     *
     * @param integer $man5
     * @return Rate
     */
    public function setMan5($man5)
    {
        $this->man5 = $man5;
    
        return $this;
    }

    /**
     * Get man5
     *
     * @return integer 
     */
    public function getMan5()
    {
        return $this->man5;
    }

    /**
     * Set woman1
     *
     * @param integer $woman1
     * @return Rate
     */
    public function setWoman1($woman1)
    {
        $this->woman1 = $woman1;
    
        return $this;
    }

    /**
     * Get woman1
     *
     * @return integer 
     */
    public function getWoman1()
    {
        return $this->woman1;
    }

    /**
     * Set woman2
     *
     * @param integer $woman2
     * @return Rate
     */
    public function setWoman2($woman2)
    {
        $this->woman2 = $woman2;
    
        return $this;
    }

    /**
     * Get woman2
     *
     * @return integer 
     */
    public function getWoman2()
    {
        return $this->woman2;
    }

    /**
     * Set woman3
     *
     * @param integer $woman3
     * @return Rate
     */
    public function setWoman3($woman3)
    {
        $this->woman3 = $woman3;
    
        return $this;
    }

    /**
     * Get woman3
     *
     * @return integer 
     */
    public function getWoman3()
    {
        return $this->woman3;
    }

    /**
     * Set woman4
     *
     * @param integer $woman4
     * @return Rate
     */
    public function setWoman4($woman4)
    {
        $this->woman4 = $woman4;
    
        return $this;
    }

    /**
     * Get woman4
     *
     * @return integer 
     */
    public function getWoman4()
    {
        return $this->woman4;
    }

    /**
     * Set woman5
     *
     * @param integer $woman5
     * @return Rate
     */
    public function setWoman5($woman5)
    {
        $this->woman5 = $woman5;
    
        return $this;
    }

    /**
     * Get woman5
     *
     * @return integer 
     */
    public function getWoman5()
    {
        return $this->woman5;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Rate
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;
    
        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Rate
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set card
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Card $card
     * @return Rate
     */
    public function setCard(\Upc\Cards\Bundle\CardsBundle\Entity\Card $card = null)
    {
        $this->card = $card;
    
        return $this;
    }

    /**
     * Get card
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Card 
     */
    public function getCard()
    {
        return $this->card;
    }
}