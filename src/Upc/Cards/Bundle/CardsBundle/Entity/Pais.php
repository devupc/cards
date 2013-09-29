<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 * @ORM\Table(name="pais", indexes={@ORM\Index(name="busqueda_idx", columns={"nombre"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\PaisRepository")
 */
class Pais
{
    /**
     * @var integer
     * @ORM\Column(name="idpais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length = 60, nullable=false)
     */
    private $nombre;

    /**
     * @var boolean
     * @ORM\Column(name="visible", type="boolean", nullable=true)
     */
    private $visible;


    /**
     * Get idpais
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombrees
     *
     * @param string $nombre
     * @return Pais
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombrees
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return Pais
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