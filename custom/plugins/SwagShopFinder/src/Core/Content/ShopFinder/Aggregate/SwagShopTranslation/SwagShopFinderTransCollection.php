<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder\Aggregate\SwagShopTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Core\Framework\Log\Package;

/**
 * @method void                add(SwagShopFinderTransEntity $entity)
 * @method void                set(string $key, SwagShopFinderTransEntity $entity)
 * @method SwagShopFinderTransEntity[]    getIterator()
 * @method SwagShopFinderTransEntity[]    getElements()
 * @method SwagShopFinderTransEntity|null get(string $key)
 * @method SwagShopFinderTransEntity|null first()
 * @method SwagShopFinderTransEntity|null last()
 */
 #[Package('core')]
class SwagShopFinderTransCollection extends EntityCollection
{
    protected function getExpectedClass(): string
    {
        return SwagShopFinderTransEntity::class;
    }
}
