<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @method void                add(SwagShopFinderEntity $entity)
 * @method void                set(string $key, SwagShopFinderEntity $entity)
 * @method SwagShopFinderEntity[]    getIterator()
 * @method SwagShopFinderEntity[]    getElements()
 * @method SwagShopFinderEntity|null get(string $key)
 * @method SwagShopFinderEntity|null first()
 * @method SwagShopFinderEntity|null last()
 */
 #[Package('core')]
class SwagShopFinderCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagShopFinderEntity::class;
    }
}
