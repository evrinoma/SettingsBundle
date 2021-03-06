<?php


namespace Evrinoma\SettingsBundle\Manager;

use Evrinoma\DtoBundle\Dto\DtoInterface;

/**
 * Interface SettingsManagerInterface
 *
 * @package Evrinoma\SettingsBundle\Manager
 */
interface SettingsManagerInterface
{
//region SECTION: Getters/Setters
    public function toSettings(DtoInterface $dto);
    public function saveCollection(DtoInterface $dto, array $entities);
//endregion Getters/Setters
}