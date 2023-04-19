<?php declare(strict_types=1);

namespace SwagShipFinder\Core\Content\ShipFinder\Aggregate\SwagShipTranslation;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\Framework\Struct\ArrayEntity;
use Shopware\Core\System\Language\LanguageEntity;

class SwagShipFinderTransEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $city;

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
    protected string $swagShipFinderId;

    /**
     * @var string
     */
    protected string $languageId;

    /**
     * @var ArrayEntity|null
     */
    protected ?ArrayEntity $swagShipFinder;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): void
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

    public function getSwagShipFinderId(): string
    {
        return $this->swagShipFinderId;
    }

    public function setSwagShipFinderId(string $swagShipFinderId): void
    {
        $this->swagShipFinderId = $swagShipFinderId;
    }

    public function getLanguageId(): string
    {
        return $this->languageId;
    }

    public function setLanguageId(string $languageId): void
    {
        $this->languageId = $languageId;
    }

    public function getSwagShipFinder(): ?ArrayEntity
    {
        return $this->swagShipFinder;
    }

    public function setSwagShipFinder(?ArrayEntity $swagShipFinder): void
    {
        $this->swagShipFinder = $swagShipFinder;
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
