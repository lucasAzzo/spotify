<?php

namespace Spotify\Payload;

interface AlbumTracksFromArtistPayload
{
    public function albumId(): string;

    public function token(): string;
}
