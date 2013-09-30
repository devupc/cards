<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdParamSystem
 *
 * @ORM\Table(name="crd_param_system")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\ParamSystemRepository")
 */
class ParamSystem
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=60, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_num1", type="integer", nullable=true)
     */
    private $valueNum1;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_num2", type="integer", nullable=true)
     */
    private $valueNum2;

    /**
     * @var integer
     *
     * @ORM\Column(name="value_num3", type="integer", nullable=true)
     */
    private $valueNum3;

    /**
     * @var string
     *
     * @ORM\Column(name="value_alfa1", type="string", length=60, nullable=true)
     */
    private $valueAlfa1;

    /**
     * @var string
     *
     * @ORM\Column(name="value_alfa2", type="string", length=60, nullable=true)
     */
    private $valueAlfa2;

    /**
     * @var string
     *
     * @ORM\Column(name="value_alfa3", type="string", length=60, nullable=true)
     */
    private $valueAlfa3;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return CrdParamSystem
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CrdParamSystem
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set valueNum1
     *
     * @param integer $valueNum1
     * @return CrdParamSystem
     */
    public function setValueNum1($valueNum1)
    {
        $this->valueNum1 = $valueNum1;
    
        return $this;
    }

    /**
     * Get valueNum1
     *
     * @return integer 
     */
    public function getValueNum1()
    {
        return $this->valueNum1;
    }

    /**
     * Set valueNum2
     *
     * @param integer $valueNum2
     * @return CrdParamSystem
     */
    public function setValueNum2($valueNum2)
    {
        $this->valueNum2 = $valueNum2;
    
        return $this;
    }

    /**
     * Get valueNum2
     *
     * @return integer 
     */
    public function getValueNum2()
    {
        return $this->valueNum2;
    }

    /**
     * Set valueNum3
     *
     * @param integer $valueNum3
     * @return CrdParamSystem
     */
    public function setValueNum3($valueNum3)
    {
        $this->valueNum3 = $valueNum3;
    
        return $this;
    }

    /**
     * Get valueNum3
     *
     * @return integer 
     */
    public function getValueNum3()
    {
        return $this->valueNum3;
    }

    /**
     * Set valueAlfa1
     *
     * @param string $valueAlfa1
     * @return CrdParamSystem
     */
    public function setValueAlfa1($valueAlfa1)
    {
        $this->valueAlfa1 = $valueAlfa1;
    
        return $this;
    }

    /**
     * Get valueAlfa1
     *
     * @return string 
     */
    public function getValueAlfa1()
    {
        return $this->valueAlfa1;
    }

    /**
     * Set valueAlfa2
     *
     * @param string $valueAlfa2
     * @return CrdParamSystem
     */
    public function setValueAlfa2($valueAlfa2)
    {
        $this->valueAlfa2 = $valueAlfa2;
    
        return $this;
    }

    /**
     * Get valueAlfa2
     *
     * @return string 
     */
    public function getValueAlfa2()
    {
        return $this->valueAlfa2;
    }

    /**
     * Set valueAlfa3
     *
     * @param string $valueAlfa3
     * @return CrdParamSystem
     */
    public function setValueAlfa3($valueAlfa3)
    {
        $this->valueAlfa3 = $valueAlfa3;
    
        return $this;
    }

    /**
     * Get valueAlfa3
     *
     * @return string 
     */
    public function getValueAlfa3()
    {
        return $this->valueAlfa3;
    }
}