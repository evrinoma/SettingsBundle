<?php

namespace Evrinoma\SettingsBundle\Std;

class ServerStd
{
//region SECTION: Fields
    /**
     * @var DescriptionStd
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
     * @return ServerStd
     */
    public function setType(string $type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return DescriptionStd
     */
    public function getDescription(): ?DescriptionStd
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
     * @param DescriptionStd $description
     *
     * @return ServerStd
     */
    public function setDescription(DescriptionStd $description): ServerStd
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @param string $host
     *
     * @return ServerStd
     */
    public function setHost(string $host): ServerStd
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @param string $port
     *
     * @return ServerStd
     */
    public function setPort(string $port): ServerStd
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @param bool $isRemote
     *
     * @return ServerStd
     */
    public function setRemote(bool $isRemote = true): ServerStd
    {
        $this->isRemote = $isRemote;

        return $this;
    }
//endregion Getters/Setters


}