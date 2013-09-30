<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CrdUser
 *
 * @ORM\Table(name="crd_user")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="first_name", type="string", length=90, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=90, nullable=false)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="correoAlternativo", type="string", length=180, nullable=true)
     */
    private $correoalternativo;

    /**
     * @var string
     *
     * @ORM\Column(name="oauth_uid", type="string", length=200, nullable=true)
     */
    private $oauthUid;

    /**
     * @var string
     *
     * @ORM\Column(name="oauth_provider", type="string", length=200, nullable=true)
     */
    private $oauthProvider;

    /**
     * @var string
     *
     * @ORM\Column(name="algorithm", type="string", length=128, nullable=false)
     */
    private $algorithm;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=128, nullable=false)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=3, nullable=true)
     */
    private $gender;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="datetime", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=3, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="blocked_at", type="datetime", nullable=true)
     */
    private $blockedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \CrdUbigeo
     *
     * @ORM\ManyToOne(targetEntity="Ubigeo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ubigeo_id", referencedColumnName="id")
     * })
     */
    private $ubigeo;

    /**
     * @var \Permission
     *
     * @ORM\ManyToOne(targetEntity="Permission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="permission_id", referencedColumnName="id")
     * })
     */
    private $permission;



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
     * Set firstName
     *
     * @param string $firstName
     * @return CrdUser
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return CrdUser
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return CrdUser
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set correoalternativo
     *
     * @param string $correoalternativo
     * @return CrdUser
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
     * Set oauthUid
     *
     * @param string $oauthUid
     * @return CrdUser
     */
    public function setOauthUid($oauthUid)
    {
        $this->oauthUid = $oauthUid;
    
        return $this;
    }

    /**
     * Get oauthUid
     *
     * @return string 
     */
    public function getOauthUid()
    {
        return $this->oauthUid;
    }

    /**
     * Set oauthProvider
     *
     * @param string $oauthProvider
     * @return CrdUser
     */
    public function setOauthProvider($oauthProvider)
    {
        $this->oauthProvider = $oauthProvider;
    
        return $this;
    }

    /**
     * Get oauthProvider
     *
     * @return string 
     */
    public function getOauthProvider()
    {
        return $this->oauthProvider;
    }

    /**
     * Set algorithm
     *
     * @param string $algorithm
     * @return CrdUser
     */
    public function setAlgorithm($algorithm)
    {
        $this->algorithm = $algorithm;
    
        return $this;
    }

    /**
     * Get algorithm
     *
     * @return string 
     */
    public function getAlgorithm()
    {
        return $this->algorithm;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return CrdUser
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    
        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return CrdUser
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return CrdUser
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return CrdUser
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return CrdUser
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set blockedAt
     *
     * @param \DateTime $blockedAt
     * @return CrdUser
     */
    public function setBlockedAt($blockedAt)
    {
        $this->blockedAt = $blockedAt;
    
        return $this;
    }

    /**
     * Get blockedAt
     *
     * @return \DateTime 
     */
    public function getBlockedAt()
    {
        return $this->blockedAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return CrdUser
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return CrdUser
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set ubigeo
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Ubigeo $ubigeo
     * @return Ubigeo
     */
    public function setUbigeo(\Upc\Cards\Bundle\CardsBundle\Entity\Ubigeo $ubigeo = null)
    {
        $this->ubigeo = $ubigeo;
    
        return $this;
    }

    /**
     * Get ubigeo
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Ubigeo 
     */
    public function getUbigeo()
    {
        return $this->ubigeo;
    }

    /**
     * Set permission
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Permission $permission
     * @return CrdUser
     */
    public function setPermission(\Upc\Cards\Bundle\CardsBundle\Entity\Permission $permission = null)
    {
        $this->permission = $permission;
    
        return $this;
    }

    /**
     * Get permission
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\Permission 
     */
    public function getPermission()
    {
        return $this->permission;
    }
}