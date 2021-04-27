<?php

namespace Evrinoma\SettingsBundle\Dto;

use Evrinoma\DtoBundle\Adaptor\EntityAdaptorInterface;
use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\SettingsBundle\Entity\Settings;
use Evrinoma\UtilsBundle\Entity\ActiveInterface;
use Evrinoma\UtilsBundle\Entity\ActiveTrait;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SettingsDto
 *
 * @package Evrinoma\SettingsBundle\Dto
 */
class SettingsDto extends AbstractDto implements EntityAdaptorInterface, ActiveInterface
{
    //region SECTION: Fields
    use ActiveTrait;

    private $id;
    private $file;
//endregion Fields

//region SECTION: Public
    /**
     * @param Settings $entity
     *
     * @return Settings
     */
    public function fillEntity($entity): void
    {
        $entity->setActive($this->getActive());
    }
//endregion Public

//region SECTION: Private
    /**
     * @param int $id
     *
     * @return SettingsDto
     */
    private function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $file
     *
     * @return SettingsDto
     */
    private function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }
//endregion Private

//region SECTION: Dto
    /**
     * @param Request $request
     *
     * @return DtoInterface
     */
    public function toDto(Request $request): DtoInterface
    {
        $class = $request->get(DtoInterface::DTO_CLASS);

        if ($class === $this->getClass()) {
            $file = $request->get('file');
            if ($file) {
                $this->setFile($file);
            }
            $id = $request->get('fileId');
            if ($id) {
                $this->setId($id);
            }
            $active = $request->get('active');
            if ($active) {
                $this->setActive($active);
            }
        }

        return $this;
    }
//endregion SECTION: Dto

//region SECTION: Getters/Setters
    /**
     * @return string
     */
    public function getClassEntity(): string
    {
        return Settings::class;
    }

    /**
     * @return int
     */
    public function getId():int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFile():?string
    {
        return $this->file;
    }
//endregion Getters/Setters
}