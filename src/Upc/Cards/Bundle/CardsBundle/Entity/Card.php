<?php

namespace Upc\Cards\Bundle\CardsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * CrdCard
 *
 * @ORM\Table(name="crd_card")
 * @ORM\Entity(repositoryClass="Upc\Cards\Bundle\CardsBundle\Repository\CardRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Card {

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
     * @ORM\Column(name="title", type="string", length=90, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="postal_type", type="integer", nullable=true)
     */
    private $postalType;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=150, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="name_file", type="string", length=30, nullable=true)
     */
    private $filename;

    /**
     * @var string
     *
     * @ORM\Column(name="card_path", type="string", length=255, nullable=true)
     */
    private $cardPath;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gender", type="boolean", nullable=true)
     */
    private $gender;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status;

    /**
     * @var boolean
     *
     * @ORM\Column(name="available_guest", type="boolean", nullable=true)
     */
    private $availableGuest;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \CrdUser
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="crd_user_id", referencedColumnName="id")
     * })
     */
    private $user;
    
    /**
     * @var \CrdUser
     *
     *    
     */
    private $categories;

    public function getEstadoDisplay() {
        return \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS[$this->getStatus()];
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Card
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Card
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set postalType
     *
     * @param integer $postalType
     * @return Card
     */
    public function setPostalType($postalType) {
        $this->postalType = $postalType;

        return $this;
    }

    /**
     * Get postalType
     *
     * @return integer 
     */
    public function getPostalType() {
        return $this->postalType;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Card
     */
    public function setKeywords($keywords) {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords() {
        return $this->keywords;
    }

    /**
     * Set file
     *
     * @param string $file
     * @return Card
     */
    public function setFilename($filename) {
        $this->filename = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string 
     */
    public function getFilename() {
        return $this->filename;
    }

    /**
     * Set path
     *
     * @param string $cardPath
     * @return Card
     */
    public function setCardPath($cardPath) {
        $this->cardPath = $cardPath;

        return $this;
    }

    /**
     * Get cardPath
     *
     * @return string 
     */
    public function getCardPath() {
        return $this->cardPath;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     * @return Card
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean 
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Card
     */
    public function setStatus($status) {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * Set availableGuest
     *
     * @param boolean $availableGuest
     * @return Card
     */
    public function setAvailableGuest($availableGuest) {
        $this->availableGuest = $availableGuest;

        return $this;
    }

    /**
     * Get availableGuest
     *
     * @return boolean 
     */
    public function getAvailableGuest() {
        return $this->availableGuest;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Card
     */
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Card
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    /**
     * Set user
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\User $user
     * @return Card
     */
    public function setUser(\Upc\Cards\Bundle\CardsBundle\Entity\User $user = null) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Upc\Cards\Bundle\CardsBundle\Entity\User 
     */
    public function getUser() {
        return $this->user;
    }

    public function getStatusDisplay() {
        return \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS[$this->getStatus()];
    }

    /*     * *********************ABOUT THE FILE************************ */

    public function getAbsolutePath() {
        return null === $this->cardPath ? null : $this->getUploadRootDir() . '/' . $this->cardPath;
    }
    
    public function getFullWebPath() {
        return null === $this->cardPath ? null : $this->getUploadDir() . '/' . $this->cardPath;
    }

    public function getWebPath() {
        return null === $this->cardPath ? null : $this->getUploadDir() . '/' . $this->cardPath;
    }

    private $root;

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved

        echo 'CHDIR' . $this->root . '<br>';
        return $this->root.$this->getUploadDir();
    }

    public function setRootDir($root) {
        $this->root = $root;
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    private $temp;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        // check if we have an old image path
        if (isset($this->cardPath)) {
            // store the old name to delete after the update
            $this->temp = $this->cardPath;
            $this->cardPath = null;
        } else {
            $this->cardPath = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->getFile()) {
            // do whatever you want to generate a unique name
            $filename = sha1(uniqid(mt_rand(), true));
            $this->cardPath = $filename . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->getFile()) {
            return;
        }
        echo 'DESTINO'.$this->getUploadRootDir() . '<br>';
        echo $this->getUploadRootDir();
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->getFile()->move($this->getUploadRootDir(), $this->cardPath);

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            // clear the temp image path
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        if ($this->file == $this->getAbsolutePath()) {
            unlink($this->file);
        }
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add categories
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Category $categories
     * @return Card
     */
    public function addCategory(\Upc\Cards\Bundle\CardsBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;
    
        return $this;
    }

    /**
     * Remove categories
     *
     * @param \Upc\Cards\Bundle\CardsBundle\Entity\Category $categories
     */
    public function removeCategory(\Upc\Cards\Bundle\CardsBundle\Entity\Category $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
}