<?php
declare(strict_types=1);

namespace SwagShopFinder\Core\Content\Extension;

use Shopware\Core\Framework\DataAbstractionLayer\EntityExtension;
use Shopware\Core\Framework\DataAbstractionLayer\Field\OneToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use Shopware\Core\System\Language\LanguageDefinition;
use SwagShopFinder\Core\Content\ShopFinder\Aggregate\SwagShopTranslation\SwagShopFinderTransDefinition;

class LanguageExtension extends EntityExtension
{
    public function extendFields(FieldCollection $collection): void
    {
        $collection->add(
            new OneToManyAssociationField(
                'SwagShopTransId',
                SwagShopFinderTransDefinition::class,
                'swag_shop_trans_id')
        );
    }

    public function getDefinitionClass(): string
    {

        return LanguageDefinition::class;
    }
}

