<?php

namespace Evrinoma\SettingsBundle\Std;


class DescriptionStd
{
//region SECTION: Fields
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $instance;
    /**
     * @var string
     */
    protected $date;
    /**
     * @var DescriptionStd
     */
    protected $parent = null;
    /**
     * @var array
     */
    protected $children = null;
//endregion Fields

//region SECTION: Public
    /**
     * @param \DateTime $date
     *
     * @return string
     */
    public function leDate(\DateTime $date)
    {
        return $this->date ? $this->date <= $date : false;
    }

    /**
     * @param DescriptionStd $child
     *
     * @return $this
     */
    public function addChild(DescriptionStd $child)
    {
        $this->children[] = $child;
        $child->setParent($this);

        return $this;
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }



    /**
     * @return string
     */
    public function getInstance(): string
    {
        return $this->instance;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @return DescriptionStd|null
     */
    public function getChildFirst()
    {
        return $this->getChildren() ? $this->getChildren()[0] : null;
    }

    /**
     * @param DescriptionStd $parent
     *
     * @return DescriptionStd
     */
    public function setParent(DescriptionStd $parent): DescriptionStd
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return DescriptionStd
     */
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $description
     *
     * @return DescriptionStd
     */
    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $instance
     *
     * @return DescriptionStd
     */
    public function setInstance(string $instance)
    {
        $this->instance = $instance;

        return $this;
    }

    /**
     * @param \DateTime $date
     *
     * @return DescriptionStd
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }
//endregion Getters/Setters
}