<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Tarjeta
 * @ORM\Table(name="tarjeta", indexes={@ORM\Index(name="busqueda_idx", columns={"titulo", "tipopostal"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\TarjetaRepository")
 * @ORM\HasLifecycleCallbacks
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
    
    private $temp;
    private $path;

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setRutatarjeta(UploadedFile $file = null)
    {
        $this->rutatarjeta = $file;
        // check if we have an old image path
        if (isset($this->path)) {
            // store the old name to delete after the update
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        if (null !== $this->getRutatarjeta()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->path = $filename.'.'.$this->getRutatarjeta()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->getRutatarjeta()) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getRutatarjeta()->move($this->getUploadRootDir(), $this->path);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir().'/'.$this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->rutatarjeta = null;
    }

    /**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if (isset($this->temp)) {
            unlink($this->temp);
        }
    }
}