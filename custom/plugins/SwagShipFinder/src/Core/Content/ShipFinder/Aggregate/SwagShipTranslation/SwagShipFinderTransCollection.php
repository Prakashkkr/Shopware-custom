<?php declare(strict_types=1);

namespace SwagShipFinder\Core\Content\ShipFinder\Aggregate\SwagShipTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;

/**
 * @method void                add(ArrayEntity $entity)
 * @method void                set(string $key, ArrayEntity $entity)
 * @method ArrayEntity[]    getIterator()
 * @method ArrayEntity[]    getElements()
 * @method ArrayEntity|null get(string $key)
 * @method ArrayEntity|null first()
 * @method ArrayEntity|null last()
 */
 #[Package('core')]
class SwagShipFinderTransCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return ArrayEntity::class;
    }
}