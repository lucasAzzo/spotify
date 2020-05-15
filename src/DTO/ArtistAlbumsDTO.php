<?php

namespace Spotify\DTO;

use Spotify\Payload\ArtistAlbumsPayload;

class ArtistAlbumsDTO implements ArtistAlbumsPayload
{
    private string $artistId;
    private string $token;
    private int $offset;

    public function __construct(string $artistId, string $token, int $offset)
    {
        $this->artistId = $artistId;
        $this->token = $token;
        $this->offset = $offset;
    }

    public function artistId(): string
    {
        return $this->artistId;
    }

    public function token(): string
    {
        return $this->token;
    }

    public function offset(): int
    {
        return $this->offset;
    }
}
