<?php declare(strict_types=1);

namespace SwagShipFinder\Core\Content\ShipFinder\Aggregate\SwagShipTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                add(SwagShipFinderTransEntity $entity)
 * @method void                set(string $key, SwagShipFinderTransEntity $entity)
 * @method SwagShipFinderTransEntity[]    getIterator()
 * @method SwagShipFinderTransEntity[]    getElements()
 * @method SwagShipFinderTransEntity|null get(string $key)
 * @method SwagShipFinderTransEntity|null first()
 * @method SwagShipFinderTransEntity|null last()
 */
 #[Package('core')]
class SwagShipFinderTransCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagShipFinderTransEntity::class;
    }
}