<?php
declare(strict_types=1);

namespace SwagShipFinder\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagShipFinder\Core\Content\ShipFinder\Aggregate\SwagShipTranslation\SwagShipFinderTransDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'SwagShipTransId',
                SwagShipFinderTransDefinition::class,
                'swag_shop_id',
            'id')
        );
    }

    public function getDefinitionClass(): string
    {

        return LanguageDefinition::class;
    }
}

