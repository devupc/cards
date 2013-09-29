<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacto
 * @ORM\Table(name="contacto", indexes={@ORM\Index(name="busqueda_idx", columns={"nombre", "apellido"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\ContactoRepository")
 */
class Contacto
{
    /**
     * @var integer
     * @ORM\Column(name="idcontacto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/
    private $id;

    /**
     * @var string
     * @ORM\Column(name="trato", type="string", length = 40, nullable=false)
     */
    private $trato;

    /**
     * @var string
     * @ORM\Column(name="nombre", type="string", length = 60, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     * @ORM\Column(name="apellido", type="string", length = 60, nullable=false)
     */
    private $apellido;

    /**
     * @var string
     * @ORM\Column(name="correo", type="string", length = 60, nullable=false)
     */
    private $correo;

    /**
     * @var string
     * @ORM\Column(name="correoalternativo", type="string", length = 60, nullable=true)
     */
    private $correoalternativo;

    /**
     * @var boolean
     * @ORM\Column(name="genero", type="integer", nullable=true)
     */
    private $genero;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechacumpleanos", type="datetime", nullable=true)
     */
    private $fechacumpleanos;

    /**
     * @var integer
     * @ORM\Column(name="tipoorigen", type="integer", nullable=true)
     */
    private $tipoorigen;

    /**
     * @var integer
     * @ORM\Column(name="tiporelacion", type="integer", nullable=true)
     */
    private $tiporelacion;

    /**
     * @var integer
     * @ORM\Column(name="estadocivil", type="integer", nullable=true)
     */
    private $estadocivil;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechaaniversario", type="datetime", nullable=true)
     */
    private $fechaaniversario;

    /**
     * @var string
     * @ORM\Column(name="telefonomovil", type="string", length=14, nullable=true)
     */
    private $telefonomovil;

    /**
     * @var string
     * @ORM\Column(name="telefonofijo", type="string",length=7, nullable=true)
     */
    private $telefonofijo;

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
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="usuarios")
     * @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario", nullable=true)
     */
    private $idusuario;


    /**
     * Get idcontacto
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set trato
     *
     * @param string $trato
     * @return Contacto
     */
    public function setTrato($trato)
    {
        $this->trato = $trato;
    
        return $this;
    }

    /**
     * Get trato
     *
     * @return string 
     */
    public function getTrato()
    {
        return $this->trato;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Contacto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return Contacto
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Contacto
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    
        return $this;
    }

    /**
     * Get correo
     *
     * @return string 
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set correoalternativo
     *
     * @param string $correoalternativo
     * @return Contacto
     */
    public function setCorreoalternativo($correoalternativo)
    {
        $this->correoalternativo = $correoalternativo;
    
        return $this;
    }

    /**
     * Get correoalternativo
     *
     * @return string 
     */
    public function getCorreoalternativo()
    {
        return $this->correoalternativo;
    }

    /**
     * Set genero
     *
     * @param boolean $genero
     * @return Contacto
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
     * Set fechacumpleanos
     *
     * @param \DateTime $fechacumpleanos
     * @return Contacto
     */
    public function setFechacumpleanos($fechacumpleanos)
    {
        $this->fechacumpleanos = $fechacumpleanos;
    
        return $this;
    }

    /**
     * Get fechacumpleanos
     *
     * @return \DateTime 
     */
    public function getFechacumpleanos()
    {
        return $this->fechacumpleanos;
    }

    /**
     * Set tipoorigen
     *
     * @param integer $tipoorigen
     * @return Contacto
     */
    public function setTipoorigen($tipoorigen)
    {
        $this->tipoorigen = $tipoorigen;
    
        return $this;
    }

    /**
     * Get tipoorigen
     *
     * @return integer 
     */
    public function getTipoorigen()
    {
        return $this->tipoorigen;
    }

    /**
     * Set tiporelacion
     *
     * @param integer $tiporelacion
     * @return Contacto
     */
    public function setTiporelacion($tiporelacion)
    {
        $this->tiporelacion = $tiporelacion;
    
        return $this;
    }

    /**
     * Get tiporelacion
     *
     * @return integer 
     */
    public function getTiporelacion()
    {
        return $this->tiporelacion;
    }

    /**
     * Set estadocivil
     *
     * @param integer $estadocivil
     * @return Contacto
     */
    public function setEstadocivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;
    
        return $this;
    }

    /**
     * Get estadocivil
     *
     * @return integer 
     */
    public function getEstadocivil()
    {
        return $this->estadocivil;
    }

    /**
     * Set fechaaniversario
     *
     * @param \DateTime $fechaaniversario
     * @return Contacto
     */
    public function setFechaaniversario($fechaaniversario)
    {
        $this->fechaaniversario = $fechaaniversario;
    
        return $this;
    }

    /**
     * Get fechaaniversario
     *
     * @return \DateTime 
     */
    public function getFechaaniversario()
    {
        return $this->fechaaniversario;
    }

    /**
     * Set telefonomovil
     *
     * @param string $telefonomovil
     * @return Contacto
     */
    public function setTelefonomovil($telefonomovil)
    {
        $this->telefonomovil = $telefonomovil;
    
        return $this;
    }

    /**
     * Get telefonomovil
     *
     * @return string 
     */
    public function getTelefonomovil()
    {
        return $this->telefonomovil;
    }

    /**
     * Set telefonofijo
     *
     * @param string $telefonofijo
     * @return Contacto
     */
    public function setTelefonofijo($telefonofijo)
    {
        $this->telefonofijo = $telefonofijo;
    
        return $this;
    }

    /**
     * Get telefonofijo
     *
     * @return string 
     */
    public function getTelefonofijo()
    {
        return $this->telefonofijo;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Contacto
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
     * @return Contacto
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
     * Set idusuario
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Usuario $idusuario
     * @return Contacto
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