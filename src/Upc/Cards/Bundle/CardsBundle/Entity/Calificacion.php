<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Calificacion
 * @ORM\Table(name="calificacion")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\CalificacionRepository")
 */
class Calificacion
{
    /**
     * @var integer
     * @ORM\Column(name="idcalificacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="cuentaenvio", type="integer", nullable=true)
     */
    private $cuentaenvio;

    /**
     * @var integer
     * @ORM\Column(name="cuentamegusta", type="integer", nullable=true)
     */
    private $cuentamegusta;

    /**
     * @var integer
     * @ORM\Column(name="cuentarecomendado", type="integer", nullable=true)
     */
    private $cuentarecomendado;

    /**
     * @var integer
     * @ORM\Column(name="hombre1", type="integer", nullable=true)
     */
    private $hombre1;

    /**
     * @var integer
     * @ORM\Column(name="hombre2", type="integer", nullable=true)
     */
    private $hombre2;

    /**
     * @var integer
     * @ORM\Column(name="hombre3", type="integer", nullable=true)
     */
    private $hombre3;

    /**
     * @var integer
     * @ORM\Column(name="hombre4", type="integer", nullable=true)
     */
    private $hombre4;

    /**
     * @var integer
     * @ORM\Column(name="hombre5", type="integer", nullable=true)
     */
    private $hombre5;

    /**
     * @var integer
     * @ORM\Column(name="mujer1", type="integer", nullable=true)
     */
    private $mujer1;

    /**
     * @var integer
     * @ORM\Column(name="mujer2", type="integer", nullable=true)
     */
    private $mujer2;

    /**
     * @var integer
     * @ORM\Column(name="mujer3", type="integer", nullable=true)
     */
    private $mujer3;

    /**
     * @var integer
     * @ORM\Column(name="mujer4", type="integer", nullable=true)
     */
    private $mujer4;

    /**
     * @var integer
     * @ORM\Column(name="mujer5", type="integer", nullable=true)
     */
    private $mujer5;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechaultimacalificacion", type="datetime", nullable=true)
     */
    private $fechaultimacalificacion;

    /**
     * @var boolean
     * @ORM\Column(name="estado", type="boolean", nullable=true)
     */
    private $estado;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta
     * @ORM\ManyToOne(targetEntity="Tarjeta", inversedBy="tarjetas")
     * @ORM\JoinColumn(name="idtarjeta", referencedColumnName="idtarjeta", nullable=true)
     */
    private $idtarjeta;


    /**
     * Get idcalificacion
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cuentaenvio
     *
     * @param integer $cuentaenvio
     * @return Calificacion
     */
    public function setCuentaenvio($cuentaenvio)
    {
        $this->cuentaenvio = $cuentaenvio;
    
        return $this;
    }

    /**
     * Get cuentaenvio
     *
     * @return integer 
     */
    public function getCuentaenvio()
    {
        return $this->cuentaenvio;
    }

    /**
     * Set cuentamegusta
     *
     * @param integer $cuentamegusta
     * @return Calificacion
     */
    public function setCuentamegusta($cuentamegusta)
    {
        $this->cuentamegusta = $cuentamegusta;
    
        return $this;
    }

    /**
     * Get cuentamegusta
     *
     * @return integer 
     */
    public function getCuentamegusta()
    {
        return $this->cuentamegusta;
    }

    /**
     * Set cuentarecomendado
     *
     * @param integer $cuentarecomendado
     * @return Calificacion
     */
    public function setCuentarecomendado($cuentarecomendado)
    {
        $this->cuentarecomendado = $cuentarecomendado;
    
        return $this;
    }

    /**
     * Get cuentarecomendado
     *
     * @return integer 
     */
    public function getCuentarecomendado()
    {
        return $this->cuentarecomendado;
    }

    /**
     * Set hombre1
     *
     * @param integer $hombre1
     * @return Calificacion
     */
    public function setHombre1($hombre1)
    {
        $this->hombre1 = $hombre1;
    
        return $this;
    }

    /**
     * Get hombre1
     *
     * @return integer 
     */
    public function getHombre1()
    {
        return $this->hombre1;
    }

    /**
     * Set hombre2
     *
     * @param integer $hombre2
     * @return Calificacion
     */
    public function setHombre2($hombre2)
    {
        $this->hombre2 = $hombre2;
    
        return $this;
    }

    /**
     * Get hombre2
     *
     * @return integer 
     */
    public function getHombre2()
    {
        return $this->hombre2;
    }

    /**
     * Set hombre3
     *
     * @param integer $hombre3
     * @return Calificacion
     */
    public function setHombre3($hombre3)
    {
        $this->hombre3 = $hombre3;
    
        return $this;
    }

    /**
     * Get hombre3
     *
     * @return integer 
     */
    public function getHombre3()
    {
        return $this->hombre3;
    }

    /**
     * Set hombre4
     *
     * @param integer $hombre4
     * @return Calificacion
     */
    public function setHombre4($hombre4)
    {
        $this->hombre4 = $hombre4;
    
        return $this;
    }

    /**
     * Get hombre4
     *
     * @return integer 
     */
    public function getHombre4()
    {
        return $this->hombre4;
    }

    /**
     * Set hombre5
     *
     * @param integer $hombre5
     * @return Calificacion
     */
    public function setHombre5($hombre5)
    {
        $this->hombre5 = $hombre5;
    
        return $this;
    }

    /**
     * Get hombre5
     *
     * @return integer 
     */
    public function getHombre5()
    {
        return $this->hombre5;
    }

    /**
     * Set mujer1
     *
     * @param integer $mujer1
     * @return Calificacion
     */
    public function setMujer1($mujer1)
    {
        $this->mujer1 = $mujer1;
    
        return $this;
    }

    /**
     * Get mujer1
     *
     * @return integer 
     */
    public function getMujer1()
    {
        return $this->mujer1;
    }

    /**
     * Set mujer2
     *
     * @param integer $mujer2
     * @return Calificacion
     */
    public function setMujer2($mujer2)
    {
        $this->mujer2 = $mujer2;
    
        return $this;
    }

    /**
     * Get mujer2
     *
     * @return integer 
     */
    public function getMujer2()
    {
        return $this->mujer2;
    }

    /**
     * Set mujer3
     *
     * @param integer $mujer3
     * @return Calificacion
     */
    public function setMujer3($mujer3)
    {
        $this->mujer3 = $mujer3;
    
        return $this;
    }

    /**
     * Get mujer3
     *
     * @return integer 
     */
    public function getMujer3()
    {
        return $this->mujer3;
    }

    /**
     * Set mujer4
     *
     * @param integer $mujer4
     * @return Calificacion
     */
    public function setMujer4($mujer4)
    {
        $this->mujer4 = $mujer4;
    
        return $this;
    }

    /**
     * Get mujer4
     *
     * @return integer 
     */
    public function getMujer4()
    {
        return $this->mujer4;
    }

    /**
     * Set mujer5
     *
     * @param integer $mujer5
     * @return Calificacion
     */
    public function setMujer5($mujer5)
    {
        $this->mujer5 = $mujer5;
    
        return $this;
    }

    /**
     * Get mujer5
     *
     * @return integer 
     */
    public function getMujer5()
    {
        return $this->mujer5;
    }

    /**
     * Set fechaultimacalificacion
     *
     * @param \DateTime $fechaultimacalificacion
     * @return Calificacion
     */
    public function setFechaultimacalificacion($fechaultimacalificacion)
    {
        $this->fechaultimacalificacion = $fechaultimacalificacion;
    
        return $this;
    }

    /**
     * Get fechaultimacalificacion
     *
     * @return \DateTime 
     */
    public function getFechaultimacalificacion()
    {
        return $this->fechaultimacalificacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Calificacion
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
     * @return Calificacion
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
    
}