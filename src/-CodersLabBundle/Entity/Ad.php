<?php

namespace CodersLabBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Ad
 *
 * @ORM\Table(name="ad")
 * @ORM\Entity(repositoryClass="CodersLabBundle\Repository\AdRepository")
 */
class Ad
{
    /**
    * @ORM\ManyToOne(targetEntity="Category", inversedBy="ad")
    * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
    */
    private $category;

    /**
    *@ORM\ManyToOne(targetEntity="User", inversedBy="ad")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;
    
    /**
    * @ORM\OneToMany(targetEntity="Comment", mappedBy="ad")
    */
    private $comment;
    
    public function __construct() {
        $this->comment = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="blob")
     */
    private $photo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expiration_date", type="datetime")
     */
    private $expirationDate;

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
     * Set title
     *
     * @param string $title
     * @return Ad
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Ad
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
     * Set photo
     *
     * @param string $photo
     * @return Ad
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set expirationDate
     *
     * @param \DateTime $expirationDate
     * @return Ad
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expirationDate = $expirationDate;

        return $this;
    }

    /**
     * Get expirationDate
     *
     * @return \DateTime 
     */
    public function getExpirationDate()
    {
        return $this->expirationDate;
    }

    public function getCategory(): ?Category{
        return $this->category;
    }

    public function setCategory(?Category $category){
        $this->category = $category;

        return $this;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function addUser($user){
        return $this->setUser($user);
    }

    public function setUser(User $user): Ad{
        $this->user = $user;
        return $this;
    }

}
