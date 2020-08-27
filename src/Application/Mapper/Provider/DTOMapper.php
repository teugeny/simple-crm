<?php

namespace App\Application\Mapper\Provider;

use App\Application\Mapper\Contract\DTOMapperInterface;
use App\Domain\Shared\DTO\DomainDTOInterface;
use App\Domain\Shared\Entity\DomainEntityInterface;
use App\Infrastructure\Shared\CollectionItems;
use Doctrine\Common\Collections\Collection;

class DTOMapper implements DTOMapperInterface
{
    /**
     * @param DomainEntityInterface $entity
     * @param string                   $dto
     *
     * @return mixed
     * @throws \ReflectionException
     */
    public function mapFromEntity(DomainEntityInterface $entity, string $dto): DomainDTOInterface
    {
        $entityReflection = new \ReflectionObject($entity);
        $dtoReflection    = new \ReflectionClass($entity->getDTO());
        $values           = [];
        $dtoAttributes    = [];
        $dto              = new $dto();

        foreach ($dtoReflection->getProperties() as $property) {
            $dtoAttributes[$property->getName()] = $property;
        }

        foreach ($entityReflection->getProperties() as $property) {
            $property->setAccessible(true);
            $value = $property->getValue($entity);

            if (array_key_exists($property->getName(), $dtoAttributes)) {
                if ($value instanceof DomainEntityInterface) {
                    $value = $this->mapFromEntity($value, $value->getDTO());
                }

                if ($value instanceof Collection || is_array($value)) {
                    if (!$value instanceof Collection ) {
                        return [];
                    }

                    $items = [];
                    foreach ($value as $item) {
                        $items[] = $this->mapFromEntity($item, $item->getDTO());
                    }
                    $value = $items;
                }

                $values[$property->getName()] = $value;
                $property->setAccessible(false);
            }
        }

        foreach ($dtoAttributes as $attribute) {
            if (array_key_exists($attribute->getName(), $values)) {
                $attribute->setAccessible(true);
                $attribute->setValue($dto, $values[$attribute->getName()]);
                $attribute->setAccessible(false);
            }
        }

        return $dto;
    }
}