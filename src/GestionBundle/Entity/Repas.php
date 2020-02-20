<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;
/**
 * Repas
 *
 * @ORM\Table(name="repas")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\RepasRepository")
 */
class Repas
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
     * @ORM\Column(name="nom_menu", type="string", length=255)
     */
    private $nomMenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     * @ORM\Column(name="photo",type="string",length=255)
     */
    private $photo;

    /**
     * @ManyToOne(targetEntity="Abonnements")
     * @JoinColumn(name="Abonnement_id", referencedColumnName="id")
     */
   private $abonnement_id;

    /**
     * @return string
     */
    public function getPhoto ()
    {
        return $this->photo;
    }

    /**
     * @param string $photo
     */
    public function setPhoto ($photo)
    {
        $this->photo = $photo;
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomMenu
     *
     * @param string $nomMenu
     *
     * @return Repas
     */
    public function setNomMenu($nomMenu)
    {
        $this->nomMenu = $nomMenu;

        return $this;
    }

    /**
     * Get nomMenu
     *
     * @return string
     */
    public function getNomMenu()
    {
        return $this->nomMenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Repas
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Repas
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function __toString ()
    {
        // TODO: Implement __toString() method.
        return $this->type;
    }


}

