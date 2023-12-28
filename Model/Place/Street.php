<?php

/**
 * (c) FSi sp. z o.o <info@fsi.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace FSi\Bundle\TerytDatabaseBundle\Model\Place;

class Street
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $street_id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $additionalName;

    /**
     * @var Place
     */
    protected $place;

    public function __construct(Place $place, int $id, string $type, ?string $additionalName, string $name)
    {
        $this->place = $place;
        $this->id = $id;
        $this->type = $type;
        $this->additionalName = $additionalName;
        $this->name = $name;
    }

    public function getPlace(): Place
    {
        return $this->place;
    }

    /**
     * @param Place $placce
     * @return Street
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getStreetId()
    {
        return $this->street_id;
    }

    /**
     * @param int $street_id
     * @return Street
     */
    public function setStreetId($street_id)
    {
        $this->street_id = $street_id;

        return $this;
    }

    /**
     * @param string $additionalName
     * @return Street
     */
    public function setAdditionalName(?string $additionalName): void
    {
        $this->additionalName = $additionalName;
    }

    public function getAdditionalName(): ?string
    {
        return $this->additionalName;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getFullName(): string
    {
        $fullName = [$this->type];

        if ($this->additionalName !== null) {
            $fullName[] = $this->additionalName;
        }

        $fullName[] = $this->name;

        return implode(' ', $fullName);
    }
}
