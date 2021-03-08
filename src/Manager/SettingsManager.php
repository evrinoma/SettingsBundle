<?php

namespace Evrinoma\SettingsBundle\Manager;

use Doctrine\ORM\Query;
use Evrinoma\DtoBundle\Dto\DtoInterface;
use Evrinoma\SettingsBundle\Dto\SettingsDto;
use Evrinoma\SettingsBundle\Entity\Settings;
use Evrinoma\UtilsBundle\Manager\AbstractEntityManager;
use Evrinoma\UtilsBundle\Rest\RestTrait;

/**
 * Class SettingsManager
 *
 * @package Evrinoma\SettingsBundle\Manager
 */
class SettingsManager extends AbstractEntityManager implements SettingsManagerInterface
{

    use RestTrait;

//region SECTION: Fields
    /**
     * @var string
     */
    protected $repositoryClass = Settings::class;
//endregion Fields
//region SECTION: Public
    /**
     * @param DtoInterface $dto
     *
     * @return array|mixed
     */
    public function toSettings(DtoInterface $dto)
    {
        if ($dto) {
            return $this->getSettings($dto);
        }

        return [];
    }

    public function saveCollection(DtoInterface $dto, $entities)
    {
        /** @var SettingsDto $item */
        foreach ($dto->getSettingsDto() as $item) {
            foreach ($entities as $entity) {
                if ($item->getId() === $entity->getId()) {
                    $item->fillEntity($entity);
                    break;
                }
            }
        }

        $this->entityManager->flush();
    }
//endregion Public

//region SECTION: Getters/Setters
    /**
     * @param DtoInterface $dto
     *
     * @return mixed
     */
    public function getSettings($dto)
    {
        $builder = $this->repository->createQueryBuilder('settings');

        $builder->where('settings.active != \'d\'');

        if ($dto->getClass()) {
            $builder->andWhere('settings.type = :classEntity')
                ->setParameter('classEntity', $dto->getClass());
        }
        return $builder->getQuery()
            ->setHint(Query::HINT_FORCE_PARTIAL_LOAD, true)
            ->getResult();
    }

    /**
     * @return int
     */
    public function getRestStatus(): int
    {
        return $this->status;
    }
//endregion Getters/Setters
}