<?php

namespace Evrinoma\SettingsBundle\Dto;

use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Symfony\Component\HttpFoundation\Request;

class ServiceDto extends AbstractDto
{
    /**
     * @inheritDoc
     */
    public function toDto(Request $request):DtoInterface
    {
        return $this;
    }

}