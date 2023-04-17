<?php declare(strict_types=1);
namespace SwagShipFinder\Core\Content\Extension;

use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagShipFinder\Core\Content\ShipFinder\SwagShipFinderDefinition;

class ProductExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'productIds',
                SwagShipFinderDefinition::class,
                'product_id',
            'id')
        );
    }

    public function getDefinitionClass(): string
    {

        return ProductDefinition::class;
    }
}
