<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parametrosistema
 * @ORM\Table(name="parametrosistema", indexes={@ORM\Index(name="busqueda_idx", columns={"nombre"})})
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\ParametrosistemaRepository")
 */
class Parametrosistema
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
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
     * @var string
     * @ORM\Column(name="descripcion", type="text", nullable=false)
     */
    private $descripcion;

    /**
     * @var integer
     * @ORM\Column(name="valornum1", type="integer", nullable=true)
     */
    private $valornum1;

    /**
     * @var integer
     * @ORM\Column(name="valornum2", type="integer", nullable=true)
     */
    private $valornum2;

    /**
     * @var integer
     * @ORM\Column(name="valornum3", type="integer", nullable=true)
     */
    private $valornum3;

    /**
     * @var string
     * @ORM\Column(name="valoralfa1", type="string", nullable=true)
     */
    private $valoralfa1;

    /**
     * @var string
     * @ORM\Column(name="valoralfa2", type="string", nullable=true)
     */
    private $valoralfa2;

    /**
     * @var string
     * @ORM\Column(name="valoralfa3", type="string", nullable=true)
     */
    private $valoralfa3;


    /**
     * Get idparametrosistema
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Parametrosistema
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Parametrosistema
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
     * Set valornum1
     *
     * @param integer $valornum1
     * @return Parametrosistema
     */
    public function setValornum1($valornum1)
    {
        $this->valornum1 = $valornum1;
    
        return $this;
    }

    /**
     * Get valornum1
     *
     * @return integer 
     */
    public function getValornum1()
    {
        return $this->valornum1;
    }

    /**
     * Set valornum2
     *
     * @param integer $valornum2
     * @return Parametrosistema
     */
    public function setValornum2($valornum2)
    {
        $this->valornum2 = $valornum2;
    
        return $this;
    }

    /**
     * Get valornum2
     *
     * @return integer 
     */
    public function getValornum2()
    {
        return $this->valornum2;
    }

    /**
     * Set valornum3
     *
     * @param integer $valornum3
     * @return Parametrosistema
     */
    public function setValornum3($valornum3)
    {
        $this->valornum3 = $valornum3;
    
        return $this;
    }

    /**
     * Get valornum3
     *
     * @return integer 
     */
    public function getValornum3()
    {
        return $this->valornum3;
    }

    /**
     * Set valoralfa1
     *
     * @param string $valoralfa1
     * @return Parametrosistema
     */
    public function setValoralfa1($valoralfa1)
    {
        $this->valoralfa1 = $valoralfa1;
    
        return $this;
    }

    /**
     * Get valoralfa1
     *
     * @return string 
     */
    public function getValoralfa1()
    {
        return $this->valoralfa1;
    }

    /**
     * Set valoralfa2
     *
     * @param string $valoralfa2
     * @return Parametrosistema
     */
    public function setValoralfa2($valoralfa2)
    {
        $this->valoralfa2 = $valoralfa2;
    
        return $this;
    }

    /**
     * Get valoralfa2
     *
     * @return string 
     */
    public function getValoralfa2()
    {
        return $this->valoralfa2;
    }

    /**
     * Set valoralfa3
     *
     * @param string $valoralfa3
     * @return Parametrosistema
     */
    public function setValoralfa3($valoralfa3)
    {
        $this->valoralfa3 = $valoralfa3;
    
        return $this;
    }

    /**
     * Get valoralfa3
     *
     * @return string 
     */
    public function getValoralfa3()
    {
        return $this->valoralfa3;
    }
}