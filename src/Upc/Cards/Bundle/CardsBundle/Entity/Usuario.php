<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 * @ORM\Table(name="usuario", indexes={@ORM\Index(name="busqueda_idx", columns={"nombres", "apellidos"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var integer
     * @ORM\Column(name="idusuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/
    private $id;

    /**
     * @var string
     * @ORM\Column(name="nombres", type="string", length=100, nullable=false)
     */
    private $nombres;

    /**
     * @var string
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=false)
     */
    private $apellidos;

    /**
     * @var string
     * @ORM\Column(name="correo", type="string", length=100, nullable=false)
     */
    private $correo;

    /**
     * @var string
     * @ORM\Column(name="correoalternativo", type="string", length=100, nullable=true)
     */
    private $correoalternativo;

    /**
     * @var string
     * @ORM\Column(name="usuario", type="string", length=40, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     * @ORM\Column(name="contrasena", type="string", length=128, nullable=false)
     */
    private $contrasena;

    /**
     * @var string
     * @ORM\Column(name="usuariofacebook", type="string", length=100, nullable=true)
     */
    private $usuariofacebook;
    
    /**
     * @var integer
     * @ORM\Column(name="genero", type="integer", nullable=false)
     */
    private $genero;

    /**
     * @var string
     * @ORM\Column(name="ciudad", type="string", length=60, nullable=true)
     */
    private $ciudad;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechanacimiento", type="datetime", nullable=false)
     */
    private $fechanacimiento;

    /**
     * @var integer
     * @ORM\Column(name="contadorintentoinicio", type="integer", nullable=true)
     */
    private $contadorintentoinicio;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechabloqueotemporal", type="datetime", nullable=false)
     */
    private $fechabloqueotemporal;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechaultimoinicio", type="datetime", nullable=false)
     */
    private $fechaultimoinicio;

    /**
     * @var boolean
     * @ORM\Column(name="estado", type="boolean", nullable=false) 
     */
    private $estado;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Perfil
     * @ORM\ManyToOne(targetEntity="Perfil", inversedBy="")
     * @ORM\JoinColumn(name="idperfil", referencedColumnName="idperfil", nullable=true)
     */
    private $idperfil;

    /**
     * @var \Upc\Cards\Bundle\CardsBundle\Entity\Pais
     * @ORM\ManyToOne(targetEntity="Pais", inversedBy="")
     * @ORM\JoinColumn(name="idpais", referencedColumnName="idpais", nullable=true)
     */
    private $idpais;


    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Usuario
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    
        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    
        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set correo
     *
     * @param string $correo
     * @return Usuario
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
     * @return Usuario
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
     * Set usuario
     *
     * @param string $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     * @return Usuario
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    
        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string 
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set usuariofacebook
     *
     * @param string $usuariofacebook
     * @return Usuario
     */
    public function setUsuariofacebook($usuariofacebook)
    {
        $this->usuariofacebook = $usuariofacebook;
    
        return $this;
    }

    /**
     * Get usuariofacebook
     *
     * @return string 
     */
    public function getUsuariofacebook()
    {
        return $this->usuariofacebook;
    }

    /**
     * Set contrasenafacebook
     *
     * @param string $contrasenafacebook
     * @return Usuario
     */
    public function setContrasenafacebook($contrasenafacebook)
    {
        $this->contrasenafacebook = $contrasenafacebook;
    
        return $this;
    }

    /**
     * Get contrasenafacebook
     *
     * @return string 
     */
    public function getContrasenafacebook()
    {
        return $this->contrasenafacebook;
    }

    /**
     * Set genero
     *
     * @param boolean $genero
     * @return Usuario
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
     * Set ciudad
     *
     * @param string $ciudad
     * @return Usuario
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set fechanacimiento
     *
     * @param \DateTime $fechanacimiento
     * @return Usuario
     */
    public function setFechanacimiento($fechanacimiento)
    {
        $this->fechanacimiento = $fechanacimiento;
    
        return $this;
    }

    /**
     * Get fechanacimiento
     *
     * @return \DateTime 
     */
    public function getFechanacimiento()
    {
        return $this->fechanacimiento;
    }

    /**
     * Set contadorintentoinicio
     *
     * @param boolean $contadorintentoinicio
     * @return Usuario
     */
    public function setContadorintentoinicio($contadorintentoinicio)
    {
        $this->contadorintentoinicio = $contadorintentoinicio;
    
        return $this;
    }

    /**
     * Get contadorintentoinicio
     *
     * @return boolean 
     */
    public function getContadorintentoinicio()
    {
        return $this->contadorintentoinicio;
    }

    /**
     * Set fechabloqueotemporal
     *
     * @param \DateTime $fechabloqueotemporal
     * @return Usuario
     */
    public function setFechabloqueotemporal($fechabloqueotemporal)
    {
        $this->fechabloqueotemporal = $fechabloqueotemporal;
    
        return $this;
    }

    /**
     * Get fechabloqueotemporal
     *
     * @return \DateTime 
     */
    public function getFechabloqueotemporal()
    {
        return $this->fechabloqueotemporal;
    }

    /**
     * Set fechaultimoinicio
     *
     * @param \DateTime $fechaultimoinicio
     * @return Usuario
     */
    public function setFechaultimoinicio($fechaultimoinicio)
    {
        $this->fechaultimoinicio = $fechaultimoinicio;
    
        return $this;
    }

    /**
     * Get fechaultimoinicio
     *
     * @return \DateTime 
     */
    public function getFechaultimoinicio()
    {
        return $this->fechaultimoinicio;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Usuario
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
     * Set idperfil
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Perfil $idperfil
     * @return Usuario
     */
    public function setIdperfil(\Upc\Cards\Bundle\CardsBundle\Entity\Perfil $idperfil = null)
    {
        $this->idperfil = $idperfil;
    
        return $this;
    }

    /**
     * Get idperfil
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Perfil 
     */
    public function getIdperfil()
    {
        return $this->idperfil;
    }

    /**
     * Set idpais
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Pais $idpais
     * @return Usuario
     */
    public function setIdpais(\Upc\Cards\Bundle\CardsBundle\Entity\Pais $idpais = null)
    {
        $this->idpais = $idpais;
    
        return $this;
    }

    /**
     * Get idpais
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Pais 
     */
    public function getIdpais()
    {
        return $this->idpais;
    }
}