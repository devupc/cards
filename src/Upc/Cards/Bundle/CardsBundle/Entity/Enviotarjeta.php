<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enviotarjeta
 * @ORM\Table(name="enviotarjeta", indexes={@ORM\Index(name="busqueda_idx", columns={"idusuario", "fechaenvio", "fecharecepcion"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\EnvioTarjetaRepository")
 */
class Enviotarjeta
{
    /**
     * @var integer
     * @ORM\Column(name="idenviotarjeta", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     **/
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="idusuario", type="integer", nullable=false)
     */
    private $idusuario;

    /**
     * @var string
     * @ORM\Column(name="direccionip", type="string", length = 20, nullable=false)
     */
    private $direccionip;

    /**
     * @var string
     * @ORM\Column(name="destinatariotrato", type="string", length = 40, nullable=false)
     */
    private $destinatariotrato;

    /**
     * @var string
     * @ORM\Column(name="destinatarionombre", type="string", length = 40, nullable=false)
     */
    private $destinatarionombre;

    /**
     * @var string
     * @ORM\Column(name="destinatariocorreo", type="string", length = 40, nullable=false)
     */
    private $destinatariocorreo;

    /**
     * @var string
     * @ORM\Column(name="remitentenombre", type="string", length = 40, nullable=false)
     */
    private $remitentenombre;

    /**
     * @var string
    * @ORM\Column(name="remitentecorreo", type="string", length = 40, nullable=false)
     */
    private $remitentecorreo;

    /**
     * @var string
     * @ORM\Column(name="mensaje", type="text", nullable=false)
     */
    private $mensaje;

    /**
     * @var \DateTime
     * @ORM\Column(name="fecharegistro", type="datetime", nullable=true)
     */
    private $fecharegistro;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechaenvio", type="datetime", nullable=true)
     */
    private $fechaenvio;

    /**
     * @var \DateTime
     * @ORM\Column(name="fecharecepcion", type="datetime", nullable=true)
     */
    private $fecharecepcion;

    /**
     * @var \DateTime
     * @ORM\Column(name="fechavence", type="datetime", nullable=true)
     */
    private $fechavence;

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
     * Get idenviotarjeta
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
     * @return Enviotarjeta
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
     * Set direccionip
     *
     * @param string $direccionip
     * @return Enviotarjeta
     */
    public function setDireccionip($direccionip)
    {
        $this->direccionip = $direccionip;
    
        return $this;
    }

    /**
     * Get direccionip
     *
     * @return string 
     */
    public function getDireccionip()
    {
        return $this->direccionip;
    }

    /**
     * Set destinatariotrato
     *
     * @param string $destinatariotrato
     * @return Enviotarjeta
     */
    public function setDestinatariotrato($destinatariotrato)
    {
        $this->destinatariotrato = $destinatariotrato;
    
        return $this;
    }

    /**
     * Get destinatariotrato
     *
     * @return string 
     */
    public function getDestinatariotrato()
    {
        return $this->destinatariotrato;
    }

    /**
     * Set destinatarionombre
     *
     * @param string $destinatarionombre
     * @return Enviotarjeta
     */
    public function setDestinatarionombre($destinatarionombre)
    {
        $this->destinatarionombre = $destinatarionombre;
    
        return $this;
    }

    /**
     * Get destinatarionombre
     *
     * @return string 
     */
    public function getDestinatarionombre()
    {
        return $this->destinatarionombre;
    }

    /**
     * Set destinatariocorreo
     *
     * @param string $destinatariocorreo
     * @return Enviotarjeta
     */
    public function setDestinatariocorreo($destinatariocorreo)
    {
        $this->destinatariocorreo = $destinatariocorreo;
    
        return $this;
    }

    /**
     * Get destinatariocorreo
     *
     * @return string 
     */
    public function getDestinatariocorreo()
    {
        return $this->destinatariocorreo;
    }

    /**
     * Set remitentenombre
     *
     * @param string $remitentenombre
     * @return Enviotarjeta
     */
    public function setRemitentenombre($remitentenombre)
    {
        $this->remitentenombre = $remitentenombre;
    
        return $this;
    }

    /**
     * Get remitentenombre
     *
     * @return string 
     */
    public function getRemitentenombre()
    {
        return $this->remitentenombre;
    }

    /**
     * Set remitentecorreo
     *
     * @param string $remitentecorreo
     * @return Enviotarjeta
     */
    public function setRemitentecorreo($remitentecorreo)
    {
        $this->remitentecorreo = $remitentecorreo;
    
        return $this;
    }

    /**
     * Get remitentecorreo
     *
     * @return string 
     */
    public function getRemitentecorreo()
    {
        return $this->remitentecorreo;
    }

    /**
     * Set mensaje
     *
     * @param string $mensaje
     * @return Enviotarjeta
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;
    
        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set fecharegistro
     *
     * @param \DateTime $fecharegistro
     * @return Enviotarjeta
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
     * Set fechaenvio
     *
     * @param \DateTime $fechaenvio
     * @return Enviotarjeta
     */
    public function setFechaenvio($fechaenvio)
    {
        $this->fechaenvio = $fechaenvio;
    
        return $this;
    }

    /**
     * Get fechaenvio
     *
     * @return \DateTime 
     */
    public function getFechaenvio()
    {
        return $this->fechaenvio;
    }

    /**
     * Set fecharecepcion
     *
     * @param \DateTime $fecharecepcion
     * @return Enviotarjeta
     */
    public function setFecharecepcion($fecharecepcion)
    {
        $this->fecharecepcion = $fecharecepcion;
    
        return $this;
    }

    /**
     * Get fecharecepcion
     *
     * @return \DateTime 
     */
    public function getFecharecepcion()
    {
        return $this->fecharecepcion;
    }

    /**
     * Set fechavence
     *
     * @param \DateTime $fechavence
     * @return Enviotarjeta
     */
    public function setFechavence($fechavence)
    {
        $this->fechavence = $fechavence;
    
        return $this;
    }

    /**
     * Get fechavence
     *
     * @return \DateTime 
     */
    public function getFechavence()
    {
        return $this->fechavence;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     * @return Enviotarjeta
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
     * @return Enviotarjeta
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