<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="advertisement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AdvertisementRepository")
 */
class Advertisement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $created_at;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="date")
     */
    private $expiration_date;

    /**
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="advertisements")
     * @ORM\JoinTable(name="advertisements_categories")
     */
    private $categories;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="advertisements")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var
     *
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="advertisement")
     *
     */
    private $comments;

    /**
     * @var
     *
     * @ORM\OneToOne(targetEntity="Picture", mappedBy="advertisement")
     */
    private $picture;


    public function __construct()
    {
        $this->created_at = new \DateTime('now');
        $this->comments = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }


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
     * @return Advertisement
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
     * @return Advertisement
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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Advertisement
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set expiration_date
     *
     * @param \DateTime $expirationDate
     * @return Advertisement
     */
    public function setExpirationDate($expirationDate)
    {
        $this->expiration_date = $expirationDate;

        return $this;
    }

    /**
     * Get expiration_date
     *
     * @return \DateTime 
     */
    public function getExpirationDate()
    {
        return $this->expiration_date;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     * @return Advertisement
     */
    public function setCategory(\AppBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Advertisement
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add comments
     *
     * @param \AppBundle\Entity\Comment $comments
     * @return Advertisement
     */
    public function addComment(\AppBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \AppBundle\Entity\Comment $comments
     */
    public function removeComment(\AppBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set picture
     *
     * @param \AppBundle\Entity\Picture $picture
     * @return Advertisement
     */
    public function setPicture(\AppBundle\Entity\Picture $picture = null)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return \AppBundle\Entity\Picture 
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Add categories
     *
     * @param \AppBundle\Entity\Category $categories
     * @return Advertisement
     */
    public function addCategory(\AppBundle\Entity\Category $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \AppBundle\Entity\Category $categories
     */
    public function removeCategory(\AppBundle\Entity\Category $categories)
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
