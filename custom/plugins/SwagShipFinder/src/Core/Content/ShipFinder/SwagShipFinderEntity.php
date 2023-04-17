<?php declare(strict_types=1);

namespace SwagShipFinder\Core\Content\ShipFinder;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\System\Country\Aggregate\CountryState\CountryStateEntity;
use Shopware\Core\System\Country\CountryEntity;
use Shopware\Core\Content\Product\ProductEntity;
use Shopware\Core\Content\Media\MediaEntity;
use SwagShipFinder\Core\Content\ShipFinder\Aggregate\SwagShipTranslation\SwagShipFinderTransCollection;

class SwagShipFinderEntity extends Entity
{
    use EntityIdTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var bool|null
     */
    protected ?bool $active;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var string
     */
    protected string $city;

    /**
     * @var CountryStateEntity|null
     */
    protected ?CountryStateEntity $countryStatesId;

    /**
     * @var CountryEntity|null
     */
    protected ?CountryEntity $countryId;

    /**
     * @var string|null
     */
    protected ?string $mediaId;

    /**
     * @var string|null
     */
    protected ?string $productId;

    /**
     * @var ProductEntity|null
     */
    protected ?ProductEntity $productIds;

    /**
     * @var MediaEntity|null
     */
    protected ?MediaEntity $swagMedia;

    /**
     * @var SwagShipFinderTransCollection|null
     */
    protected ?SwagShipFinderTransCollection $translations;

    /**
     * @var \DateTimeInterface
     */
    protected $createdAt;

    /**
     * @var \DateTimeInterface|null
     */
    protected $updatedAt;

    /**
     * @var array|null
     */
    protected $translated;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(?bool $active): void
    {
        $this->active = $active;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getCountryStatesId(): ?CountryStateEntity
    {
        return $this->countryStatesId;
    }

    public function setCountryStatesId(?CountryStateEntity $countryStatesId): void
    {
        $this->countryStatesId = $countryStatesId;
    }

    public function getCountryId(): ?CountryEntity
    {
        return $this->countryId;
    }

    public function setCountryId(?CountryEntity $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getMediaId(): ?string
    {
        return $this->mediaId;
    }

    public function setMediaId(?string $mediaId): void
    {
        $this->mediaId = $mediaId;
    }

    public function getProductId(): ?string
    {
        return $this->productId;
    }

    public function setProductId(?string $productId): void
    {
        $this->productId = $productId;
    }

    public function getProductIds(): ?ProductEntity
    {
        return $this->productIds;
    }

    public function setProductIds(?ProductEntity $productIds): void
    {
        $this->productIds = $productIds;
    }

    public function getSwagMedia(): ?MediaEntity
    {
        return $this->swagMedia;
    }

    public function setSwagMedia(?MediaEntity $swagMedia): void
    {
        $this->swagMedia = $swagMedia;
    }

    public function getTranslations(): ?SwagShipFinderTransCollection
    {
        return $this->translations;
    }

    public function setTranslations(SwagShipFinderTransCollection $translations): void
    {
        $this->translations = $translations;
    }

    public function getCreatedAt(): \DateTimeInterface
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

    public function getTranslated(): array
    {
        return $this->translated;
    }

    public function setTranslated(?array $translated): void
    {
        $this->translated = $translated;
    }
}
