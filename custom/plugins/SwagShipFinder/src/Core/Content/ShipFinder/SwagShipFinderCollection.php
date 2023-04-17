<?php declare(strict_types=1);

namespace SwagShipFinder\Core\Content\ShipFinder;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                add(SwagShipFinderEntity $entity)
 * @method void                set(string $key, SwagShipFinderEntity $entity)
 * @method SwagShipFinderEntity[]    getIterator()
 * @method SwagShipFinderEntity[]    getElements()
 * @method SwagShipFinderEntity|null get(string $key)
 * @method SwagShipFinderEntity|null first()
 * @method SwagShipFinderEntity|null last()
 */
 #[Package('core')]
class SwagShipFinderCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagShipFinderEntity::class;
    }
}