<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdUbigeo
 *
 * @ORM\Table(name="crd_ubigeo")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\UbigeoRepository")
 */
class Ubigeo
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=6, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="parend_id", type="string", length=6, nullable=true)
     */
    private $parendId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var boolean
     *
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;



    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set parendId
     *
     * @param string $parendId
     * @return CrdUbigeo
     */
    public function setParendId($parendId)
    {
        $this->parendId = $parendId;
    
        return $this;
    }

    /**
     * Get parendId
     *
     * @return string 
     */
    public function getParendId()
    {
        return $this->parendId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CrdUbigeo
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
     * Set visible
     *
     * @param boolean $visible
     * @return CrdUbigeo
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    
        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }
}