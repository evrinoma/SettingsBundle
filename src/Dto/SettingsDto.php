<?php

namespace Evrinoma\SettingsBundle\Dto;

use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\SettingsBundle\Entity\Settings;
use Evrinoma\UtilsBundle\Entity\ActiveTrait;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SettingsDto
 *
 * @package Evrinoma\SettingsBundle\Dto
 */
class SettingsDto extends AbstractDto
{

//region SECTION: Fields

    use ActiveTrait;
    private $id;
    private $classSettingsEntity;
    private $files;
//endregion Fields

//region SECTION: Protected
    /**
     * @return mixed
     */
    protected function getClassEntity()
    {
        return Settings::class;
    }
//endregion Protected

//region SECTION: Public
    /**
     * @param Settings $entity
     *
     * @return mixed
     */
    public function fillEntity($entity)
    {
        $entity->setActive($this->getActive());

        return $entity;
    }
//endregion Public

//region SECTION: Dto
    /**
     * @param Request $request
     *
     * @return DtoInterface
     */
    public function toDto($request)
    {
        $settings            = $request->get('settings');
        $classSettingsEntity = $request->get('classEntity');

        if ($settings) {
            if (is_array($settings)) {
                /** @var SettingsDto $item */
                /** @var SettingsDto $clone */
                foreach ($settings as $item) {
                    if (isset($item['id'], $item['active'])) {
                        $clone = $this->clone();
                        $clone->setId($item['id']);
                        $clone->setActive($item['active']);
                    }
                }
            }
        }

        if ($classSettingsEntity) {
            $this->setClassSettingsEntity($classSettingsEntity);
        }

        return $this;
    }
//endregion SECTION: Dto

//region SECTION: Getters/Setters
    /**
     * @return mixed
     */
    public function getClassSettingsEntity()
    {
        return $this->classSettingsEntity;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function lookingForRequest()
    {
        return DtoInterface::DEFAULT_LOOKING_REQUEST;
    }

    /**
     * @param mixed $classSettingsEntity
     *
     * @return SettingsDto
     */
    public function setClassSettingsEntity($classSettingsEntity)
    {
        $this->classSettingsEntity = $classSettingsEntity;

        return $this;
    }

    /**
     * @param mixed $id
     *
     * @return SettingsDto
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
//endregion Getters/Setters
}