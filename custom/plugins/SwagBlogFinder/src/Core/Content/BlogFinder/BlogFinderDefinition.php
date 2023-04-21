<?php declare(strict_types=1);

namespace SwagBlogFinder\Core\Content\BlogFinder;

use pq\DateTime;
use Shopware\Core\Content\Category\CategoryDefinition;
use Shopware\Core\Content\Product\Aggregate\ProductCategory\ProductCategoryDefinition;
use Shopware\Core\Content\Product\ProductDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\DateTimeField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\FkField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ApiAware;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\CascadeDelete;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Inherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\ReverseInherited;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ManyToManyAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\ReferenceVersionField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslatedField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\TranslationsAssociationField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;
use SwagBlogFinder\Core\Content\BlogCategory\Aggregate\BlogCategoryTranslation\BlogCategoryTranslationDefinition;
use SwagBlogFinder\Core\Content\BlogFinder\Aggregate\BlogCategoryTranslation\BlogFinderTranslationDefinition;

class BlogFinderDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'blog_finder';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
                (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new ApiAware(), new Required()),
                (new TranslatedField('name')),
                (new TranslatedField('description')),
                (new DateTimeField('release_date','release_date')),
                (new BoolField('active','active')),
                (new StringField('Author','Author')),

                //Translation
                new TranslationsAssociationField(
                    BlogFinderTranslationDefinition::class,
                    'blog_category_id'
                )
            ]);
    }
}
