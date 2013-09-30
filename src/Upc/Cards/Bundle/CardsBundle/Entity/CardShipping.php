<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdCardShipping
 *
 * @ORM\Table(name="crd_card_shipping")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\CardShippingRepository")
 */
class CardShipping
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
     * @ORM\Column(name="idUsuario", type="integer", nullable=false)
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=20, nullable=true)
     */
    private $ipAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="recipient_treatment", type="string", length=30, nullable=true)
     */
    private $recipientTreatment;

    /**
     * @var string
     *
     * @ORM\Column(name="recipient_name", type="string", length=90, nullable=false)
     */
    private $recipientName;

    /**
     * @var string
     *
     * @ORM\Column(name="recipient_email", type="string", length=90, nullable=false)
     */
    private $recipientEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="remitter_name", type="string", length=90, nullable=false)
     */
    private $remitterName;

    /**
     * @var string
     *
     * @ORM\Column(name="remitter_email", type="string", length=90, nullable=false)
     */
    private $remitterEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="shipping_at", type="datetime", nullable=true)
     */
    private $shippingAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="received_at", type="datetime", nullable=true)
     */
    private $receivedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expired_at", type="datetime", nullable=true)
     */
    private $expiredAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

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
     * Set idusuario
     *
     * @param integer $idusuario
     * @return CardShipping
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    
        return $this;
    }

    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return CardShipping
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    
        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * Set recipientTreatment
     *
     * @param string $recipientTreatment
     * @return CardShipping
     */
    public function setRecipientTreatment($recipientTreatment)
    {
        $this->recipientTreatment = $recipientTreatment;
    
        return $this;
    }

    /**
     * Get recipientTreatment
     *
     * @return string 
     */
    public function getRecipientTreatment()
    {
        return $this->recipientTreatment;
    }

    /**
     * Set recipientName
     *
     * @param string $recipientName
     * @return CardShipping
     */
    public function setRecipientName($recipientName)
    {
        $this->recipientName = $recipientName;
    
        return $this;
    }

    /**
     * Get recipientName
     *
     * @return string 
     */
    public function getRecipientName()
    {
        return $this->recipientName;
    }

    /**
     * Set recipientEmail
     *
     * @param string $recipientEmail
     * @return CardShipping
     */
    public function setRecipientEmail($recipientEmail)
    {
        $this->recipientEmail = $recipientEmail;
    
        return $this;
    }

    /**
     * Get recipientEmail
     *
     * @return string 
     */
    public function getRecipientEmail()
    {
        return $this->recipientEmail;
    }

    /**
     * Set remitterName
     *
     * @param string $remitterName
     * @return CardShipping
     */
    public function setRemitterName($remitterName)
    {
        $this->remitterName = $remitterName;
    
        return $this;
    }

    /**
     * Get remitterName
     *
     * @return string 
     */
    public function getRemitterName()
    {
        return $this->remitterName;
    }

    /**
     * Set remitterEmail
     *
     * @param string $remitterEmail
     * @return CardShipping
     */
    public function setRemitterEmail($remitterEmail)
    {
        $this->remitterEmail = $remitterEmail;
    
        return $this;
    }

    /**
     * Get remitterEmail
     *
     * @return string 
     */
    public function getRemitterEmail()
    {
        return $this->remitterEmail;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return CardShipping
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return CardShipping
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
     * Set shippingAt
     *
     * @param \DateTime $shippingAt
     * @return CardShipping
     */
    public function setShippingAt($shippingAt)
    {
        $this->shippingAt = $shippingAt;
    
        return $this;
    }

    /**
     * Get shippingAt
     *
     * @return \DateTime 
     */
    public function getShippingAt()
    {
        return $this->shippingAt;
    }

    /**
     * Set receivedAt
     *
     * @param \DateTime $receivedAt
     * @return CardShipping
     */
    public function setReceivedAt($receivedAt)
    {
        $this->receivedAt = $receivedAt;
    
        return $this;
    }

    /**
     * Get receivedAt
     *
     * @return \DateTime 
     */
    public function getReceivedAt()
    {
        return $this->receivedAt;
    }

    /**
     * Set expiredAt
     *
     * @param \DateTime $expiredAt
     * @return CardShipping
     */
    public function setExpiredAt($expiredAt)
    {
        $this->expiredAt = $expiredAt;
    
        return $this;
    }

    /**
     * Get expiredAt
     *
     * @return \DateTime 
     */
    public function getExpiredAt()
    {
        return $this->expiredAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CardShipping
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
     * Set card
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Card $card
     * @return CardShipping
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