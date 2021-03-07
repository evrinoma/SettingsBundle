<?php

namespace Evrinoma\SettingsBundle\Dto;

use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;

class ServiceDto extends AbstractDto
{
    /**
     * @inheritDoc
     */
    public function toDto($request):DtoInterface
    {
        return $this;
    }

}