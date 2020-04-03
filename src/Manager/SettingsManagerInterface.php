<?php


namespace Evrinoma\SettingsBundle\Manager;

use Evrinoma\DtoBundle\Dto\AbstractDto;

/**
 * Interface SettingsManagerInterface
 *
 * @package Evrinoma\SettingsBundle\Manager
 */
interface SettingsManagerInterface
{
//region SECTION: Getters/Setters
    public function toSettings(AbstractDto $dto);
    public function saveCollection(AbstractDto $dto, $entitys);
//endregion Getters/Setters
}