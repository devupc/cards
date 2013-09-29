<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 * @ORM\Table(name="categoria", indexes={@ORM\Index(name="busqueda_idx", columns={"nombrecategoria", "ordengrupo", "estado"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\CategoriaRepository")
 */
class Categoria
{
    /**
     * @var integer
     * @ORM\Column(name="idcategoria", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nombrecategoria", type="string", length = 60, nullable=false)
     */
    private $nombrecategoria;

    /**
     * @var string
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var boolean
     * @ORM\Column(name="ordengrupo", type="boolean", nullable=true)
     */
    private $ordengrupo;

    /**
     * @var \DateTime
     * @ORM\Column(name="fecharegistro", type="datetime", nullable=true)
     */
    private $fecharegistro;

    /**
     * @var boolean
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Categoriagrupo
     * @ORM\ManyToOne(targetEntity="Categoriagrupo", inversedBy="tarjetas")
     * @ORM\JoinColumn(name="idcategoriagrupo", referencedColumnName="idcategoriagrupo", nullable=true)
     */
    private $idcategoriagrupo;


    /**
     * Get idcategoria
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombrecategoria
     *
     * @param string $nombrecategoria
     * @return Categoria
     */
    public function setNombrecategoria($nombrecategoria)
    {
        $this->nombrecategoria = $nombrecategoria;
    
        return $this;
    }

    /**
     * Get nombrecategoria
     *
     * @return string 
     */
    public function getNombrecategoria()
    {
        return $this->nombrecategoria;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Categoria
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    
        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set ordengrupo
     *
     * @param boolean $ordengrupo
     * @return Categoria
     */
    public function setOrdengrupo($ordengrupo)
    {
        $this->ordengrupo = $ordengrupo;
    
        return $this;
    }

    /**
     * Get ordengrupo
     *
     * @return boolean 
     */
    public function getOrdengrupo()
    {
        return $this->ordengrupo;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Categoria
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
     * @return Categoria
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
     * Set idcategoriagrupo
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Categoriagrupo $idcategoriagrupo
     * @return Categoria
     */
    public function setIdcategoriagrupo(\Upc\Cards\Bundle\CardsBundle\Entity\Categoriagrupo $idcategoriagrupo = null)
    {
        $this->idcategoriagrupo = $idcategoriagrupo;
    
        return $this;
    }

    /**
     * Get idcategoriagrupo
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Categoriagrupo 
     */
    public function getIdcategoriagrupo()
    {
        return $this->idcategoriagrupo;
    }
}