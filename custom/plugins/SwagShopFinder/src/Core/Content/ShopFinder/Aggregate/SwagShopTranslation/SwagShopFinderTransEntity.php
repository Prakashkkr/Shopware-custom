<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder\Aggregate\SwagShopTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use SwagShopFinder\Core\Content\ShopFinder\SwagShopFinderEntity;
use Shopware\Core\System\Language\LanguageEntity;

class SwagShopFinderTransEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var string
     */
    protected string $swagShopFinderId;

    /**
     * @var string
     */
    protected string $languageId;

    /**
     * @var SwagShopFinderEntity|null
     */
    protected ?SwagShopFinderEntity $swagShopFinder;

    /**
     * @var LanguageEntity|null
     */
    protected ?LanguageEntity $language;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getSwagShopFinderId(): string
    {
        return $this->swagShopFinderId;
    }

    public function setSwagShopFinderId(string $swagShopFinderId): void
    {
        $this->swagShopFinderId = $swagShopFinderId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagShopFinder(): ?SwagShopFinderEntity
    {
        return $this->swagShopFinder;
    }

    public function setSwagShopFinder(?SwagShopFinderEntity $swagShopFinder): void
    {
        $this->swagShopFinder = $swagShopFinder;
    }

    public function getLanguage(): ?LanguageEntity
    {
        return $this->language;
    }

    public function setLanguage(?LanguageEntity $language): void
    {
        $this->language = $language;
    }
}
