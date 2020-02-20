<?php

namespace GestionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

/**
 * Abonnements
 *
 * @ORM\Table(name="abonnements")
 * @ORM\Entity(repositoryClass="GestionBundle\Repository\AbonnementsRepository")
 */
class Abonnements
{
    /**
     * @return mixed
     */
    public function getRepas ()
    {
        return $this->repas;
    }

    /**
     * @param mixed $repas
     */
    public function setRepas ($repas)
    {
        $this->repas = $repas;
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
     * @ORM\Column(name="options", type="string", length=255)
     */
    private $options;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var int
     *
     * @ORM\Column(name="nbMois", type="integer")
     */
    private $nbMois;

    /**
     * @var datetime
     *
     * @ORM\column(name="Date",type="datetime")
     */
   private $date;

    /**
     * @ManyToOne(targetEntity="Repas")
     * @JoinColumn(name="repas_id", referencedColumnName="id")
     */
    private $repas;

    /**
     * @return datetime
     */
    public function getDate ()
    {
        return $this->date;
    }

    /**
     * @param datetime $date
     */
    public function setDate ($date)
    {
        $this->date = $date;
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
     * Set options
     *
     * @param string $options
     *
     * @return Abonnements
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return string
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Abonnements
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
     * Set prix
     *
     * @param float $prix
     *
     * @return Abonnements
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set nbMois
     *
     * @param integer $nbMois
     *
     * @return Abonnements
     */
    public function setNbMois($nbMois)
    {
        $this->nbMois = $nbMois;

        return $this;
    }

    /**
     * Get nbMois
     *
     * @return int
     */
    public function getNbMois()
    {
        return $this->nbMois;
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @return string
     * @link https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString ()
    {
        // TODO: Implement __toString() method.
        return $this->repas;
    }


}

