<?php

namespace Evrinoma\SettingsBundle\Dto;

use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;

class ServiceDto extends AbstractDto
{

    /**
     * @inheritDoc
     */
    protected function getClassEntity():?string
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function fillEntity($entity)
    {
        $entity->setActive();

        return $entity;
    }

    /**
     * @inheritDoc
     */
    public function toDto($request):DtoInterface
    {
        return $this;
    }

}