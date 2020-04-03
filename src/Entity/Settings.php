<?php

namespace Evrinoma\SettingsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Evrinoma\UtilsBundle\Entity\ActiveTrait;

/**
 * Class Settings
 *
 * @package Evrinoma\SettingsBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="settings")
 */
class Settings
{
    use ActiveTrait;

//region SECTION: Fields
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    protected $type;

    /**
     * @var object
     * @ORM\Column(name="data", type="object")
     */
    protected $data;
//endregion Fields

//region SECTION: Getters/Setters
    /**
     * @return object
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param object $data
     *
     * @return Settings
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return Settings
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }
//endregion Getters/Setters
}