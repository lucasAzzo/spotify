<?php

namespace Spotify\Payload;

interface ArtistAlbumsPayload
{
    public function artistId(): string;

    public function token(): string;

    public function offset(): int;
}
