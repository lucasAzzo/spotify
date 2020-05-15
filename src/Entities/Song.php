<?php

namespace Spotify\Entities;

use Spotify\Payload\SongPayload;

class Song
{
    private ?int $id = null;
    private string $name;
    private string $externalId;
    private array $additionalData;

    public function __construct(SongPayload $payload)
    {
        $this->name = $payload->name();
        $this->externalId = $payload->externalId();
        $this->additionalData = $payload->additionalData();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function getAdditionalData(): array
    {
        return $this->additionalData;
    }
}
