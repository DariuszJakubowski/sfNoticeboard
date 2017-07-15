<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Picture
 *
 * @ORM\Table(name="picture")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PictureRepository")
 */
class Picture
{
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
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var
     *
     * @ORM\OneToOne(targetEntity="Advertisement", inversedBy="picture")
     * @ORM\JoinColumn(name="advertisement_id", referencedColumnName="id")
     */
    private $advertisement;


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
     * Set path
     *
     * @param string $path
     * @return Picture
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set adevrtisement
     *
     * @param \AppBundle\Entity\Advertisement $adevrtisement
     * @return Picture
     */
    public function setAdevrtisement(\AppBundle\Entity\Advertisement $adevrtisement = null)
    {
        $this->adevrtisement = $adevrtisement;

        return $this;
    }

    /**
     * Get adevrtisement
     *
     * @return \AppBundle\Entity\Advertisement
     */
    public function getAdevrtisement()
    {
        return $this->adevrtisement;
    }

    /**
     * Set advertisement
     *
     * @param \AppBundle\Entity\Advertisement $advertisement
     * @return Picture
     */
    public function setAdvertisement(\AppBundle\Entity\Advertisement $advertisement = null)
    {
        $this->advertisement = $advertisement;

        return $this;
    }

    /**
     * Get advertisement
     *
     * @return \AppBundle\Entity\Advertisement
     */
    public function getAdvertisement()
    {
        return $this->advertisement;
    }
}
