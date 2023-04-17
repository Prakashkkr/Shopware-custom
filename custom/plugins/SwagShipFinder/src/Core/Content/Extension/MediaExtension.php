<?php declare(strict_types=1);
namespace SwagShipFinder\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToOneAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\Content\Media\MediaDefinition;
use SwagShipFinder\Core\Content\ShipFinder\SwagShipFinderDefinition;


class MediaExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToOneAssociationField(
                 'swagShipFinderMedia',
                'id',
                'media_id',
                    SwagShipFinderDefinition::class,
                    false)
        );
    }

    public function getDefinitionClass(): string
    {

        return MediaDefinition::class;
    }
}


