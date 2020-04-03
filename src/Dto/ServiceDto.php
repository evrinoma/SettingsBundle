<?php

namespace Evrinoma\SettingsBundle\Dto;

use Evrinoma\DtoBundle\Annotation\ApartAnnotation\DtoAdapterItem;
use Evrinoma\DtoBundle\Annotation\DtoAdapter;
use Evrinoma\DtoBundle\Dto\AbstractDto;

/**
 * Class ServiceDto
 *
 * @package Evrinoma\SettingsBundle\Dto\ApartDto
 */
class ServiceDto extends AbstractDto
{

    /**
     * @DtoAdapter(adaptors={
     *     @DtoAdapterItem(class="Evrinoma\SettingsBundle\Dto\SettingsDto",method="setClassSettingsEntity")
     * })
     */
    public function getClass()
    {
        return parent::getClass();
    }

    /**
     * @inheritDoc
     */
    protected function getClassEntity()
    {
        return static::class;
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
    public function toDto($request)
    {
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function lookingForRequest()
    {
        return null;
    }
}