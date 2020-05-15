<?php

namespace Spotify\DTO;

use Spotify\Payload\SongPayload;

class SongDTO implements SongPayload
{
    private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function name(): string
    {
        return $this->data['name'];
    }

    public function externalId(): string
    {
        return $this->data['id'];
    }

    public function additionalData(): array
    {
        return $this->data;
    }
}
