<?php

namespace Evrinoma\SettingsBundle\Dto\ApartDto;

use Evrinoma\DtoBundle\Dto\AbstractApartDto;

/**
 * Class ServerDto
 *
 * @package Evrinoma\SettingsBundle\Dto\ApartDto
 */
class ServerDto extends AbstractApartDto
{
//region SECTION: Fields
    /**
     * @var DescriptionDto
     */
    protected $description;

    /**
     * @var string
     */
    protected $host;

    /**
     * @var string
     */
    protected $port;

    /**
     * @var bool
     */
    protected $isRemote = false;
    /**
     * @var string
     */
    protected $type;
//endregion Fields

//region SECTION: Public
    /**
     * @return bool
     */
    public function isRemote(): bool
    {
        return $this->isRemote;
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return ServerDto
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return DescriptionDto
     */
    public function getDescription(): ?DescriptionDto
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getPort(): string
    {
        return $this->port;
    }

    /**
     * @param DescriptionDto $description
     *
     * @return ServerDto
     */
    public function setDescription(DescriptionDto $description): ServerDto
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $host
     *
     * @return ServerDto
     */
    public function setHost(string $host): ServerDto
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param string $port
     *
     * @return ServerDto
     */
    public function setPort(string $port): ServerDto
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @param bool $isRemote
     *
     * @return ServerDto
     */
    public function setRemote(bool $isRemote = true): ServerDto
    {
        $this->isRemote = $isRemote;

        return $this;
    }
//endregion Getters/Setters


}