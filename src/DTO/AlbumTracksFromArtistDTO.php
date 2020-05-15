<?php

namespace Spotify\DTO;

use Spotify\Payload\AlbumTracksFromArtistPayload;

class AlbumTracksFromArtistDTO implements AlbumTracksFromArtistPayload
{
    private string $albumId;
    private string $token;

    public function __construct(string $albumId, string $token)
    {
        $this->albumId = $albumId;
        $this->token = $token;
    }

    public function albumId(): string
    {
        return $this->albumId;
    }

    public function token(): string
    {
        return $this->token;
    }
}
