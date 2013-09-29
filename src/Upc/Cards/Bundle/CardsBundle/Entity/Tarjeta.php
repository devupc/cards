<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tarjeta
 * @ORM\Table(name="tarjeta", indexes={@ORM\Index(name="busqueda_idx", columns={"titulo", "tipopostal"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\TarjetaRepository")
 */
class Tarjeta
{
    /**
     * @var integer
     * @ORM\Column(name="idtarjeta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/    
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="tipopostal", type="integer", nullable=true)
     */
    private $tipopostal;

    /**
     * @var string
     * @ORM\Column(name="titulo", type="string", length= 100, nullable=false)
     */
    private $titulo;

    /**
     * @var string
     * @ORM\Column(name="descripcion", type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     * @ORM\Column(name="etiquetabusqueda", type="string",length= 100, nullable=true)
     */
    private $etiquetabusqueda;

    /**
     * @var string
     * @ORM\Column(name="rutatarjeta", type="string",length= 100, nullable=true)
     */
    private $rutatarjeta;

    /**
     * @var string
     * @ORM\Column(name="rutaminiatura", type="string",length= 100, nullable=true)
     */
    private $rutaminiatura;

    /**
     * @var boolean
     * @ORM\Column(name="genero", type="boolean", nullable=true)
     */
    private $genero;

    /**
     * @var boolean
     * @ORM\Column(name="invitadodisponible", type="boolean", nullable=true)
     */
    private $invitadodisponible;

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
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Usuario
     */
    private $idusuarioregistra;


    /**
     * Get idtarjeta
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set tipopostal
     *
     * @param integer $tipopostal
     * @return Tarjeta
     */
    public function setTipopostal($tipopostal)
    {
        $this->tipopostal = $tipopostal;
    
        return $this;
    }

    /**
     * Get tipopostal
     *
     * @return integer 
     */
    public function getTipopostal()
    {
        return $this->tipopostal;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Tarjeta
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    
        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tarjeta
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
     * Set etiquetabusqueda
     *
     * @param string $etiquetabusqueda
     * @return Tarjeta
     */
    public function setEtiquetabusqueda($etiquetabusqueda)
    {
        $this->etiquetabusqueda = $etiquetabusqueda;
    
        return $this;
    }

    /**
     * Get etiquetabusqueda
     *
     * @return string 
     */
    public function getEtiquetabusqueda()
    {
        return $this->etiquetabusqueda;
    }

    /**
     * Set nombrefichero
     *
     * @param string $nombrefichero
     * @return Tarjeta
     */
    public function setNombrefichero($nombrefichero)
    {
        $this->nombrefichero = $nombrefichero;
    
        return $this;
    }

    /**
     * Get nombrefichero
     *
     * @return string 
     */
    public function getNombrefichero()
    {
        return $this->nombrefichero;
    }

    /**
     * Set rutatarjeta
     *
     * @param string $rutatarjeta
     * @return Tarjeta
     */
    public function setRutatarjeta($rutatarjeta)
    {
        $this->rutatarjeta = $rutatarjeta;
    
        return $this;
    }

    /**
     * Get rutatarjeta
     *
     * @return string 
     */
    public function getRutatarjeta()
    {
        return $this->rutatarjeta;
    }

    /**
     * Set rutaminiatura
     *
     * @param string $rutaminiatura
     * @return Tarjeta
     */
    public function setRutaminiatura($rutaminiatura)
    {
        $this->rutaminiatura = $rutaminiatura;
    
        return $this;
    }

    /**
     * Get rutaminiatura
     *
     * @return string 
     */
    public function getRutaminiatura()
    {
        return $this->rutaminiatura;
    }

    /**
     * Set genero
     *
     * @param boolean $genero
     * @return Tarjeta
     */
    public function setGenero($genero)
    {
        $this->genero = $genero;
    
        return $this;
    }

    /**
     * Get genero
     *
     * @return boolean 
     */
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set invitadodisponible
     *
     * @param boolean $invitadodisponible
     * @return Tarjeta
     */
    public function setInvitadodisponible($invitadodisponible)
    {
        $this->invitadodisponible = $invitadodisponible;
    
        return $this;
    }

    /**
     * Get invitadodisponible
     *
     * @return boolean 
     */
    public function getInvitadodisponible()
    {
        return $this->invitadodisponible;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Tarjeta
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
     * @return Tarjeta
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
     * Set idusuarioregistra
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Usuario $idusuarioregistra
     * @return Tarjeta
     */
    public function setIdusuarioregistra(\Upc\Cards\Bundle\CardsBundle\Entity\Usuario $idusuarioregistra = null)
    {
        $this->idusuarioregistra = $idusuarioregistra;
    
        return $this;
    }

    /**
     * Get idusuarioregistra
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Usuario 
     */
    public function getIdusuarioregistra()
    {
        return $this->idusuarioregistra;
    }
}