<?php
declare(strict_types=1);

namespace SwagShipFinder\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Country\Aggregate\CountryState\CountryStateDefinition;
use SwagShipFinder\Core\Content\ShipFinder\SwagShipFinderDefinition;

class CountryStateExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'countryStateId',
                SwagShipFinderDefinition::class,
                'country_state_id'
            )
        );
    }

    public function getDefinitionClass(): string
    {
        return CountryStateDefinition::class;
    }
}

