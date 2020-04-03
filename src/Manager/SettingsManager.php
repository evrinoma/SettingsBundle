<?php

namespace Evrinoma\SettingsBundle\Manager;

use Doctrine\ORM\EntityManagerInterface;
use Evrinoma\DtoBundle\Dto\AbstractDto;
use Evrinoma\DtoBundle\Factory\FactoryAdaptor;
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

    /**
     * @var FactoryAdaptor
     */
    private $factoryAdaptor;
//endregion Fields

//region SECTION: Constructor
    /**
     * SearchManager constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param FactoryAdaptor         $factoryAdaptor
     */
    public function __construct(EntityManagerInterface $entityManager, FactoryAdaptor $factoryAdaptor)
    {
        parent::__construct($entityManager);

        $this->factoryAdaptor = $factoryAdaptor;
    }
//endregion Constructor

//region SECTION: Public
    /**
     * @param AbstractDto $dto
     *
     * @return array|mixed
     */
    public function toSettings(AbstractDto $dto)
    {
        if ($dto) {

            $adaptor = ($dto->getFactoryAdapter()) ? $dto->getFactoryAdapter() : $this->factoryAdaptor;

            $settingsDto = $adaptor->setFrom($dto)->setTo(SettingsDto::class)->adapter();

            return $this->getSettings($settingsDto);
        }

        return [];
    }

    public function saveCollection(AbstractDto $dto, $entitys)
    {
        foreach ($entitys as $entity) {
            /** @var SettingsDto $item */
            foreach ($dto->generatorClone() as $item) {
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
     * @param SettingsDto $settingsDto
     *
     * @return mixed
     */
    public function getSettings($settingsDto)
    {
        $builder = $this->repository->createQueryBuilder('settings');

        $builder->where('settings.active != \'d\'');

        if ($settingsDto->getClassSettingsEntity()) {
            $builder->andWhere('settings.type = :classEntity')
                ->setParameter('classEntity', $settingsDto->getClassSettingsEntity());
        }

        return $builder->getQuery()->getResult();
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