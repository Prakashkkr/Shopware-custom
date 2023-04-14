<?php declare(strict_types=1);

namespace SwagShopFinder\Core\Content\ShopFinder;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;
use Shopware\Core\System\Country\CountryEntity;
use SwagShopFinder\Core\Content\ShopFinder\Aggregate\SwagShopTranslation\SwagShopFinderTransCollection;

class SwagShopFinderEntity extends Entity
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
    protected string $street;

    /**
     * @var string
     */
    protected string $postCode;

    /**
     * @var string
     */
    protected string $city;

    /**
     * @var string|null
     */
    protected ?string $url;

    /**
     * @var string|null
     */
    protected ?string $telephone;

    /**
     * @var string|null
     */
    protected ?string $open_times;

    /**
     * @var string|null
     */
    protected ?string $country_id;

    /**
     * @var CountryEntity|null
     */
    protected ?CountryEntity $country;

    /**
     * @var SwagShopFinderTransCollection|null
     */
    protected ?SwagShopFinderTransCollection $translations;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function getPostCode(): string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): void
    {
        $this->postCode = $postCode;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    public function getOpen_times(): ?string
    {
        return $this->open_times;
    }

    public function setOpen_times(?string $open_times): void
    {
        $this->open_times = $open_times;
    }

    public function getCountry_id(): ?string
    {
        return $this->country_id;
    }

    public function setCountry_id(?string $country_id): void
    {
        $this->country_id = $country_id;
    }

    public function getCountry(): ?CountryEntity
    {
        return $this->country;
    }

    public function setCountry(?CountryEntity $country): void
    {
        $this->country = $country;
    }

    public function getTranslations(): SwagShopFinderTransCollection
    {
        return $this->translations;
    }

    public function setTranslations(SwagShopFinderTransCollection $translations): void
    {
        $this->translations = $translations;
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

    public function getTranslated(): array
    {
        return $this->translated;
    }

    public function setTranslated(?array $translated): void
    {
        $this->translated = $translated;
    }
}
