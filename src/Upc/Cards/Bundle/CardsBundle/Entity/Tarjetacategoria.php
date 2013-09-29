<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarjetacategoria
 * @ORM\Table(name="tarjetacategoria", indexes={@ORM\Index(name="busqueda_idx", columns={"idcategoria", "idusuario", "idtarjeta"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\TarjetacategoriaRepository")
 */
class Tarjetacategoria
{
    /**
     * @var integer
     * @ORM\Column(name="idtarjetacategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/
    private $id;

    /**
     * @var \DateTime
     * @ORM\Column(name="fecharegistro", type="datetime", nullable=false)
     */
    private $fecharegistro;

    /**
     * @var boolean
     * @ORM\Column(name="estado", type="boolean", nullable=false)
     */
    private $estado;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta
     * @ORM\ManyToOne(targetEntity="Tarjeta", inversedBy="idtarjeta")
     * @ORM\JoinColumn(name="idtarjeta", referencedColumnName="idtarjeta", nullable=false)
     */
    private $idtarjeta;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Categoria
     * @ORM\ManyToOne(targetEntity="Categoria", inversedBy="")
     * @ORM\JoinColumn(name="idcategoria", referencedColumnName="idcategoria", nullable=false)
     */
    private $idcategoria;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Usuario
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="")
     * @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario", nullable=true)
     */
    private $idusuario;


    /**
     * Get idtarjetacategoria
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Tarjetacategoria
     */
    public function setFecharegistro($fecharegistro)
    {
        $this->fecharegistro = $fecharegistro;
    
        return $this;
    }

    /**
     * Get fecharegistro
     *
     * @return \DateTime 
     */
    public function getFecharegistro()
    {
        return $this->fecharegistro;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Tarjetacategoria
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set idtarjeta
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta $idtarjeta
     * @return Tarjetacategoria
     */
    public function setIdtarjeta(\Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta $idtarjeta = null)
    {
        $this->idtarjeta = $idtarjeta;
    
        return $this;
    }

    /**
     * Get idtarjeta
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta 
     */
    public function getIdtarjeta()
    {
        return $this->idtarjeta;
    }

    /**
     * Set idcategoria
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Categoria $idcategoria
     * @return Tarjetacategoria
     */
    public function setIdcategoria(\Upc\Cards\Bundle\CardsBundle\Entity\Categoria $idcategoria = null)
    {
        $this->idcategoria = $idcategoria;
    
        return $this;
    }

    /**
     * Get idcategoria
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Categoria 
     */
    public function getIdcategoria()
    {
        return $this->idcategoria;
    }

    /**
     * Set idusuario
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Usuario $idusuario
     * @return Tarjetacategoria
     */
    public function setIdusuario(\Upc\Cards\Bundle\CardsBundle\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;
    
        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Usuario 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}