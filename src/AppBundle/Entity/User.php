<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Advertisement", mappedBy="user")
     */
    private $advertisements;

    /**
     * @var
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="user")
     */
    private $comments;


    public function __construct()
    {
        parent::__construct();
        $this->advertisements = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    /**
     * Add advertisements
     *
     * @param \AppBundle\Entity\Advertisement $advertisements
     * @return User
     */
    public function addAdvertisement(\AppBundle\Entity\Advertisement $advertisements)
    {
        $this->advertisements[] = $advertisements;

        return $this;
    }

    /**
     * Remove advertisements
     *
     * @param \AppBundle\Entity\Advertisement $advertisements
     */
    public function removeAdvertisement(\AppBundle\Entity\Advertisement $advertisements)
    {
        $this->advertisements->removeElement($advertisements);
    }

    /**
     * Get advertisements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdvertisements()
    {
        return $this->advertisements;
    }

    /**
     * Add comments
     *
     * @param \AppBundle\Entity\Comment $comments
     * @return User
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
}
